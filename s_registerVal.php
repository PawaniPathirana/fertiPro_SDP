<?php
include "dbConn.php";
session_start();
if ($con === false) {
  die("Connection error");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $firstName = $_POST["firstName"];
  $lastName = $_POST["lastName"];
  $employeeID = $_POST["employeeID"];
  $designation = $_POST["designation"];
 
  if (empty($firstName)) {
    header("Location:home.php?error=NIC is required");
    exit();
  } else if (empty($lastName)) {
    header("Location: home.php?error=GN Division is required");
    exit();
  } else if (empty($employeeID)) {
    header("Location: home.php?error=Farmers' Association Registration number is required");
    exit();
  } else {
    $sql = "SELECT * FROM staffmember WHERE firstName = '$firstName' AND lastName = '$lastName' AND employeeID = '$employeeID'";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['firstName'] = $row['firstName'];
      $_SESSION['lastName'] = $row['lastName'];
      $_SESSION['employeeID'] = $row['employeeID'];
      $_SESSION['designation'] = $row['designation'];
     
      header("Location: s_register1.php");
      exit();
    } else {
      header("Location: home.php?error=1");
      exit();
    }
  }
}
?>
