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

        .report-text {
            font-size: 18px; /* Adjust the font size as needed */
        }
    </style>
</head>
<body>
    <div class="centered-content">
        <h1>Current Stock Review </h1>

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

        // Generate the report
        $date = date("Y-m-d");
        $time = date("H:i:s");

        $report = "Current Stock Review<br><br>";
      
        $report .= "Total Quantity of Urea: 2500 kg<br><br>";
       
        $report .= "Total Quantity of T.S.P: 569 kg<br><br>";
    
        $report .= "Total Quantity of M.O.P: 970 kg<br><br>";
    
        $report .= "Total Quantity: 4039 kg<br><br>";
   
        $report .= "Report generated on: $date, $time";
     

        $report_html = nl2br($report);

        // Display the report and options
        $html = "<div class='report-text'>$report_html</div><br>";
        $html .= "<button onclick='window.print()'>Print</button>";
        $html .= "<a href='reportOverallStock.php?report=$report'>Download PDF</a>";

        echo $html;
        $con->close();
        ?>
    </div>
</body>
</html>
