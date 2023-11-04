
<?php


include "dbConn.php";
session_start();

if ($con === false) {
    die("Connection error");
}
date_default_timezone_set('Asia/Colombo');
// Check if the form has been submitted
// Check if the farmer exists and has eligibility status 'eligible'
$sql = "SELECT * FROM fieldvisit WHERE gnDivision = ? AND farmerNIC = ? AND eligibilityStatus = 'eligible'";
$stmt = $con->prepare($sql);
$stmt->bind_param("ss", $_SESSION['gnDivision'], $_SESSION['nic']);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 0) {
    // The farmer does not exist or is not eligible
    echo "<p>The farmer does not exist or is not eligible.</p>";
} else {
    // The farmer exists and is eligible
    $row = $result->fetch_assoc();

    // Save the farmerID in the session for use in process_order.php
    $_SESSION["farmerID"] = $row["farmerID"];

    // Get the farmerID
    $farmerID = $row["farmerID"];

    // Retrieve the field size from the farmers table
    $sql = "SELECT fieldSize FROM farmers WHERE farmerID = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $farmerID);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 0) {
        // The farmer's field size is not available
        echo "<p>Field size not available for the farmer.</p>";
    } else {
        // Get the field size
        $row = $result->fetch_assoc();
        $fieldSize = $row["fieldSize"];

        // Get the recommended quantity of fertilizer
        $recommendedQuantity = array();
        $sql = "SELECT * FROM fertilizer_data";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $recommendedQuantity[$row["fertilizerType"]] = round($fieldSize * $row["quantityPerUnit"], 2);
        }

        // Get the unit prices of each fertilizer
        $unitPrices = array();
        $sql = "SELECT fertilizerType, unitPrice FROM fertilizer_data";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        while ($row = $result->fetch_assoc()) {
            $unitPrices[$row["fertilizerType"]] = $row["unitPrice"];
        }

        // Calculate the total price of the order
        $totalPriceOfOrder = 0;

        // Calculate the price for each fertilizer type
        $priceOfUrea = round($recommendedQuantity["Urea"] * $unitPrices["Urea"], 2);
        $priceOfMOP = round($recommendedQuantity["MOP"] * $unitPrices["MOP"], 2);
        $priceOfTSP = round($recommendedQuantity["TSP"] * $unitPrices["TSP"], 2);

        // Calculate the total price
        $totalPriceOfOrder = $priceOfUrea + $priceOfMOP + $priceOfTSP;

        // Insert the order into the orders table
        $orderDate = date("Y-m-d");
        $orderTime = date("H:i:s");

        // Get the AR Officer ID based on gnDivisionName
        $sql = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("s", $_SESSION['gnDivision']);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $gnDivisionID = $row["gn_division_id"];

        // Get the AR Officer ID based on gnDivisionID
        $sql = "SELECT ar_officerID FROM ar_officer WHERE gn_division_id = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $gnDivisionID);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $arOfficerID = $row["ar_officerID"];

        $sql = "INSERT INTO orders (orderDate, orderTime, quantityOfUrea, quantityOfMOP, quantityOfTSP, 
                    priceOfUrea, priceOfMOP, priceOfTSP, totalPrice, ar_officerID, farmerID)
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $con->prepare($sql);
        $stmt->bind_param(
            "sssssssssss",
            $orderDate,
            $orderTime,
            $recommendedQuantity["Urea"],
            $recommendedQuantity["MOP"],
            $recommendedQuantity["TSP"],
            $priceOfUrea, 
            $priceOfMOP, 
            $priceOfTSP,
            $totalPriceOfOrder,
            $arOfficerID,
            $farmerID
        );

        if ($stmt->execute()) {
            // Display a success message in JavaScript to show the hidden popup
            echo '<script type="text/javascript">';
            echo 'window.location.href = "#popup1";';
            echo '</script>';
        } else {
            // Display an error message if the insert query fails
            echo "<p>Error placing order: " . $stmt->error . "</p>";
        }
    
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<style>
.overlay {
    position: fixed;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    background: rgba(0, 0, 0, 0.7);
    transition: opacity 500ms;
    visibility: hidden;
    opacity: 0;
}
.overlay:target {
    visibility: visible;
    opacity: 1;
}
.popup {
    margin: 70px auto;
    padding: 20px;
    background: #fff;
    border-radius: 5px;
    width: 30%;
    position: relative;
    transition: all 5s ease-in-out;
}
.popup h2 {
    margin-top: 0;
    color: #333;
    font-family: Tahoma, Arial, sans-serif;
}
.popup .close {
    position: absolute;
    top: 20px;
    right: 30px;
    transition: all 200ms;
    font-size: 30px;
    font-weight: bold;
    text-decoration: none;
    color: #333;
}
.popup .close:hover {
    color: #06D85F;
}
.popup .content {
    max-height: 30%;
    overflow: auto;
}
@media screen and (max-width: 700px) {
    .box{
        width: 70%;
    }
    .popup{
        width: 70%;
    }
}
.image-section {
  position: absolute;
  bottom: 20;
  left: 50%;
  transform: translateX(-50%);
  text-align: center;
}

.image-section img {
  margin: 0 10px;
}
</style>
</head>
<body>
    
<div id="popup1" class="overlay">
    <div class="popup">
        <h2>Order Placed Successfully</h2>
        <a class="close" href="#">&times;</a>
        <div class="content">
           You have placed the order successfully!
        </div>
    </div>
</div>

<div class="image-section">
    <img src="https://archives1.dailynews.lk/sites/default/files/news/2019/06/06/z_p02-Monsoon.jpg" alt="Image 1" width="230" height="150">
    <img src="https://adaderanaenglish.s3.amazonaws.com/1683106705-fertilizer-6.jpg" alt="Image 2" width="200" height="150">
    <img src="https://ifdc.org/wp-content/uploads/2020/08/NEPAL_Rice_AdobeStock_284381434_resize.jpg" alt="Image 3" width="200" height="150">
</div>
</body>
</html>

