<?php
include "dbConn.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form inputs
    $farmerNIC = $_POST["farmerNIC"];
    $gnDivision = $_POST["gnDivision"];
    date_default_timezone_set('Asia/Colombo');
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
                $sql = "SELECT orderID, orderDate, orderTime, quantityOfUrea, quantityOfMOP, quantityOfTSP, priceOfUrea, priceOfMOP, priceOfTSP, totalPrice, ar_officerID, farmerID FROM orders";
                $result = $con->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $orderID = $row["orderID"];
                        $orderDate = $row["orderDate"];
                        $orderTime = $row["orderTime"];
                        $quantityOfUrea = $row["quantityOfUrea"];
                        $quantityOfMOP = $row["quantityOfMOP"];
                        $quantityOfTSP = $row["quantityOfTSP"];
                        $priceOfUrea = $row["priceOfUrea"];
                        $priceOfMOP = $row["priceOfMOP"];
                        $priceOfTSP = $row["priceOfTSP"];
                        $totalPrice = $row["totalPrice"];
                        $ar_officerID = $row["ar_officerID"];
                        $farmerID = $row["farmerID"];
                        
                    }
                }
                $totalQuantity1 = $quantityOfUrea + $quantityOfMOP + $quantityOfTSP;
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
                        $updatedTotalQuantity = $updatedUrea+$updatedMOP+ $updatedTSP;

                        $sql_update_stock = "UPDATE stock SET quantityOfUrea = '$updatedUrea', quantityOfMOP = '$updatedMOP', quantityOfTSP = '$updatedTSP', totalQuantity = '$updatedTotalQuantity' WHERE gn_divisionID = '$gn_divisionID'";
                        $con->query($sql_update_stock);

                        // Insert relevant details into the delivered_orders table
                        $date = date("Y-m-d");
                        $time = date("H:i:s");
                        $sql_insert_order = "INSERT INTO `delivered_orders` (orderID, date, time) VALUES ('$orderID', '$date', '$time')";
                        $con->query($sql_insert_order);
                        //date_default_timezone_set("Asia/Colombo");
                        // Create a report
                        
                        $report = 
                       
                        "Order successfully processed!\n\n"
                        . "Farmer NIC: $farmerNIC\n"
                        . "GN Division: $gnDivision\n"
                        . "Quantity of Urea: $quantityOfUrea\n"
                        . "Quantity of M.O.P: $quantityOfMOP\n"
                        . "Quantity of T.S.P: $quantityOfTSP\n"
                        . "Total Quantity: $totalQuantity1\n\n"
                        . "Price for Urea: $priceOfUrea\n"
                        . "Price for M.O.P: $priceOfMOP\n"
                        . "Price for T.S.P: $priceOfTSP\n"
                        . "Total Price: $totalPrice\n\n"
                        . "Report generated on: $date, $time";
                        
           $report_html = nl2br($report);
           
         //  echo $report_html;
                      //  echo "<button onclick='window.print()'>Print</button>";

                       // echo "<a href='report.php?report=$report'>Download PDF</a>";
                        
                        // Redirect to a different page with the report
                      //  header("Location: report.php?report=$report");

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
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ... (your existing head content) -->
    <style>
        .centered-content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh; /* To center vertically */
            text-align: center; /* To center text content */
        }
    </style>
</head>
<body>
    <div class="centered-content">
        <h1>Order Successfully Processed!</h1>
        <p>Farmer NIC: <?php echo $farmerNIC; ?></p>
        <p>GN Division: <?php echo $gnDivision; ?></p>
        <p>Quantity of Urea: <?php echo $quantityOfUrea; ?></p>
        <p>Quantity of M.O.P: <?php echo $quantityOfMOP; ?></p>
        <p>Quantity of T.S.P: <?php echo $quantityOfTSP; ?></p>
        <p>Total Quantity: <?php echo $totalQuantity1; ?></p>
        <p>Price for Urea: <?php echo $priceOfUrea; ?></p>
        <p>Price for M.O.P: <?php echo $priceOfMOP; ?></p>
        <p>Price for T.S.P: <?php echo $priceOfTSP; ?></p>
        <p>Total Price: <?php echo $totalPrice; ?></p>
        <p>Report generated on: <?php echo $date; ?>, <?php echo $time; ?></p>
        <button onclick="window.print()">Print</button>
        <a href="report.php?report=<?php echo urlencode($report); ?>">Download PDF</a>
    </div>
</body>
</html>






