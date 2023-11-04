<?php
// Database connection details
include "dbConn.php";
date_default_timezone_set('Asia/Colombo');

// Function to fetch data from the database with error handling
function fetchData($query)
{
    global $con;
    try {
        $result = $con->query($query);
        if ($result === false) {
            throw new Exception($con->error); // Throw an exception on query error
        }

        $data = array();
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
        }
        return $data;
    } catch (Exception $e) {
        die("Error: " . $e->getMessage());
    }
}

if ($con === false) {
    die("Connection error");
}

// Fetch divisional prices
$queryDivisionalPrice = "SELECT 
    ar_officer.gn_division_id, 
    gn_division.gnDivisionName, 
    SUM(priceOfUrea + priceOfMOP + priceOfTSP) AS divisionalPrice
    FROM orders
    JOIN ar_officer ON orders.ar_officerID = ar_officer.ar_officerID
    JOIN gn_division ON ar_officer.gn_division_id = gn_division.gn_division_id
    GROUP BY ar_officer.gn_division_id";
$resultDivisionalPrice = fetchData($queryDivisionalPrice);

// Fetch the total price of fertilizers
$queryTotalPrice = "SELECT 
    SUM(priceOfUrea) AS totalUreaPrice, 
    SUM(priceOfMOP) AS totalMOPPrice, 
    SUM(priceOfTSP) AS totalTSPPrice 
    FROM orders";
$resultTotalPrice = fetchData($queryTotalPrice);

// Generate the Divisional and Total Price Report
$Date = date("Y-m-d");
$Time = date("H:i:s");

$divisionalPriceReport = "\n\nDivisional Price Report\n";
foreach ($resultDivisionalPrice as $row) {
    $divisionName = $row['gnDivisionName'];
    $divisionalPrice = $row['divisionalPrice'];

    $divisionalPriceReport .= "Division: $divisionName\n";
    $divisionalPriceReport .= "Divisional Price:Rs.  $divisionalPrice\n\n";
}

$totalPriceReport = "\n\nTotal Price of Fertilizers\n";
foreach ($resultTotalPrice as $row) {
    $totalUreaPrice = $row['totalUreaPrice'];
    $totalMOPPrice = $row['totalMOPPrice'];
    $totalTSPPrice = $row['totalTSPPrice'];

    $totalPriceReport .= "Total Price of Urea: Rs. $totalUreaPrice\n";
    $totalPriceReport .= "Total Price of T.S.P: Rs. $totalTSPPrice\n";
    $totalPriceReport .= "Total Price of M.O.P: Rs. $totalMOPPrice\n\n";
}

$totalPriceReport .= "Report generated on: $Date, $Time";

// Close connection
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Price Reports</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            text-align: center;
            margin: 20px auto;
            max-width: 800px;
        }

        h1 {
            text-align: center;
        }

        .report-section {
            margin-bottom: 40px;
        }

        .section-title {
            background-color: #f2f2f2;
            padding: 10px;
            font-weight: bold;
        }

        .result-item {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <h2>The total amount collected</h2>

    <div class="report-section">
        <div class="section-title">Divisional amount collected</div>
        <div class="result-item">
            <?php
            $report_html = nl2br($divisionalPriceReport);
            $html = "<div>$report_html</div>";
            $html .= "<button onclick='window.print()'>Print</button>";
            $html .= "<a href='downloadDivisionalReport.php' download>Download PDF</a>";
            echo $html;
            ?>
        </div>
    </div>

    <div class "report-section">
        <div class="section-title">Total amount collected</div>
        <div class="result-item">
            <?php
            $report_html = nl2br($totalPriceReport);
            $html = "<div>$report_html</div>";
            $html .= "<button onclick='window.print()'>Print</button>";
            $html .= "<a href='downloadTotalReport.php' download>Download PDF</a>";
            echo $html;
            ?>
        </div>
    </div>
</body>
</html>
