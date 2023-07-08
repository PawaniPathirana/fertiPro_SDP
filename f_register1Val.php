<?php
include "dbConn.php";

if (isset($_POST["nic"], $_POST["personalAddress"], $_POST["telephone"], $_POST["fieldAddress"], $_POST["fieldSize"], $_POST["accountNumber"], $_POST["holderName"], $_POST["username"], $_POST["password"], $_POST["branch"], $_POST["repeatPassword"])) {

    // Retrieve form data
    $nic = $_POST["nic"];
    $personalAddress = $_POST["personalAddress"];
    $telephone = $_POST["telephone"];
    $fieldAddress = $_POST["fieldAddress"];
    $fieldSize = $_POST["fieldSize"];
    $accountNumber = $_POST["accountNumber"];
    $holderName = $_POST["HolderName"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repeatPassword = $_POST["repeatPassword"];
    $branch = $_POST["branch"];
    $userType = "farmer";

    // Check if form fields are filled in
    if (empty($nic) || empty($personalAddress) || empty($telephone) || empty($fieldAddress) || empty($fieldSize) || empty($accountNumber) || empty($holderName) || empty($username) || empty($password) || empty($repeatPassword)) {
        echo "Some form fields are missing.";
    } else {
        // Check if the NIC exists in fa_member table
        $checkQuery = "SELECT memberID FROM fa_member WHERE NIC = '$nic'";
        $checkResult = mysqli_query($con, $checkQuery);

        if ($checkResult && mysqli_num_rows($checkResult) > 0) {
            $row = mysqli_fetch_assoc($checkResult);
            $memberID = $row["memberID"];

            $query = "INSERT INTO farmer (personalAddress, nic, telephone, fieldAddress, fieldSize, accountNumber, holderName, branch, memberID)
              VALUES ('$personalAddress', '$nic', '$telephone', '$fieldAddress', '$fieldSize', '$accountNumber', '$holderName', '$branch', '$memberID')";

            $result = mysqli_query($con, $query);

            if ($result) {
                $query_user = "INSERT INTO user (userName, password, userType)
                           VALUES ('$username', '$password', '$userType')";
                $result_user = mysqli_query($con, $query_user);

                if ($result_user) {
?>
                    <div id="regForm"><span class="success">Registration Success</span><h1>Registration Success</h1></div>
<?php
                } else {
?>
                    <div class="regForm"><h1>Oops!! Something went wrong.</h1></div>
<?php
                }
            } else {
?>
                <div class="regForm"><h1>Oops!! Something went wrong.</h1></div>
<?php
            }
        } else {
            echo "Invalid NIC or NIC does not exist in the fa_member table.";
        }
    }
} else {
    echo "Some form fields are missing.";
}
?>
