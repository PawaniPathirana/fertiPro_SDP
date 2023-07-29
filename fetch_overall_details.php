<?php
include "dbConn.php";

date_default_timezone_set('Asia/Colombo');
// Fetch overall details from the database
$sql = "SELECT SUM(quantityOfUrea) as totalUrea, SUM(quantityOfTSP) as totalTSP, SUM(quantityOfMOP) as totalMOP, SUM(totalQuantity) as totalQuantity FROM stock";
$result = $con->query($sql);
$row = $result->fetch_assoc();

$totalUrea = $row['totalUrea'];
$totalTSP = $row['totalTSP'];
$totalMOP = $row['totalMOP'];
$totalQuantity = $row['totalQuantity'];
// Create HTML to display the overall details
$html = "<h3>Overall Details</h3>";
$html .= "<p>Total Quantity of Urea: " . $row['totalUrea'] . "</p>";
$html .= "<p>Total Quantity of T.S.P.: " . $row['totalTSP'] . "</p>";
$html .= "<p>Total Quantity of M.O.P.: " . $row['totalMOP'] . "</p>";
$html .= "<p>Total Quantity: " . $row['totalQuantity'] . "</p>";

$con->close();
$date = date("Y-m-d");
        $time = date("H:i:s");

        $report = "Overall Stock Review \n\n"
            . "Total Quantity of Urea:$totalUrea \n"
            . "Total Quantity of T.S.P: $totalTSP\n"
            . "Total Quantity of M.O.P: $totalMOP\n"
            . "Total Quantity: $totalQuantity\n\n"
            . "Report generated on: $date, $time";

        $report_html = nl2br($report);

        $html .= "<div>$report_html</div>";
        $html .= "<button onclick='window.print()'>Print</button>";
        $html .= "<a href='reportOverallStock.php?report=$report'>Download PDF</a>";
        
echo $html;
?>
