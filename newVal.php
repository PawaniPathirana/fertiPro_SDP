<?php


include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}
// Check if the connection was successful


// Check if the user has submitted the form
if (isset($_POST['submit'])) {

    // Get the form data
    $nic = $_POST['nic'];
    $gn_division = $_POST['gn_division'];
    $fa_registration_number = $_POST['fa_registration_number'];
    $fa_member_id = $_POST['fa_member_id'];
    $personal_address = $_POST['personal_address'];
    $telephone = $_POST['telephone'];
    $field_address = $_POST['field_address'];
    $field_size = $_POST['field_size'];
    $account_number = $_POST['account_number'];
    $holder_name = $_POST['holder_name'];
    $branch = $_POST['branch'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if the NIC is already in the database
    $sql = "SELECT * FROM fa_member WHERE nic='$nic'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        echo "The NIC is already in the database.";
    } else {

        // Insert the user into the fa_member table
        $sql = "INSERT INTO fa_member (nic, gn_division, fa_registration_number, fa_member_id) VALUES ('$nic', '$gn_division', '$fa_registration_number', '$fa_member_id')";
        mysqli_query($conn, $sql);

        // Get the member ID from the fa_member table
        $sql = "SELECT memberID FROM fa_member WHERE nic='$nic'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $memberID = $row['memberID'];

        // Insert the user into the user table
        $sql = "INSERT INTO user (username, password, userType) VALUES ('$username', '$password', 'farmer')";
        mysqli_query($conn, $sql);

        // Get the user ID from the user table
        $sql = "SELECT userID FROM user WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $userID = $row['userID'];

        // Insert the farmer details into the farmer table
        $sql = "INSERT INTO farmer (farmerID, personalAddress, telephone, fieldAddress, fieldSize, accountNumber, holderName, branch, userID, memberID, nic) VALUES (NULL, '$personal_address', '$telephone', '$field_address', '$field_size', '$account_number', '$holder_name', '$branch', '$userID', '$memberID', '$nic')";
        mysqli_query($conn, $sql);

        // Success message
        echo "You have successfully registered.";
    }
}

?>
