<!DOCTYPE html>
<html lang="en">
<head>
    <title>Fertilizer Details Report</title>
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
    <h1>Fertilizer Details Report - Total required fertilizer quantity</h1>

    <div class="report-section">
        <div class="section-title">Total Fertilizer Quantity Required</div>
        <div class="result-item">
            <?php
            include "dbConn.php";

            $Date = date("Y-m-d");
            $Time = date("H:i:s");

            // Initialize the $report variable to store the report content
            $report = "Report generated on: $Date, $Time\n\n";

            // Total quantity of fertilizer of each division
            $query = "SELECT ar_officer.gn_division_id, gn_division.gnDivisionName, 
                SUM(quantityOfUrea) AS totalUrea, 
                SUM(quantityOfMOP) AS totalMOP, 
                SUM(quantityOfTSP) AS totalTSP,
                SUM(quantityOfUrea + quantityOfMOP + quantityOfTSP) AS totalFertilizer
                FROM orders
                JOIN ar_officer ON orders.ar_officerID = ar_officer.ar_officerID
                JOIN gn_division ON ar_officer.gn_division_id = gn_division.gn_division_id
                GROUP BY ar_officer.gn_division_id";

            $result = $con->query($query);

            $report .= "Total Quantity by Division:\n";
            while ($row = $result->fetch_assoc()) {
                $report .= "Division: " . $row['gnDivisionName'] . "\n";
                $report .= "Total Urea: " . $row['totalUrea'] . " kg\n";
                $report .= "Total MOP: " . $row['totalMOP'] . " kg\n";
                $report .= "Total TSP: " . $row['totalTSP'] . " kg\n";
                $report .= "Total Fertilizer: " . $row['totalFertilizer'] . " kg\n\n";
            }

            // Total quantity of fertilizer overall
            $query2 = "SELECT 
                SUM(quantityOfUrea) AS totalUrea, 
                SUM(quantityOfMOP) AS totalMOP, 
                SUM(quantityOfTSP) AS totalTSP,
                SUM(quantityOfUrea + quantityOfMOP + quantityOfTSP) AS totalFertilizer
                FROM orders";
            $result2 = $con->query($query2);

            $report .= "Total Quantity Overall:\n";
            while ($row = $result2->fetch_assoc()) {
                $report .= "Total Urea: " . $row['totalUrea'] . " kg\n";
                $report .= "Total MOP: " . $row['totalMOP'] . " kg\n";
                $report .= "Total TSP: " . $row['totalTSP'] . " kg\n";
                $report .= "Total Fertilizer: " . $row['totalFertilizer'] . " kg\n\n";
            }

            $con->close();

            $report_html = nl2br($report);
            $html = "<div>$report_html</div>";
            $html .= "<button onclick='window.print()'>Print</button>";
            $html .= "<a href='overallErquiredQunReport.php?report=$report'>Download PDF</a>";
            echo $html;
            ?>
        </div>
    </div>
</body>
</html>
