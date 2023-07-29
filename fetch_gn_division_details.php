<?php
// database connection code
include "dbConn.php";

// Set the desired time zone (change 'Asia/Colombo' to your preferred time zone)
date_default_timezone_set('Asia/Colombo');

// Get the selected GN division name from the POST data
$gnDivisionName = $_POST['gnDivision'];

// Fetch GN division ID from the database based on the division name
$sql_gn_division = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = '$gnDivisionName'";
$result_gn_division = $con->query($sql_gn_division);

if ($result_gn_division->num_rows > 0) {
    $row_gn_division = $result_gn_division->fetch_assoc();
    $gnDivisionID = $row_gn_division['gn_division_id'];

    // Fetch GN division details from the database
    $sql_stock = "SELECT quantityOfUrea, quantityOfTSP, quantityOfMOP, totalQuantity FROM stock WHERE gn_divisionID = '$gnDivisionID'";
    $result_stock = $con->query($sql_stock);

    // Create HTML to display the GN division details
    $html = "<h3>Details for GN Division: $gnDivisionName</h3>";
    while ($row_stock = $result_stock->fetch_assoc()) {
        $html .= "<p>Quantity of Urea: " . $row_stock['quantityOfUrea'] . "</p>";
        $html .= "<p>Quantity of T.S.P.: " . $row_stock['quantityOfTSP'] . "</p>";
        $html .= "<p>Quantity of M.O.P.: " . $row_stock['quantityOfMOP'] . "</p>";
        $html .= "<p>Total Quantity: " . $row_stock['totalQuantity'] . "</p>";

        // Generate the report
        $Quantity_of_Urea = $row_stock["quantityOfUrea"];
        $Quantity_ofTSP = $row_stock["quantityOfTSP"];
        $Quantity_ofMOP = $row_stock["quantityOfMOP"];
        $TotalQuantity = $row_stock["totalQuantity"];
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $report = "Stock Review of the $gnDivisionName\n\n"
            . "Quantity of Urea: $Quantity_of_Urea\n"
            . "Quantity of T.S.P: $Quantity_ofTSP\n"
            . "Quantity of M.O.P: $Quantity_ofMOP\n"
            . "Total Quantity: $TotalQuantity\n\n"
            . "Report generated on: $date, $time";

        $report_html = nl2br($report);

        $html .= "<div>$report_html</div>";
        $html .= "<button onclick='window.print()'>Print</button>";
        $html .= "<a href='reportGNDivisionStock.php?report=$report'>Download PDF</a>";
        
    }

    echo $html;

} else {
    echo "<div class='text-danger'>GN Division not found in the database.</div>";
}

$con->close();
?>
