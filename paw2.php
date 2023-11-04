<?php
// Connect to the database
include "dbConn.php";
session_start();

if ($con === false) {
    die("Connection error");
}
date_default_timezone_set('Asia/Colombo');
// Check if the form has been submitted before accessing $_POST values
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Get the current date and time
    $orderDate = date("Y-m-d");
    $orderTime = date("H:i:s");

    // Get the values from the sessions
    $quantityUrea1 = $_SESSION['quantityUrea'] ?? 0;
    $quantityMOP1 = $_SESSION['quantityMOP'] ?? 0;
    $quantityTSP1 = $_SESSION['quantityTSP'] ?? 0;
    $priceUrea1 = $_SESSION["priceUrea_n"] ?? 0;
    $priceMOP1 = $_SESSION["priceMOP_n"] ?? 0;
    $priceTSP1 = $_SESSION["priceTSP_n"] ?? 0;
    $totalPrice1 = $_SESSION["totalPrice"] ?? 0;

    // Get the farmerID and ar_officerID from the sessions if they are set
    $farmerID = $_SESSION['farmerID'] ?? null;
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

    // Insert the order details into the orders table
    $sql = "INSERT INTO orders (orderDate, orderTime, quantityOfUrea, quantityOfMOP, quantityOfTSP, 
        priceOfUrea, priceOfMOP, priceOfTSP, totalPrice, ar_officerID, farmerID)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param(
        "sssssssssii",
        $orderDate,
        $orderTime,
        $quantityUrea1,
        $quantityMOP1,
        $quantityTSP1,
        $priceUrea1,
        $priceMOP1,
        $priceTSP1,
        $totalPrice1,
        $arOfficerID,
        $farmerID,
    );

    // Execute the statement and handle potential errors
    if ($stmt->execute()) {
        // Display a success message in a JavaScript alert
        echo '<script type="text/javascript">';
        echo 'alert("Order placed successfully!");';
        echo '</script>';
    } else {
        // Display an error message if the insert query fails
        echo '<script type="text/javascript">';
        echo 'alert("Error placing order: ' . $stmt->error . '");';
        echo '</script>';
    }
}
?>