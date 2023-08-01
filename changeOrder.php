<?php
// Connect to the database
include "dbConn.php";
//session_start();

if ($con === false) {
    die("Connection error");
}

// Check if the form has been submitted before accessing $_POST values
if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    // Get the current date and time
    $orderDate = date("Y-m-d");
    $orderTime = date("H:i:s");

    // Calculate the total price
    //$totalPrice = $quantityUrea * $unitPrices["Urea"] + $quantityMOP * $unitPrices["MOP"] + $quantityTSP * $unitPrices["TSP"];
    $farmerID = $_SESSION['farmerID'];
    $arOfficerID = $_SESSION['ar_officerID'];
    $quantityUrea1=$_SESSION['quantityUrea_n'];
    $quantityMOP1=$_SESSION['quantityMOP_n'];
    $quantityTSP1=$_SESSION['quantityTSP_n'];
    $totalPrice1== $_SESSION["priceUrea_n"]  ;
    $priceMOP1=$_SESSION["priceMOP_n"] ;
    $priceTSP1=$_SESSION["priceTSP_n"]  ;
    $totalPrice1=$_SESSION["totalPrice"] ;
    // Insert the order details into the orders table
    $sql = "INSERT INTO orders (orderDate, orderTime, quantityOfUrea, quantityOfMOP, quantityOfTSP, 
        priceOfUrea, priceOfMOP, priceOfTSP, totalPrice, ar_officerID, farmerID)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param(
        "sssssssssss",
        $orderDate,
        $orderTime,
        $quantityUrea1,
        $quantityMOP1,
        $quantityTSP1,
        $priceUrea1,
        $priceMOP1,
        $priceTSP1,
        $totalPrice,
        $arOfficerID,
        $farmerID
    );
    $stmt->execute();

    // Display a success message
    echo "<p>Order placed successfully!</p>";
}
?>