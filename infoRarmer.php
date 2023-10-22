<?php
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

// Initialize an empty array to store the farmer details
$farmerDetails = array();

if (isset($_POST['gnDivision'])) {
    $selectedGnDivision = $_POST['gnDivision'];

    // Assuming you have sanitized the user input to prevent SQL injection
    $sql = "SELECT DISTINCT f.farmerID, m.firstName, m.lastName, m.Personal_Address, f.telephone, f.fieldAddress
            FROM fa_member AS m
            INNER JOIN farmers AS f ON m.memberID = f.memberID
            WHERE m.GN_Division = '$selectedGnDivision'
            ORDER BY f.farmerID ASC";
    $result = mysqli_query($con, $sql);

    if ($result) {
        // Process and store the farmer information in the $farmerDetails array
        while ($row = mysqli_fetch_assoc($result)) {
            $farmerDetails[] = $row;
        }
    } else {
        echo "Error executing the query: " . mysqli_error($con);
    }
}

// Close the database connection
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Farmer Details</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="mt-3">Farmer Details for Selected GN Division</h2>
        <?php if (count($farmerDetails) > 0) { ?>
            <table class="table table-striped table-bordered mt-3">
                <thead class="thead-dark">
                    <tr>
                        <th>Farmer ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Personal Address</th>
                        <th>Telephone</th>
                        <th>Field Address</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($farmerDetails as $farmer) { ?>
                        <tr>
                            <td><?php echo $farmer['farmerID']; ?></td>
                            <td><?php echo $farmer['firstName']; ?></td>
                            <td><?php echo $farmer['lastName']; ?></td>
                            <td><?php echo $farmer['Personal_Address']; ?></td>
                            <td><?php echo $farmer['telephone']; ?></td>
                            <td><?php echo $farmer['fieldAddress']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        <?php } else { ?>
            <p class="mt-3">No farmers found for the selected GN Division.</p>
        <?php } ?>
    </div>
</body>
</html>
