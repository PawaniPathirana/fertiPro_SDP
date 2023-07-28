<?php
  // Include the database connection file.
  include("dbConn.php");

  // Start a new or resume an existing session.
  session_start();

  // Check if the form has been submitted.
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data.
    $personalAddress = $_POST["personalAddress"];
    $telephone = $_POST["telephone"];
    $fieldAddress = $_POST["fieldAddress"];
    
    // Field Size
    if (isset($_POST["fieldSize"])) {
      $fieldSize = $_POST["fieldSize"];
    } else {
      echo "Please enter your field size.";
    }
    
    // Account Number
    if (isset($_POST["accountNumber"])) {
      $accountNumber = $_POST["accountNumber"];
    } else {
      echo "Please enter your account number.";
    }
    
    // Holder Name
    if (isset($_POST["holderName"])) {
      $holderName = $_POST["holderName"];
    } else {
      echo "Please enter the name of the account holder.";
    }
    
    // Branch
    if (isset($_POST["branch"])) {
      $branch = $_POST["branch"];
    } else {
      echo "Please enter the name of the branch.";
    }
    
    // Username
    if (isset($_POST["userName"])) {
      $userName = $_POST["userName"];
    } else {
      echo "Please enter a username.";
    }
    
    // Password
    if (isset($_POST["password"])) {
      $password = $_POST["password"];
    } else {
      echo "Please enter a password.";
    }
    
    // Repeat Password
    if (isset($_POST["repeatPassword"])) {
      $repeatPassword = $_POST["repeatPassword"];
    } else {
      echo "Please repeat the password.";
    }
    
    // Validate the form data.
    if (empty($personalAddress)) {
      echo "Please enter your personal address.";
    } else if (empty($telephone)) {
      echo "Please enter your telephone.";
    } else if (empty($fieldAddress)) {
      echo "Please enter your field address.";
    } else if (empty($fieldSize)) {
      echo "Please enter your field size.";
    } else if (empty($accountNumber)) {
      echo "Please enter your account number.";
    } else if (empty($holderName)) {
      echo "Please enter the name of the account holder.";
    } else if (empty($branch)) {
      echo "Please enter the name of the branch.";
    } else if (empty($userName)) {
      echo "Please enter a username.";
    } else if (empty($password)) {
      echo "Please enter a password.";
    } else if ($password != $repeatPassword) {
      echo "The passwords do not match.";
    } else {
      // Add the user to the user table.
      $query = "INSERT INTO user (userName, password, userType) VALUES ('$userName', '$password', 'farmer')";
      $result = mysqli_query($con, $query);

      // Get the user ID of the newly created user.
      $userId = mysqli_insert_id($con);

      // Fetch the memberID from the fa_member table based on the provided NIC.
      $NIC = $_SESSION['NIC'];
      $query = "SELECT memberID FROM fa_member WHERE NIC = '$NIC'";
      $result = mysqli_query($con, $query);

      if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $memberID = $row['memberID'];
      } else {
        // Error handling if NIC is not found in the table.
        echo "Error: NIC not found in the database.";
        exit;
      }

      // Add the farmer details to the farmers table.
      $query = "INSERT INTO farmers (personalAddress, telephone, fieldAddress, fieldSize, accountNumber, holderName, branch, userId, memberID, NIC) VALUES ('$personalAddress', '$telephone', '$fieldAddress', '$fieldSize', '$accountNumber', '$holderName', '$branch', '$userId', '$memberID', '$NIC')";
      $result = mysqli_query($con, $query);

      // If the query was successful, redirect the user to the success page.
      if ($result) {
        header("Location: success.php");
      } else {
        echo "There was an error adding the farmer details.";
      }
    }
  }
?>
