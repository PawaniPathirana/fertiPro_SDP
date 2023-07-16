<?php
include "dbConn.php"; // Include your database connection file

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $personalAddress = $_POST["personalAddress"];
    $nic = $_POST["nic"];
    $telephone = $_POST["telephone"];
    $fieldAddress = $_POST["fieldAddress"];
    $fieldSize = $_POST["fieldSize"];
    $accountNumber = $_POST["accountNumber"];
    $holderName = $_POST["HolderName"];
    $branch = $_POST["Branch"];
    $userName = $_POST["userName"];
    $password = $_POST["password"];

    // Insert data into the user table
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Hash the password for security
    $userInsertQuery = "INSERT INTO user (userName, password, userType) VALUES (?, ?, ?)";
    $userStmt = $pdo->prepare($userInsertQuery);
    $userStmt->execute([$userName, $hashedPassword, 'farmer']);
    $userID = $pdo->lastInsertId();

    // Insert data into the farmer table
    $farmerInsertQuery = "INSERT INTO farmer (personalAddress, telephone, userID, fieldAddress, fieldSize, accountNumber, holderName, branch) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $farmerStmt = $pdo->prepare($farmerInsertQuery);
    $farmerStmt->execute([$personalAddress, $telephone, $userID, $fieldAddress, $fieldSize, $accountNumber, $holderName, $branch]);

    // Redirect to a success page or perform any other necessary actions
    header("Location: success.php");
    exit();
}
?>
