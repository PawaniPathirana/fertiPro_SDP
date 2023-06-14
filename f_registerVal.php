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
        header("Location: login.php?error=Username is required");
        exit();
    } else if (empty($GN_Division)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else if (empty($fa_RegNum)) {
        header("Location: login.php?error=Password is required");
        exit();
    }else if (empty($fa_memberID)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";

        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userType = $row["userType"];

            $_SESSION["username"] = $username;

            switch ($userType) {
                case "farmer":
                    header("Location: farmerHome.php");
                    break;
                case "admin":
                    header("Location: adminHome.php");
                    break;
                case "devOfficer":
                    header("Location: devOfficerHome.php");
                    break;
                case "AR_Officer":
                    header("Location: AR_OfficerHome.php");
                    break;
                default:
                    header("Location: login.php?error=Invalid User Type");
                    break;
            }
            exit();
        } else {
            header("Location: login.php?error=Incorrect Username or password");
            exit();
        }
    }
}

?>






