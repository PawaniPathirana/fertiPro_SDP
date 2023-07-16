<?php
include "dbConn.php"; // Include your database connection file
echo "Hello, PHP!";
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $designation = $_POST["designation"];
  $employeeID = $_POST["employeeID"];
  $userName = $_POST["userName"];
  $password = $_POST["password"];
  
  // Check if the entered data exists in the staffmember table
  $query = "SELECT * FROM staffmember WHERE firstName = '$firstName' AND lastName = '$lastName' AND designation = '$designation' AND employeeID = '$employeeID'";
  $result = mysqli_query($conn, $query);
  
  if (mysqli_num_rows($result) > 0) {
      // Data exists in staffmember table
      
      // Get the userID from the staffmember table
      $row = mysqli_fetch_assoc($result);
      $userID = $row["userID"];
      
      // Update the userID in the user table
      $updateQuery = "UPDATE user SET userID='$userID' WHERE userName='$userName'";
      mysqli_query($conn, $updateQuery);
      
      // Insert a new record in the user table
      $insertQuery = "INSERT INTO user (userName, password, userType) VALUES ('$userName', '$password', '$designation')";
      mysqli_query($conn, $insertQuery);
      
      // Success message
      echo "Successfully updated user's ID and added the entered details to the user table.";
  } else {
      // Data does not exist in staffmember table
      echo "Error: Data does not exist in staffmember table.";
  }
}
?>
