<?php
include "dbConn.php";
session_start();

if ($con === false) {
    die("Connection error");
}

// Check if the "Order" button has been pressed
if (isset($_POST["orderButton"])) {
    // Get the current date and time
    $orderDate = date("Y-m-d");
    $orderTime = date("H:i:s");

    // Retrieve the recommendedQuantity and totalPriceOfOrder from the session
    if (isset($_SESSION["recommendedQuantity"]) && isset($_SESSION["totalPriceOfOrder"])) {
        $recommendedQuantity = $_SESSION["recommendedQuantity"];
        $totalPriceOfOrder = $_SESSION["totalPriceOfOrder"];
    } else {
        // Handle the case when the required data is not available
        echo "<p>Error: Required data for the order is missing.</p>";
        exit();
    }

    // Retrieve the GN Division from the form
    if (isset($_POST["gnDivision"])) {
        $gnDivision = $_POST["gnDivision"];
    } else {
        // Handle the case when GN Division is not provided
        echo "<p>Error: GN Division is missing.</p>";
        exit();
    }

    // Get the AR Officer ID based on gnDivisionName
    $sql = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $gnDivision);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        // Handle the case when the GN Division is not found in the database
        echo "<p>Error: GN Division not found.</p>";
        exit();
    }
    $row = $result->fetch_assoc();
    $gnDivisionID = $row["gn_division_id"];

    // Get the AR Officer ID based on gnDivisionID
    $sql = "SELECT ar_officerID FROM ar_officer WHERE gn_division_id = ?";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("s", $gnDivisionID);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 0) {
        // Handle the case when the AR Officer for the GN Division is not found in the database
        echo "<p>Error: AR Officer not found for the selected GN Division.</p>";
        exit();
    }
    $row = $result->fetch_assoc();
    $arOfficerID = $row["ar_officerID"];

    // Retrieve the farmerID from the session
    if (isset($_SESSION["farmerID"])) {
        $farmerID = $_SESSION["farmerID"];
    } else {
        // Handle the case when farmerID is not available
        echo "<p>Error: Farmer ID is missing.</p>";
        exit();
    }

    // Retrieve the pricePerUnit (You need to implement this logic to get the actual price per unit for each fertilizer type)
    $pricePerUnit = 10.00; // Replace this with the actual price per unit

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
?>
