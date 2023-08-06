<?php
// Database connection details

include "dbConn.php";

session_start();

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

// Initialize the result variables to empty arrays to avoid "undefined variable" warnings
$result1 = array();
$result2 = array();
$result3 = array();
$result4 = array();

if ($con === false) {
    die("Connection error");
}

// 1. Total quantity of fertilizer of each type in each division
$query1 = "SELECT ar_officer.gn_division_id, gn_division.gnDivisionName, 
           SUM(quantityOfUrea) AS totalUrea, 
           SUM(quantityOfMOP) AS totalMOP, 
           SUM(quantityOfTSP) AS totalTSP
           FROM orders
           JOIN ar_officer ON orders.ar_officerID = ar_officer.ar_officerID
           JOIN gn_division ON ar_officer.gn_division_id = gn_division.gn_division_id
           GROUP BY ar_officer.gn_division_id";
$result1 = fetchData($query1);

// 2. Total quantity of fertilizer of each division
$query2 = "SELECT ar_officer.gn_division_id, gn_division.gnDivisionName, 
           SUM(quantityOfUrea + quantityOfMOP + quantityOfTSP) AS totalDivisionFertilizer
           FROM orders
           JOIN ar_officer ON orders.ar_officerID = ar_officer.ar_officerID
           JOIN gn_division ON ar_officer.gn_division_id = gn_division.gn_division_id
           GROUP BY ar_officer.gn_division_id";
$result2 = fetchData($query2);

// 3. Total quantity of fertilizer overall of each type
$query3 = "SELECT 
           SUM(quantityOfUrea) AS totalUrea, 
           SUM(quantityOfMOP) AS totalMOP, 
           SUM(quantityOfTSP) AS totalTSP
           FROM orders";
$result3 = fetchData($query3);

// 4. Total quantity of fertilizer overall
$query4 = "SELECT 
           SUM(quantityOfUrea + quantityOfMOP + quantityOfTSP) AS totalFertilizer
           FROM orders";
$result4 = fetchData($query4);



// Call the function to generate the PDF report

// Close connection
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fertilizer Details Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            text-align: center; /* Center the content of the body */
            margin: 20px auto; /* Add some margin to center the report on the page */
            max-width: 800px; /* Limit the maximum width of the report */
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
    <h1>Fertilizer Details Report</h1>

    <div class="report-section">
        <div class="section-title">1. Total required quantity of fertilizer of each type in each division</div>
        <?php foreach ($result1 as $row) : ?>
            <div class="result-item">
                <strong>Division ID:</strong> <?php echo $row['gn_division_id']; ?><br>
                <strong>Division Name:</strong> <?php echo $row['gnDivisionName']; ?><br>
                <strong>Total Urea:</strong> <?php echo $row['totalUrea']; ?>kg<br>
                <strong>Total MOP:</strong> <?php echo $row['totalMOP']; ?>kg<br>
                <strong>Total TSP:</strong> <?php echo $row['totalTSP']; ?>kg<br>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="report-section">
        <div class="section-title">2. Total required quantity of fertilizer of each division</div>
        <?php foreach ($result2 as $row) : ?>
            <div class="result-item">
                <strong>Division ID:</strong> <?php echo $row['gn_division_id']; ?><br>
                <strong>Division Name:</strong> <?php echo $row['gnDivisionName']; ?><br>
                <strong>Total Fertilizer:</strong> <?php echo $row['totalDivisionFertilizer']; ?>kg<br>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="report-section">
        <div class="section-title">3. Total required quantity of fertilizer overall of each type</div>
        <?php foreach ($result3 as $row) : ?>
            <div class="result-item">
                <strong>Total Urea:</strong> <?php echo $row['totalUrea']; ?>kg<br>
                <strong>Total MOP:</strong> <?php echo $row['totalMOP']; ?>kg<br>
                <strong>Total TSP:</strong> <?php echo $row['totalTSP']; ?>kg<br>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="report-section">
        <div class="section-title">4. Total required quantity of fertilizer overall</div>
        <?php foreach ($result4 as $row) : ?>
            <div class="result-item">
                <strong>Total Fertilizer:</strong> <?php echo $row['totalFertilizer']; ?>kg<br>
            </div>
        <?php endforeach; 
        ?>
    </div>
</body>
</html>
