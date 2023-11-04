<?php
include "dbConn.php";
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Process the search request
if (isset($_POST['search_name'])) {
    $search_name = mysqli_real_escape_string($con, $_POST['search_name']);

    $sql = "SELECT fm.memberID, fm.firstName, fm.lastName, f.farmerID, f.personalAddress, f.telephone, f.fieldAddress, 
                   d.orderID, o.quantityOfUrea, o.quantityOfMOP, o.quantityOfTSP,
                   IFNULL(d.date, 'Not Ordered') AS delivery_date
            FROM fa_member AS fm
            LEFT JOIN farmers AS f ON fm.memberID = f.memberID
            LEFT JOIN orders AS o ON f.farmerID = o.farmerID
            LEFT JOIN delivered_orders AS d ON o.orderID = d.orderID
            WHERE fm.firstName = '$search_name' OR fm.lastName = '$search_name'";

    $result = mysqli_query($con, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='container'>";
            echo "<p>Member ID: " . $row['memberID'] . "</p>";
            echo "<p>First Name: " . $row['firstName'] . "</p>";
            echo "<p>Last Name: " . $row['lastName'] . "</p>";
            if ($row['farmerID']) {
                echo "<p>Farmer ID: " . $row['farmerID'] . "</p>";
                echo "<p>Personal Address: " . $row['personalAddress'] . "</p>";
                echo "<p>Telephone: " . $row['telephone'] . "</p>";
                echo "<p>Field Address: " . $row['fieldAddress'] . "</p>";
                if ($row['delivery_date'] == 'Not Ordered') {
                    echo "<p>Status: Not Ordered</p>";
                } else {
                    echo "<p>Status: Got Fertilizer</p>";
                }
            } else {
                echo "<p>Status: Not Registered with the Program</p>";
            }
            echo "</div>";
        }
    } else {
        echo "No results found.";
    }
}

// Close the database connection
mysqli_close($con);
?>
