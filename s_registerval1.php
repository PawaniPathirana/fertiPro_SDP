
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydatabase";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the form data
$designation = $_POST['designation'];
$userName = $_POST['userName'];
$password = $_POST['password'];
$repeatPassword = $_POST['repeatPassword'];

// Check if the passwords match
if ($password != $repeatPassword) {
    echo "The passwords do not match. Please try again.";
    exit;
}

// Insert the data into the user table
$sql = "INSERT INTO users (designation, userName, password) VALUES ('$designation', '$userName', '$password')";
if (mysqli_query($conn, $sql)) {
    echo "New user successfully created.";
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close the connection
mysqli_close($conn);

?>
