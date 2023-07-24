<?php
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the GN Division and NIC from the form
    $gnDivision = $_POST["gnDivision"];
    $nic = $_POST["nic"];

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

            // Display the fertilizer calculator
            echo "<h2>Fertilizer Calculator</h2>";
            echo "<form method=\"POST\" action=\"\">";

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
                echo "<td>" . $quantity . "</td>";
                echo "<td>" . $pricePerUnit . "</td>";
                echo "<td>" . $totalPriceForRecommendedQuantity . "</td>";
                echo "</tr>";
            }

            echo "</tbody>
</table>";

            // Display the total price of the order
            echo "<h3>Total Price of the Order: " . $totalPriceOfOrder . "</h3>";

            // Button to submit the order
            echo "<button type=\"submit\" name=\"submitOrder\" class=\"btn btn-primary\">Submit Order</button>";
            echo "</form>";
        }
    }
}

// Check if the order form has been submitted
if (isset($_POST["submitOrder"])) {
    // Rest of your code for order submission goes here
}
?>
