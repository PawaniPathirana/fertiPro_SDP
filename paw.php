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

        // Calculate the total price of the order
        $totalPriceOfOrder = 0;
        foreach ($recommendedQuantity as $fertilizerType => $quantity) {
            $sql = "SELECT unitPrice FROM fertilizer_data WHERE fertilizerType = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("s", $fertilizerType);
            $stmt->execute();
            $result = $stmt->get_result();
            $row = $result->fetch_assoc();
            $pricePerUnit = $row["unitPrice"];

            $totalPriceForRecommendedQuantity = round($quantity * $pricePerUnit, 2);
            $totalPriceOfOrder += $totalPriceForRecommendedQuantity;
        }

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
        $stmt->bind_param("s", $gnDivisionID);
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
            $pricePerUnit,
            $pricePerUnit,
            $pricePerUnit,
            $totalPriceOfOrder,
            $arOfficerID,
            $farmerID
        );
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            echo "<p>Order placed successfully!</p>";
        } else {
            echo "<p>Failed to place the order. Please try again.</p>";
        }
    }
}
?>
