<?php
$host="localhost";
$username="root";
$password="";
$dbname="fertidb";

 $con=mysqli_connect($host,$username,$password,$dbname,3307);


if(!$con){
	
	die('Could not connect mysql sever:'.mysql_error());
}

// Retrieve form data
$firstName = $_POST['firstName'];
$lastName = $_POST['lastName'];
$employeeID = $_POST['employeeID'];
$designation = $_POST['designation'];

// Validate the user's information against the staffmember table
$query = "SELECT * FROM staffmember WHERE employeeID = '$employeeID' AND designation = '$designation'";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) > 0) {
  // User exists in the staffmember table, proceed to the next step
  session_start();
  $_SESSION['firstName'] = $firstName;
  $_SESSION['lastName'] = $lastName;
  $_SESSION['employeeID'] = $employeeID;
  $_SESSION['designation'] = $designation;
  
  // Redirect to the second step
  header("Location:sRegStep2.php");
  exit();
} else {
  // User does not exist in the staffmember table, show an error message or redirect back to the first step
  echo "Invalid user information. Please try again.";
}

// Close the database connection
mysqli_close($con);
?>
