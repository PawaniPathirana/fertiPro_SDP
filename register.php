<?php
// Establish database connection (replace with your credentials)
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

// Step 1 - Check with the fa_member tables
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $NIC = $_POST["nic"];
  $GN_Division = $_POST["gn_division"];
  $fa_RegNum = $_POST["reg_number"];
  $fa_memberID = $_POST["member_id"];
  
  if (empty($NIC)) {
    header("Location: fRegStep1.php?error=NIC is required");
    exit();
  } else if (empty($GN_Division)) {
    header("Location: fRegStep1.php?error=GN Division is required");
    exit();
  } else if (empty($fa_RegNum)) {
    header("Location: fRegStep1.php?error=Farmers' Association Registration number is required");
    exit();
  } else if (empty($fa_memberID)) {
    header("Location: fRegStep1.php?error=Farmers Association Member ID is required");
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
      $_SESSION['NIC'] = $NIC; // Update the session variable with the correct value
      header("Location: fRegStep2.php");
      exit();
    } 
  }
}

// Step 2 - Personal Address, Telephone
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !isset($_SESSION['Personal_Address'])) {
  $personal_address = $_POST['personal_address'];
  $telephone = $_POST['telephone'];

  // Validation checks
  if (empty($personal_address)) {
    header("Location: fRegStep2.php?error=Personal Address is required");
    exit();
  }
  if (empty($telephone)) {
    header("Location: fRegStep2.php?error=Telephone is required");
    exit();
  }

  // Proceed to the next step
  $_SESSION['Personal_Address'] = $personal_address;
  $_SESSION['Telephone'] = $telephone;

  // Only redirect to Step 3 if the validation checks pass
  header("Location: fRegStep3.php");
  exit();
}





// Step 3 - Field Address, Field Size
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['Personal_Address'])) {
  $field_address = $_POST['field_address'];
  $field_size = $_POST['field_size'];

  // Proceed to the next step
  $_SESSION['Field_Address'] = $field_address;
  $_SESSION['Field_Size'] = $field_size;
  header("Location: fRegStep4.php");
  exit();
}

// Step 4 - Account Number, Holder Name, Branch
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['Field_Address'])) {
  $account_number = $_POST['account_number'];
  $holder_name = $_POST['holder_name'];
  $branch = $_POST['branch'];

  // Proceed to the next step
  $_SESSION['Account_Number'] = $account_number;
  $_SESSION['Holder_Name'] = $holder_name;
  $_SESSION['Branch'] = $branch;
  header("Location: fRegStep5.php");
  exit();
}

// Step 5 - Username, Password, Repeat Password
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_SESSION['Account_Number'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];
  $repeat_password = $_POST['repeat_password'];

  // Perform necessary validation checks and insert the data into the database

  // Update the relevant tables with the data (replace with your table and column names)
  $firstName = $_SESSION['FirstName'];
  $lastName = $_SESSION['LastName'];
  $nic = $_SESSION['NIC'];
  $personal_address = $_SESSION['Personal_Address'];
  $gn_division = $_SESSION['GN_Division'];
  $account_number = $_SESSION['Account_Number'];
  $holder_name = $_SESSION['Holder_Name'];
  $branch = $_SESSION['Branch'];

  $sql = "INSERT INTO fa_member (firstName, lastName, NIC, Personal_Address, GN_Division) VALUES ('$firstName', '$lastName', '$nic', '$personal_address', '$gn_division')";
  mysqli_query($con, $sql);

  $fa_member_id = mysqli_insert_id($con);

  $sql = "INSERT INTO farmer (personalAddress, telephone, fieldAddress, fieldSize, accountNumber, holderName, branch) VALUES ('$personal_address', '$telephone', '$field_address', '$field_size', '$account_number', '$holder_name', '$branch')";
  mysqli_query($con, $sql);

  $farmer_id = mysqli_insert_id($con);

  $sql = "INSERT INTO user (userName, password, userType) VALUES ('$username', '$password', 'farmer')";
  mysqli_query($con, $sql);

  $user_id = mysqli_insert_id($con);

  $sql = "UPDATE farmer SET userID='$user_id', memberID='$fa_member_id' WHERE farmerID='$farmer_id'";
  mysqli_query($con, $sql);

  // Registration success message
  echo "Registration successful!";
  exit();
}
?>
