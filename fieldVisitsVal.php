<?php
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $date = $_POST["date"];
    $time = $_POST["time"];
    $employeeID = $_POST["officer_name"];
    $eligibilityStatus = $_POST["eligibility_status"];
    $farmerName = $_POST["farmer_name"];
    $farmerNIC = $_POST["farmer_nic"];
    $gnDivision = $_POST["gn_division"];

    // Retrieve the staffID based on the employeeID
    $staffID = "";
    $employeeID = mysqli_real_escape_string($con, $employeeID);
    $staffQuery = "SELECT staffID FROM staffmember WHERE employeeID = '$employeeID'";
    $staffResult = $con->query($staffQuery);
    if ($staffResult->num_rows > 0) {
        $row = $staffResult->fetch_assoc();
        $staffID = $row["staffID"];
    }

    // Retrieve the farmerID based on the farmerNIC
    $farmerID = "";
    $farmerNIC = mysqli_real_escape_string($con, $farmerNIC);
    $farmerQuery = "SELECT farmerID FROM farmers WHERE NIC = '$farmerNIC'";
    $farmerResult = $con->query($farmerQuery);
    if ($farmerResult->num_rows > 0) {
        $row = $farmerResult->fetch_assoc();
        $farmerID = $row["farmerID"];
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO fieldvisit (date, time, employeeID, eligibilityStatus, farmerName, farmerNIC, gnDivision, staffID, farmerID) 
            VALUES ('$date', '$time', '$employeeID', '$eligibilityStatus', '$farmerName', '$farmerNIC', '$gnDivision', '$staffID', '$farmerID')";

    if ($con->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$con->close();
?>
