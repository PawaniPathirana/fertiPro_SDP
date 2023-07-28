<?php
session_start();
// Check if the farmerID is stored in the session
if (!isset($_SESSION["farmerID"])) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Modify Fertilizer Quantities</title>
</head>
<body>
    <h2>Modify Fertilizer Quantities</h2>
    <form method="POST" action="process_order.php">
        <?php
        // Loop through the recommended quantities and display input fields for quantity modification
        foreach ($recommendedQuantity as $fertilizerType => $quantity) {
            echo "<label for='quantity[$fertilizerType]'>$fertilizerType:</label>";
            echo "<input type='number' name='quantity[$fertilizerType]' value='$quantity' step='0.01' required><br>";
        }
        ?>
        <button type="submit" name="submitOrder" class="btn btn-primary">Submit Order</button>
    </form>
</body>
</html>
