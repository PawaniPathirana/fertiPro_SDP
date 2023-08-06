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
    $sql_member_id = "SELECT memberID FROM fa_member WHERE GN_Division = '$selectedGnDivision'";
    $result_member_id = mysqli_query($con, $sql_member_id);

    if ($result_member_id && mysqli_num_rows($result_member_id) > 0) {
        // Fetch the relevant member ID
        $row_member_id = mysqli_fetch_assoc($result_member_id);
        $memberID = $row_member_id['memberID'];

        // Step 2: Get the farmers' information from the "farmers" table who are not in the "fieldvisits" table
        $sql_farmers_not_visited = "SELECT * FROM farmers WHERE farmerID NOT IN 
                                    (SELECT farmerID FROM fieldvisit WHERE memberID = $memberID)";
        $result_farmers_not_visited = mysqli_query($con, $sql_farmers_not_visited);

        if ($result_farmers_not_visited) {
            // Process and store the farmer information in the $farmerDetails array
            while ($row_farmers = mysqli_fetch_assoc($result_farmers_not_visited)) {
                $farmerDetails[] = $row_farmers;
            }
        } else {
            echo "Error executing the query: " . mysqli_error($con);
        }
    } else {
        echo "No member found for the selected GN Division.";
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
                        <th>Personal Address</th>
                        <th>Telephone</th>
                        <th>Field Address</th>
                        <!-- Add more table headers for other columns in the farmers table -->
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($farmerDetails as $farmer) { ?>
                        <tr>
                            <td><?php echo $farmer['farmerID']; ?></td>
                            <td><?php echo $farmer['personalAddress']; ?></td>
                            <td><?php echo $farmer['telephone']; ?></td>
                            <td><?php echo $farmer['fieldAddress']; ?></td>
                            <!-- Add more table data for other columns in the farmers table -->
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

