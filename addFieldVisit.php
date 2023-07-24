<?php
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "your_database_name";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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
    $employeeID = mysqli_real_escape_string($conn, $employeeID);
    $staffQuery = "SELECT staffID FROM staffmembertable WHERE employeeID = '$employeeID'";
    $staffResult = $conn->query($staffQuery);
    if ($staffResult->num_rows > 0) {
        $row = $staffResult->fetch_assoc();
        $staffID = $row["staffID"];
    }

    // Retrieve the farmerID based on the farmerNIC
    $farmerID = "";
    $farmerNIC = mysqli_real_escape_string($conn, $farmerNIC);
    $farmerQuery = "SELECT farmerID FROM farmer WHERE NIC = '$farmerNIC'";
    $farmerResult = $conn->query($farmerQuery);
    if ($farmerResult->num_rows > 0) {
        $row = $farmerResult->fetch_assoc();
        $farmerID = $row["farmerID"];
    }

    // Prepare and execute the SQL query
    $sql = "INSERT INTO fieldvisit (date, time, employeeID, eligibilityStatus, farmerName, farmerNIC, gnDivision, staffID, farmerID) 
            VALUES ('$date', '$time', '$employeeID', '$eligibilityStatus', '$farmerName', '$farmerNIC', '$gnDivision', '$staffID', '$farmerID')";

    if ($conn->query($sql) === TRUE) {
        echo "Record inserted successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
