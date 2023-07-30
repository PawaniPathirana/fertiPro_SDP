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
    }
    // Check if the farmer exists and has eligibility status 'eligible'
    $sql = "SELECT * FROM fieldvisit WHERE gnDivision = ? AND farmerNIC = ? AND eligibilityStatus = 'eligible'";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ss", $gnDivision, $nic);
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
           // session_start();
           // $farmerID = $_SESSION['farmerID'];
           // $arOfficerID= $_SESSION['ar_officerID'];
            // Display the fertilizer calculator
            echo "<h2>Fertilizer Calculator</h2>";
            echo '<form method="POST" action="paw.php">';



            echo "<table class=\"table table-bordered\">
<thead>
<tr>
<th>Fertilizer Type</th>
<th>Recommended Quantity</th>
<th>Price per Unit</th>
<th>Total Price for Recommended Quantity</th>
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

                echo "<tr>";
                echo "<td>" . $fertilizerType . "</td>";
                echo "<td>" . $quantity . " kg</td>";
                echo "<td>Rs." . $pricePerUnit . "</td>";
                echo "<td>Rs." . $totalPriceForRecommendedQuantity . "</td>";
                echo "</tr>";
            }

            echo "</tbody>
</table>";

            // Display the total price of the order
            echo "<h3>Total Price of the Order: " . $totalPriceOfOrder . "</h3>";

            // Add the "Order" button
            
            echo "<button type='submit' class='btn btn-primary' id='orderButton' name='orderButton'>Order</button>";
           
            echo "</form>";
            echo '<form method="POST" action="changeOrderVal.php">';
            echo "<button type='Submit' class='btn btn-primary' id='Change' name='orderButton'>Change The Order</button>";
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

                echo "<p>Order placed successfully!</p>";
            }
        }
    }
}
?>