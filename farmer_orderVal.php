<?php
include "dbConn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form inputs
    $farmerNIC = $_POST["farmerNIC"];
    $gnDivision = $_POST["gnDivision"];

    // Retrieve farmerID from the farmers table based on NIC and GN division
    $sql = "SELECT farmerID FROM farmers WHERE NIC = '$farmerNIC' ";
    $result = $con->query($sql);

    if ($result->num_rows > 0) {
        $farmerID = $result->fetch_assoc()["farmerID"];

        // Retrieve the gn_divisionID from the gn_division table based on the provided GN division
        $sql_gn_division = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = '$gnDivision'";
        $result_gn_division = $con->query($sql_gn_division);

        if ($result_gn_division->num_rows > 0) {
            $gn_divisionID = $result_gn_division->fetch_assoc()["gn_division_id"];

            // Retrieve quantityOfUrea, quantityOfMOP, and quantityOfTSP from the order table based on the farmerID
            $sql_order = "SELECT orderID, quantityOfUrea, quantityOfMOP, quantityOfTSP FROM `orders` WHERE farmerID = '$farmerID'";
            $result_order = $con->query($sql_order);

            if ($result_order->num_rows > 0) {
                $row_order = $result_order->fetch_assoc();
                $orderID = $row_order["orderID"];
                $quantityOfUrea = $row_order["quantityOfUrea"];
                $quantityOfMOP = $row_order["quantityOfMOP"];
                $quantityOfTSP = $row_order["quantityOfTSP"];

                // Retrieve the available quantities from the stock table
                $sql_stock = "SELECT stockID, totalQuantity, quantityOfUrea, quantityOfMOP, quantityOfTSP FROM stock WHERE gn_divisionID = '$gn_divisionID'";
                $result_stock = $con->query($sql_stock);

                if ($result_stock->num_rows > 0) {
                    $row_stock = $result_stock->fetch_assoc();
                    $stockID = $row_stock["stockID"];
                    $totalQuantity = $row_stock["totalQuantity"];
                    $availableUrea = $row_stock["quantityOfUrea"];
                    $availableMOP = $row_stock["quantityOfMOP"];
                    $availableTSP = $row_stock["quantityOfTSP"];

                    // Check if the required quantities are available in stock
                    if ($availableUrea >= $quantityOfUrea && $availableMOP >= $quantityOfMOP && $availableTSP >= $quantityOfTSP) {
                        // Reduce the quantities from the stock table
                        $updatedUrea = $availableUrea - $quantityOfUrea;
                        $updatedMOP = $availableMOP - $quantityOfMOP;
                        $updatedTSP = $availableTSP - $quantityOfTSP;
                        $updatedTotalQuantity = $totalQuantity - ($quantityOfUrea + $quantityOfMOP + $quantityOfTSP);

                        $sql_update_stock = "UPDATE stock SET quantityOfUrea = '$updatedUrea', quantityOfMOP = '$updatedMOP', quantityOfTSP = '$updatedTSP', totalQuantity = '$updatedTotalQuantity' WHERE gn_divisionID = '$gn_divisionID'";
                        $con->query($sql_update_stock);

                        // Insert relevant details into the delivered_orders table
                        $date = date("Y-m-d");
                        $time = date("H:i:s");
                        $sql_insert_order = "INSERT INTO `delivered_orders` (orderID, date, time) VALUES ('$orderID', '$date', '$time')";
                        $con->query($sql_insert_order);

                        // Display success message to the user
                        echo "Order successfully processed!";
                    } else {
                        // Display error message to the user - Insufficient stock
                        echo "Error: Insufficient stock!";
                    }
                } else {
                    // Display error message to the user - Stock not found
                    echo "Error: Stock not found!";
                }
            } else {
                // Display error message to the user - Order not found
                echo "Error: Order not found!";
            }
        } else {
            // Display error message to the user - GN Division not found
            echo "Error: GN Division not found!";
        }
    } else {
        // Display error message to the user - Farmer not found
        echo "Error: Farmer not found!";
    }
}

$con->close();
?>
