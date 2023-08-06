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
        <div class="section-title">1. Total quantity of fertilizer of each type in each division</div>
        <?php foreach ($result1 as $row) : ?>
            <div class="result-item">
                <strong>Division ID:</strong> <?php echo $row['gn_division_id']; ?><br>
                <strong>Division Name:</strong> <?php echo $row['gnDivisionName']; ?><br>
                <strong>Total Urea:</strong> <?php echo $row['totalUrea']; ?><br>
                <strong>Total MOP:</strong> <?php echo $row['totalMOP']; ?><br>
                <strong>Total TSP:</strong> <?php echo $row['totalTSP']; ?><br>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="report-section">
        <div class="section-title">2. Total quantity of fertilizer of each division</div>
        <?php foreach ($result2 as $row) : ?>
            <div class="result-item">
                <strong>Division ID:</strong> <?php echo $row['gn_division_id']; ?><br>
                <strong>Division Name:</strong> <?php echo $row['gnDivisionName']; ?><br>
                <strong>Total Fertilizer:</strong> <?php echo $row['totalDivisionFertilizer']; ?><br>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="report-section">
        <div class="section-title">3. Total quantity of fertilizer overall of each type</div>
        <?php foreach ($result3 as $row) : ?>
            <div class="result-item">
                <strong>Total Urea:</strong> <?php echo $row['totalUrea']; ?><br>
                <strong>Total MOP:</strong> <?php echo $row['totalMOP']; ?><br>
                <strong>Total TSP:</strong> <?php echo $row['totalTSP']; ?><br>
            </div>
        <?php endforeach; ?>
    </div>

    <div class="report-section">
        <div class="section-title">4. Total quantity of fertilizer overall</div>
        <?php foreach ($result4 as $row) : ?>
            <div class="result-item">
                <strong>Total Fertilizer:</strong> <?php echo $row['totalFertilizer']; ?><br>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>
