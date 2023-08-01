<!DOCTYPE html>
<html>
<head>
    <title>Division Order Comparison</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <?php
    // Replace the database credentials with your own
    include "dbConn.php";

    session_start();
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

    // SQL query to get the total prices of not delivered orders for each division
    $sql_not_delivered_orders = "
        SELECT gn_division.gnDivisionName, SUM(orders.totalPrice) AS total_not_delivered_price
        FROM gn_division
        LEFT JOIN ar_officer ON gn_division.gn_division_id = ar_officer.gn_division_id
        LEFT JOIN orders ON ar_officer.ar_officerID = orders.ar_officerID
        LEFT JOIN delivered_orders ON orders.orderID = delivered_orders.orderID
        WHERE delivered_orders.deliveredOrderID IS NULL
        GROUP BY gn_division.gn_division_id;
    ";

    // Execute the queries and fetch the results
    $result_delivered = $con->query($sql_delivered_orders);
    $result_not_delivered = $con->query($sql_not_delivered_orders);

    // Check if the queries were successful
    if ($result_delivered === false || $result_not_delivered === false) {
        die("Error executing the queries: " . $con->error);
    }

    $gnDivisions = array();
    $totalDeliveredPrices = array();
    $totalNotDeliveredPrices = array();

    // Collect data for the graph
    while ($row_delivered = $result_delivered->fetch_assoc()) {
        $gnDivisions[] = $row_delivered["gnDivisionName"];
        $totalDeliveredPrices[] = $row_delivered["total_delivered_price"];
    }

    while ($row_not_delivered = $result_not_delivered->fetch_assoc()) {
        $totalNotDeliveredPrices[] = $row_not_delivered["total_not_delivered_price"];
    }
    ?>
    
    <h2>Division Order Comparison</h2>
    <table>
        <tr>
            <th>GN Division</th>
            <th>Total prices of  orders</th>
            <th>Total prices of not delivered orders</th>
        </tr>
        <?php
        foreach ($gnDivisions as $index => $gnDivision) {
            echo "<tr>";
            echo "<td>" . $gnDivision . "</td>";
            echo "<td>" . $totalDeliveredPrices[$index] . "</td>";
            echo "<td>" . $totalNotDeliveredPrices[$index] . "</td>";
            echo "</tr>";
        }
        ?>
    </table>

    <!-- Chart.js script -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <canvas id="myChart" width="400" height="200"></canvas>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo json_encode($gnDivisions); ?>,
                datasets: [
                    {
                        label: 'Total prices of delivered orders',
                        data: <?php echo json_encode($totalDeliveredPrices); ?>,
                        backgroundColor: 'rgba(75, 192, 192, 0.5)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    },
                    {
                        label: 'Total prices of not delivered orders',
                        data: <?php echo json_encode($totalNotDeliveredPrices); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }
                ]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
