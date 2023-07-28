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
$nic = $_POST['nic'];
$gn_division = $_POST['gn_division'];
$reg_number = $_POST['reg_number'];
$member_id = $_POST['member_id'];

// Validate the user's information against the staffmember table
$query = "SELECT * FROM fa_member WHERE fa_memberID = '$member_id' AND NIC = '$nic' AND GN_Division = '$gn_division' AND associationID = '$reg_number'";
$result = mysqli_query($con, $query);


if (mysqli_num_rows($result) > 0) {
  // User exists in the staffmember table, proceed to the next step
  session_start();
  $_SESSION['memberID'] = $member_id;
  $_SESSION['NIC'] = $nic;
  $_SESSION['GN_Division'] = $gn_division;
  $_SESSION['member_id'] = $reg_number;
  
  // Redirect to the second step
  header("Location:fRegStep2.php");
  exit();
} else {
  // User does not exist in the staffmember table, show an error message or redirect back to the first step
  echo "Invalid user information. Please try again.";
}

// Close the database connection
mysqli_close($con);
?>