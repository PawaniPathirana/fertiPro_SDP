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
            $pricePerUnit = array();
            $sql = "SELECT * FROM fertilizer_data";
            $stmt = $con->prepare($sql);
            $stmt->execute();
            $result = $stmt->get_result();
            while ($row = $result->fetch_assoc()) {
                $recommendedQuantity[$row["fertilizerType"]] = round($fieldSize * $row["quantityPerUnit"], 2);
                $pricePerUnit[$row["fertilizerType"]] = $row["unitPrice"];
            }

            // Display the fertilizer calculator
            echo "<h2>Fertilizer Calculator</h2>";
            echo "<form method=\"POST\" action=\"\" id=\"orderForm\">"; // Add an ID to the form

            echo "<table class=\"table table-bordered\">
<thead>
<tr>
<th>Fertilizer Type</th>
<th>Quantity</th>
<th>Price per Unit</th>
<th>Total Price</th>
<th>Action</th>
</tr>
</thead>
<tbody>";

            $totalPriceOfOrder = 0;

            foreach ($recommendedQuantity as $fertilizerType => $quantity) {
                // Get the price of each fertilizer from the fertilizer_data table
                $pricePerUnit = $pricePerUnit[$fertilizerType];

                $totalPriceForRecommendedQuantity = round($quantity * $pricePerUnit, 2);
                $totalPriceOfOrder += $totalPriceForRecommendedQuantity;

                // Display the fertilizer quantity and price
                echo "<tr>";
                echo "<td>" . $fertilizerType . "</td>";
                echo "<td><input type=\"number\" name=\"quantity_" . $fertilizerType . "\" value=\"" . $quantity . "\" /></td>";
                echo "<td>" . $pricePerUnit . "</td>";
                echo "<td>" . $totalPriceForRecommendedQuantity . "</td>";
                echo "<td><button type=\"button\" name=\"changeQuantity\" onclick=\"changeQuantity('" . $fertilizerType . "');\">Change Quantity</button></td>";
                echo "</tr>";
            }

            echo "</tbody>
</table>";

            // Display the total price of the order
            echo "<h3>Total Price of the Order: <span id=\"totalPrice\">" . $totalPriceOfOrder . "</span></h3>";

            // Hidden input field to keep track of the confirmation status
            echo "<input type=\"hidden\" name=\"orderConfirmed\" value=\"0\" />";

            // Button to submit the order
            echo "<button type=\"button\" name=\"changeQuantity\" onclick=\"changeQuantity();\">Change Quantity</button>";
            echo "<button type=\"button\" name=\"confirmOrder\" onclick=\"confirmOrder();\">Confirm Order</button>";
            echo "</form>"; // Close the main form

            // JavaScript function to update the total price when the quantity changes
            echo "
<script>
function changeQuantity(fertilizerType) {
    // ... (previous JavaScript code for changing quantity)
}

function confirmOrder() {
    // Set the hidden input field to indicate that the order is confirmed
    document.getElementsByName('orderConfirmed')[0].value = '1';
    // Submit the form to process the order
    document.getElementById('orderForm').submit();
}
</script>";
        }
    }
}

// Check if the order form has been submitted
if (isset($_POST["submitOrder"])) {
    // Get the values of the fertilizer quantities from the form
    $quantityOfUrea = isset($_POST["quantity_Urea"]) ? $_POST["quantity_Urea"] : 0;
    $quantityOfMOP = isset($_POST["quantity_MOP"]) ? $_POST["quantity_MOP"] : 0;
    $quantityOfTSP = isset($_POST["quantity_TSP"]) ? $_POST["quantity_TSP"] : 0;

    // Make sure the quantities are not NULL
    if ($quantityOfUrea === null) $quantityOfUrea = 0;
    if ($quantityOfMOP === null) $quantityOfMOP = 0;
    if ($quantityOfTSP === null) $quantityOfTSP = 0;

    // Calculate the total price for each fertilizer
    $priceOfUrea = $recommendedQuantity["Urea"] * $pricePerUnit["Urea"];
    $priceOfMOP = $recommendedQuantity["MOP"] * $pricePerUnit["MOP"];
    $priceOfTSP = $recommendedQuantity["TSP"] * $pricePerUnit["TSP"];

    // Calculate the total price of the order
    $totalPriceOfOrder = $priceOfUrea + $priceOfMOP + $priceOfTSP;

    // Get the gn_division_id from the gn_division table based on the user input GN Division
    $sql = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $gnDivision);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a valid gn_division_id is found for the given GN Division
    if ($result->num_rows === 0) {
        // Handle the situation when gn_division_id is not found for the given gnDivision
        // For example, redirect to an error page or display an error message.
        die("Error: Invalid GN Division name.");
    }

    $row = $result->fetch_assoc();
    $gn_division_id = $row["gn_division_id"];

    // Get the ar_officerID from the ar_officer table based on the gn_division_id
    $sql = "SELECT ar_officerID FROM ar_officer WHERE gn_division_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("i", $gn_division_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if a valid ar_officerID is found for the given gn_division_id
    if ($result->num_rows === 0) {
        // Handle the situation when ar_officerID is not found for the given gn_division_id
        // For example, redirect to an error page or display an error message.
        die("Error: No AR officer found for the specified GN Division.");
    }

    $row = $result->fetch_assoc();
    $ar_officerID = $row["ar_officerID"];

    // Insert the order data into the order table
    $sql = "INSERT INTO orders (orderDate, orderTime, quantityOfUrea, quantityOfMOP, quantityOfTSP, priceOfUrea, priceOfMOP, priceOfTSP, totalPrice, ar_officerID, farmerID) VALUES (CURDATE(), CURTIME(), ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("dddddddii", $quantityOfUrea, $quantityOfMOP, $quantityOfTSP, $priceOfUrea, $priceOfMOP, $priceOfTSP, $totalPriceOfOrder, $ar_officerID, $farmerID);
    $stmt->execute();

    // Redirect to the success page
    header("Location: success.php");
    exit(); // Important: Exit the script after redirecting to avoid further execution
}
?>
