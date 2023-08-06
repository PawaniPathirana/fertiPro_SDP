<?php
// Replace the database credentials with your own
include "dbConn.php";

//session_start();
if ($con === false) {
    die("Connection error");
}

// SQL query to get the total prices of delivered orders for each division
$sql_delivered_orders = "
    SELECT gn_division.gnDivisionName, SUM(orders.totalPrice) AS total_delivered_price
    FROM gn_division
    LEFT JOIN ar_officer ON gn_division.gn_division_id = ar_officer.gn_division_id
    LEFT JOIN orders ON ar_officer.ar_officerID = orders.ar_officerID
    LEFT JOIN delivered_orders ON orders.orderID = delivered_orders.orderID
    GROUP BY gn_division.gn_division_id;
";

// Execute the query and fetch the result
$result_delivered = $con->query($sql_delivered_orders);

// Check if the query was successful
if ($result_delivered === false) {
    die("Error executing the query: " . $con->error);
}

$gnDivisions = array();
$totalDeliveredPrices = array();
$sumTotalDeliveredPrice = 0; // Variable to store the sum of total delivered prices

// Collect data for the graph and store in variables
while ($row_delivered = $result_delivered->fetch_assoc()) {
    $gnDivisions[] = $row_delivered["gnDivisionName"];
    $totalDeliveredPrice = $row_delivered["total_delivered_price"];
    $totalDeliveredPrices[] = $totalDeliveredPrice;
    $sumTotalDeliveredPrice += $totalDeliveredPrice; // Calculate the sum of total delivered prices
}

// Close the database connection
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Total Revenue Report</title>
    <style>
        /* Add your CSS styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
        }

        .report-line {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h2>Total Revenue Report</h2>
    
    <?php
    foreach ($gnDivisions as $index => $gnDivision) {
        echo "<div class='report-line'>";
        echo "<strong>GN Division:</strong> " . $gnDivision . "<br>";
        echo "<strong>Total Price of Delivered Orders:</strong> " . $totalDeliveredPrices[$index] . "<br>";
        echo "</div>";
    }
    $date = date("Y-m-d");
$time = date("H:i:s");

$report = "Overall Stock Review \n\n"
    . "Value of orders delivered for xxx-1: $totalUrea \n"
    . "Value of orders delivered for yyy-2: $totalTSP\n"
    . "Value of orders delivered for zzz-1: $totalMOP\n"
    . "Total Value of orders delivered: $totalQuantity\n\n"
    . "Report generated on: $date, $time";

$report_html = nl2br($report);

$html .= "<div>$report_html</div>";
$html .= "<button onclick='window.print()'>Print</button>";
$html .= "<a href='reportOverallStock.php?report=$report'>Download PDF</a>";

    ?>

    <hr>

    <div class='report-line'>
        <strong>Total Revenue:</strong> <?php echo $sumTotalDeliveredPrice; ?>
    </div>
</body>
</html>
