<?php
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

/// Function to get the unit price from the fertilizer_data table
function getUnitPrice($fertilizerType) {
    global $con;
    $sql = "SELECT unitPrice FROM fertilizer_data WHERE fertilizerType = '$fertilizerType'";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        return doubleval($row["unitPrice"]); // Convert the value to a double
    } else {
        return 0; // Return 0 if the fertilizer type is not found in the table
    }
}


// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the input values
    $quantityUrea = $_POST["quantityUrea"];
    $quantityMOP = $_POST["quantityMOP"];
    $quantityTSP = $_POST["quantityTSP"];

    // Calculate the unit price and total price for each fertilizer
    $unitPriceUrea = doubleval(getUnitPrice("Urea")); // Convert the value to a double
    $unitPriceMOP = doubleval(getUnitPrice("MOP"));
    $unitPriceTSP = doubleval(getUnitPrice("TSP"));

    $priceUrea = $quantityUrea * $unitPriceUrea;
    $priceMOP = $quantityMOP * $unitPriceMOP;
    $priceTSP = $quantityTSP * $unitPriceTSP;

    // Calculate the total quantity and total price
    $totalQuantity = $quantityUrea + $quantityMOP + $quantityTSP;
    $totalPrice = $priceUrea + $priceMOP + $priceTSP;

    // Display the results
    echo '<form method="POST" action="paw.php">';
    echo '<div class="container mt-4">';
    echo '<h4>Results:</h4>';
    echo "<p>Quantity of Urea: $quantityUrea</p>";
    echo "<p>Quantity of MOP: $quantityMOP</p>";
    echo "<p>Quantity of TSP: $quantityTSP</p>";
    echo "<p>Total Quantity: $totalQuantity</p>";
    echo "<p>Price of Urea: $priceUrea</p>";
    echo "<p>Price of MOP: $priceMOP</p>";
    echo "<p>Price of TSP: $priceTSP</p>";
    echo "<p>Total Price: $totalPrice</p>";
    echo '</div>';
    
}
?>
