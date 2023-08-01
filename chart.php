<?php
// Include database connection file (dbConn.php)
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

// Get the number of farmers in the "farmers" table
$sql_farmers_count = "SELECT COUNT(*) AS numFarmers FROM farmers";
$result_farmers_count = $con->query($sql_farmers_count);

if ($result_farmers_count === false) {
    die("Error executing the query: " . $con->error);
}

$row_farmers_count = $result_farmers_count->fetch_assoc();
$num_farmers = $row_farmers_count['numFarmers'];

$result_farmers_count->free_result();

// Get the number of eligible farmers and not eligible farmers
$sql_eligible = "SELECT eligibilityStatus, COUNT(*) AS countEligible FROM fieldvisit GROUP BY eligibilityStatus";
$result_eligible = $con->query($sql_eligible);

if ($result_eligible === false) {
    die("Error executing the query: " . $con->error);
}

$count_eligible = 0;
$count_not_eligible = 0;

while ($row = $result_eligible->fetch_assoc()) {
    if ($row['eligibilityStatus'] == 'Eligible') {
        $count_eligible = $row['countEligible'];
    } else if ($row['eligibilityStatus'] == 'Not Eligible') {
        $count_not_eligible = $row['countEligible'];
    }
}

$result_eligible->free_result();

// Get the number of farmers who have not had field visits yet
$sql_not_visited = "SELECT COUNT(*) AS countNotVisited FROM farmers 
                    LEFT JOIN fieldvisit ON farmers.farmerID = fieldvisit.farmerID 
                    WHERE fieldvisit.farmerID IS NULL";

$result_not_visited = $con->query($sql_not_visited);

if ($result_not_visited === false) {
    die("Error executing the query: " . $con->error);
}

$row_not_visited = $result_not_visited->fetch_assoc();
$count_not_visited = $row_not_visited['countNotVisited'];

$result_not_visited->free_result();

// Close the connection
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Farmers Information</title>
    <!-- Add Google Charts API -->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- Add Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Farmers Information</h1>
    <p>Number of Farmers: <?php echo $num_farmers; ?></p>
    <p>Number of Eligible Farmers: <?php echo $count_eligible; ?></p>
    <p>Number of Not Eligible Farmers: <?php echo $count_not_eligible; ?></p>
    <p>Number of Farmers Not Visited Yet: <?php echo $count_not_visited; ?></p>

    <!-- Add the canvas element for the pie chart -->
    <div id="pieChart" style="width: 600px; height: 400px;"></div> <!-- Updated chart size -->

    <!-- JavaScript section for creating the pie chart -->
    <script>
        // Load Google Charts API
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawPieChart);

        function drawPieChart() {
            // Get the data from PHP variables
            var numEligible = <?php echo $count_eligible; ?>;
            var numNotEligible = <?php echo $count_not_eligible; ?>;
            var numNotVisited = <?php echo $count_not_visited; ?>;

            // Create the data table
            var data = google.visualization.arrayToDataTable([
                ['Status', 'Count'],
                ['Eligible', numEligible],
                ['Not Eligible', numNotEligible],
                ['Not Visited Yet', numNotVisited]
            ]);

            // Set chart options
            var options = {
                pieHole: 0.3,
                colors: ['#36a2eb', '#ff6384', '#ffce56']
            };

            // Instantiate and draw the pie chart
            var chart = new google.visualization.PieChart(document.getElementById('pieChart'));
            chart.draw(data, options);
        }
    </script>
</body>
</html>


