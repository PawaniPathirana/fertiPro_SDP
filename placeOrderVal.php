<?php
include "dbConn.php";
session_start();

if ($con === false) {
    die("Connection error");
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required form fields are set
    if (isset($_POST["gnDivision"]) && isset($_POST["nic"])) {
        // Get the GN Division and NIC from the form
        $gnDivision = $_POST["gnDivision"];
        $nic = $_POST["nic"];

        // Save the GN Division and NIC in the session for use later
        $_SESSION['gnDivision'] = $gnDivision;
        $_SESSION['nic'] = $nic;
        $sql = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $gnDivision);
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
                $_SESSION["ar_officerID"] = $arOfficerID;
    }
    // Check if the farmer exists and has eligibility status 'eligible'
    $sql = "SELECT * FROM fieldvisit WHERE gnDivision = ? AND farmerNIC = ? AND eligibilityStatus = 'eligible'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $gnDivision, $nic);
    $stmt->execute();

    $result = $stmt->get_result();
    

    if ($result->num_rows === 0) {
        // The farmer does not exist or is not eligible
        echo "<p style='text-align: center;'>The farmer does not exist or is not eligible.</p>";
    } else {
        // The farmer exists and is eligible
        $row = $result->fetch_assoc();

        // Save the farmerID in the session for use in process_order.php
        $_SESSION["farmerID"] = $row["farmerID"];

        // Get the farmerID
        $farmerID = $row["farmerID"];
        $_SESSION["farmerID"] = $farmerID;
        // Retrieve the field size from the farmers table
        $sql = "SELECT fieldSize FROM farmers WHERE farmerID = ?";
        $stmt = $con->prepare($sql);
        $stmt->bind_param("i", $farmerID);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            // The farmer's field size is not available
            echo "<p style='text-align: center;'>Field size not available for the farmer.</p>";
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
            
            // Display the fertilizer calculator
            echo "<div class='container d-flex justify-content-center align-items-center min-vh-100'>";
            echo "<div class='row border rounded-5 p-3 bg-white shadow box-area'>";
            echo "<div class='col-md-12 right-box'>";
            echo "<div class='row align-items-center'>";
            echo "<div class='header-text mb-5'>";
            echo "<h2 style='color: #333; text-align: center;'>Fertilizer Calculator</h2>";
            echo '<form method="POST" action="paw.php" style="text-align: center;">';

            echo "<table class=\"table table-bordered\" style='width: 50%; margin: 0 auto; border-collapse: collapse;'>
<thead>
<tr>
<th style='padding: 8px; border: 1px solid #ddd;'>Fertilizer Type</th>
<th style='padding: 8px; border: 1px solid #ddd;'>Recommended Quantity</th>
<th style='padding: 8px; border: 1px solid #ddd;'>Price per Unit</th>
<th style='padding: 8px; border: 1px solid #ddd;'>Total Price for Recommended Quantity</th>
</tr>
</thead>
<tbody>";

            $totalPriceOfOrder = 0;

            foreach ($recommendedQuantity as $fertilizerType => $quantity) {
                // Get the price of each fertilizer from the fertilizer_data table
                $sql = "SELECT unitPrice FROM fertilizer_data WHERE fertilizerType = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $fertilizerType);
                $stmt->execute();
                $result = $stmt->get_result();
                $row = $result->fetch_assoc();
                $pricePerUnit = $row["unitPrice"];

                $totalPriceForRecommendedQuantity = round($quantity * $pricePerUnit, 2);
                $totalPriceOfOrder += $totalPriceForRecommendedQuantity;
                // Calculate the recommended quantities of each fertilizer
$recommendedQuantity = array();
$sql = "SELECT * FROM fertilizer_data";
$stmt = $con->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    $recommendedQuantity[$row["fertilizerType"]] = round($fieldSize * $row["quantityPerUnit"], 2);
}

// Save the recommended quantities in sessions
$_SESSION["recommendedQuantity"] = $recommendedQuantity;

                echo "<tr>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $fertilizerType . "</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>" . $quantity . " kg</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>Rs." . $pricePerUnit . "</td>";
                echo "<td style='padding: 8px; border: 1px solid #ddd;'>Rs." . $totalPriceForRecommendedQuantity . "</td>";
                echo "</tr>";
            }

            echo "</tbody>
</table>";

            // Display the total price of the order
            echo "<h3 style='text-align: center;'>Total Price of the Order: Rs " . $totalPriceOfOrder . "</h3>";

            // Add the "Order" button
            echo "<button type='submit' class='btn btn-lg btn-primary w-100 fs-6' id='orderButton' name='orderButton' style='margin-top: 10px;'>Order</button>";
           
            echo "</form>";
            echo '<form method="POST" action="paw3.php" style="text-align: center;">';
            echo "<button type='Submit' class='btn btn-lg btn-primary w-100 fs-6' id='Change' name='orderButton' style='margin-top: 10px;'>Change The Order</button>";
            echo "</form>";

            // Check if the "Order" button has been pressed
            if (isset($_POST["orderButton"])) {
                // Get the current date and time
                $orderDate = date("Y-m-d");
                $orderTime = date("H:i:s");

                // Get the AR Officer ID based on gnDivisionName
                $sql = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("s", $gnDivision);
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
                $_SESSION["ar_officerID"] = $arOfficerID;

                            // Insert the order into the orders table
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
                    
                    echo "<p style='text-align: center;'>Order placed successfully!</p>";
                }
            }
        }
    }
    ?>
    
