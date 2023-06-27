<?php
include "dbConn.php";
session_start();
if ($con === false) {
  die("Connection error");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $NIC = $_POST["nic"];
  $GN_Division = $_POST["GN_Division"];
  $fa_RegNum = $_POST["fa_RegNumber"];
  $fa_memberID = $_POST["fa_memberID"];
  
  if (empty($NIC)) {
    header("Location:home.php?error=NIC is required");
    exit();
  } else if (empty($GN_Division)) {
    header("Location: home.php?error=GN Division is required");
    exit();
  } else if (empty($fa_RegNum)) {
    header("Location: home.php?error=Farmers' Association Registration number is required");
    exit();
  } else if (empty($fa_memberID)) {
    header("Location: home.php?error=Farmers Association Member ID is required");
    exit();
  } else {
    $sql = "SELECT * FROM fa_member WHERE NIC = '$NIC' AND fa_memberID = '$fa_memberID' AND GN_Division = '$GN_Division' AND associationID = '$fa_RegNum'";
    $result = mysqli_query($con, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
      $row = mysqli_fetch_assoc($result);
      $_SESSION['FA_MemberID'] = $row['fa_memberID'];
      $_SESSION['FirstName'] = $row['firstName'];
      $_SESSION['LastName'] = $row['lastName'];
      $_SESSION['NIC'] = $row['NIC'];
      $_SESSION['Personal_Address'] = $row['Personal_Address'];
      $_SESSION['GN_Division'] = $row['GN_Division'];
      $_SESSION['FA_Code'] = $row['associationID'];
      header("Location: f_register1.php");
      exit();
    } else {
        header("Location: home.php?error=1");
      exit();
    }
  }
}
?>






