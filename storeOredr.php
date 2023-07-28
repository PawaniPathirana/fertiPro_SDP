<?php
include "dbConn.php";
session_start();

if ($con === false) {
    die("Connection error");
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the farmerID from the session
    if (isset($_SESSION["farmerID"])) {
        $farmerID = $_SESSION["farmerID"];
    } else {
        die("Invalid request");
    }

    // Process the submitted quantities for each fertilizer
    $modifiedQuantities = $_POST["quantity"];

    // Insert the order details into the order table
    $orderDate = date("Y-m-d");
    $orderTime = date("H:i:s");

    // Retrieve AR Officer ID based on GN Division
    $gnDivision = $_POST["gnDivision"];
    $sql_ar_officer = "SELECT ar_officerID FROM ar_officer WHERE gnDivision = ?";
    $stmt_ar_officer = $con->prepare($sql_ar_officer);
    $stmt_ar_officer->bind_param("s", $gnDivision);
    $stmt_ar_officer->execute();
    $result_ar_officer = $stmt_ar_officer->get_result();

    if ($result_ar_officer->num_rows === 0) {
        die("AR Officer not found for the GN Division.");
    }

    $row_ar_officer = $result_ar_officer->fetch_assoc();
    $ar_officerID = $row_ar_officer["ar_officerID"];

    // Prepare and execute the INSERT query for each fertilizer
    $sql_insert_order = "INSERT INTO orders (orderDate, orderTime, quantityOfUrea, quantityOfMOP, quantityOfTSP, 
                        priceOfUrea, priceOfMOP, priceOfTSP, totalPrice, ar_officerID, farmerID)
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt_insert_order = $con->prepare($sql_insert_order);

    foreach ($modifiedQuantities as $fertilizerType => $quantity) {
        // Validate the quantity (ensure it is a positive number)
        if (!is_numeric($quantity) || $quantity <= 0) {
            die("Invalid quantity for $fertilizerType");
        }

        // Get the price of each fertilizer from the fertilizer_data table
        $sql_fertilizer_price = "SELECT unitPrice FROM fertilizer_data WHERE fertilizerType = ?";
        $stmt_fertilizer_price = $con->prepare($sql_fertilizer_price);
        $stmt_fertilizer_price->bind_param("s", $fertilizerType);
        $stmt_fertilizer_price->execute();
        $result_fertilizer_price = $stmt_fertilizer_price->get_result();

        if ($result_fertilizer_price->num_rows === 0) {
            die("Fertilizer price not found for $fertilizerType");
        }

        $row_fertilizer_price = $result_fertilizer_price->fetch_assoc();
        $unitPrice = $row_fertilizer_price["unitPrice"];

        // Calculate total price for each fertilizer
        $totalPrice = round($quantity * $unitPrice, 2);

        // Execute the query to insert the order
        $stmt_insert_order->bind_param(
            "ssdddddddi",
            $orderDate,
            $orderTime,
            ($fertilizerType === "Urea" ? $quantity : 0),
            ($fertilizerType === "M.O.P." ? $quantity : 0),
            ($fertilizerType === "T.S.P." ? $quantity : 0),
            ($fertilizerType === "Urea" ? $totalPrice : 0),
            ($fertilizerType === "M.O.P." ? $totalPrice : 0),
            ($fertilizerType === "T.S.P." ? $totalPrice : 0),
            $totalPrice,
            $ar_officerID,
            $farmerID
        );

        $stmt_insert_order->execute();
    }

    // Redirect to a success page after the order has been placed
    header("Location: order_success.php");
    exit;
}
?>
