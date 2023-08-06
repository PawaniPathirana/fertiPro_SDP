<?php

include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["uname"];
    $password = $_POST["password"];

    if (empty($username)) {
        header("Location: login.php?error=Username is required");
        exit();
    } else if (empty($password)) {
        header("Location: login.php?error=Password is required");
        exit();
    } else {
        $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password' ";

        $result = mysqli_query($con, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userType = $row["userType"];

            $_SESSION["username"] = $username;

            if ($userType == "AR_Officer") {
                $sql = "SELECT staffID FROM staffmember WHERE userID = '$username' ";

                $result = mysqli_query($con, $sql);

                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $staffID = $row["staffID"];

                    $sql = "SELECT gn_divisionID FROM ar_officer WHERE staffID = '$staffID' ";
                   
                    $result = mysqli_query($con, $sql);

                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        $gnDivisionID = $row["gn_divisionID"];
                        $_SESSION["gn_divisionID"] = $gn_divisionID;
                        $sql = "SELECT gnDivisionName FROM gn_division WHERE gn_divisionID = '$gnDivisionID' ";

                        $result = mysqli_query($con, $sql);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $row = mysqli_fetch_assoc($result);
                            $gnDivisionName = $row["gnDivisionName"];

                            $_SESSION["gnDivisionName"] = $gnDivisionName;

                        }
                    }
                }
            }

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
                    header("Location: ARHome1.php");
                    break;
                    case "management_assistant":
                        header("Location: MAHome1.php");
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
