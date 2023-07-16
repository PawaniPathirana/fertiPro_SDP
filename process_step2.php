<?php
$host="localhost";
$username="root";
$password="";
$dbname="fertidb";

$conn = mysqli_connect($host, $username, $password, $dbname,3307);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
session_start();
// Retrieve form data
$firstName = $_SESSION['firstName'];
$lastName = $_SESSION['lastName'];
$employeeID = $_SESSION['employeeID'];
$designation = $_POST['designation'];
$username = $_POST['username'];
$password = $_POST['password'];
$confirmPassword = $_POST['confirmPassword'];

// Verify password match
if ($password !== $confirmPassword) {
  // Passwords do not match, show an error message or redirect back to the second step
  echo "Passwords do not match. Please try again.";
  exit();
}

// Switch statement to assign user type based on designation
switch ($designation) {
  case "Divisional Officer":
    $userType = "divisional_officer";
    break;
  case "Development Officer":
    $userType = "development_officer";
    break;
  case "Agriculture Research Officer":
    $userType = "agriculture_research_officer";
    break;
  case "Management Assistant":
    $userType = "management_assistant";
    break;
  default:
    die("Invalid designation. Please select a valid designation.");
}

// Insert user information into the user table
$query = "INSERT INTO user (userName, password, userType) VALUES ('$username', '$password', '$userType')";
mysqli_query($conn, $query);
$userID = mysqli_insert_id($conn);

// Update the relevant userID in the staffmember table
$query = "UPDATE staffmember SET userID = '$userID' WHERE employeeID = '$employeeID'";
mysqli_query($conn, $query);

// Registration successful
echo "Registration successful!";

// Close the database connection
mysqli_close($conn);
?>
