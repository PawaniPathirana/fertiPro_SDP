<?php
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

    // Placeholder data for fa_member table (for demonstration purposes)
    $faMembers = array(
        array("memberID" => 1, "fa_memberID" => "FA001", "firstName" => "John", "lastName" => "Doe", "NIC" => "123456789V", "GN_Division" => "GND001", "associationID" => "ASSOC001"),
        array("memberID" => 2, "fa_memberID" => "FA002", "firstName" => "Jane", "lastName" => "Smith", "NIC" => "987654321V", "GN_Division" => "GND002", "associationID" => "ASSOC002"),
        // Add more records here if necessary
    );

    // Step 1: Validate and fetch data from the first step
    $nic = $_POST["nic"];
    $gnDivision = $_POST["gnDivision"];
    $associationRegNumber = $_POST["associationRegNumber"];
    $associationMemberID = $_POST["associationMemberID"];

    // Validate the first step data against the fa_member table
    $isValidStep1 = false;
    foreach ($faMembers as $faMember) {
        if (
            $faMember["NIC"] === $nic &&
            $faMember["GN_Division"] === $gnDivision &&
            $faMember["fa_memberID"] === $associationMemberID
        ) {
            $isValidStep1 = true;
            break;
        }
    }

    // If the data is not valid, show an error message and stop the registration process
    if (!$isValidStep1) {
        die("Invalid data provided. Please check the NIC, GN Division, Farmers' Association Registration Number, and Farmers Association Member ID.");
    }

    // Step 2: Fetch data from the second step
    $personalAddress = $_POST["personalAddress"];
    $telephone = $_POST["telephone"];

    // Step 3: Fetch data from the third step
    $fieldAddress = $_POST["fieldAddress"];
    $fieldSize = $_POST["fieldSize"];

    // Step 4: Fetch data from the fourth step
    $accountNumber = $_POST["accountNumber"];
    $holderName = $_POST["holderName"];
    $branch = $_POST["branch"];

    // Step 5: Fetch data from the fifth step
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];

    // Validate password matching
    if ($password !== $repeatPassword) {
        die("Passwords do not match.");
    }

    // Insert data into the user table
    // Assume userType is always "farmer"
    $userType = "farmer";
    $sql = "INSERT INTO user (userName, password, userType) VALUES ('$username', '$password', '$userType')";
    if ($conn->query($sql) !== TRUE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    // Retrieve the generated userID
    $userID = $conn->insert_id;

    // Insert data into the farmer table
    $sql = "INSERT INTO farmer (personalAddress, telephone, fieldAddress, fieldSize, accountNumber, holderName, branch, userID, memberID, NIC) 
            VALUES ('$personalAddress', '$telephone', '$fieldAddress', '$fieldSize', '$accountNumber', '$holderName', '$branch', '$userID', '$associationMemberID', '$nic')";
    if ($conn->query($sql) !== TRUE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    // Update userID in the farmer table for the corresponding farmerID
    $farmerID = $conn->insert_id;
    $sql = "UPDATE farmer SET userID = '$userID' WHERE farmerID = '$farmerID'";
    if ($conn->query($sql) !== TRUE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    // Update memberID in the farmer table for the corresponding userID
    $sql = "UPDATE farmer SET memberID = '$associationMemberID' WHERE userID = '$userID'";
    if ($conn->query($sql) !== TRUE) {
        die("Error: " . $sql . "<br>" . $conn->error);
    }

    // Close the database connection
    $conn->close();

    // Registration successful message
    echo "Registration successful!";

?>
