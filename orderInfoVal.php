<?php
include "dbConn.php";

session_start();
if ($con === false) {
    die("Connection error");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($con) {
        $selectedDivision = $_POST["gnDivision"];

        // Retrieve the corresponding GN Division ID based on the selected GN Division name
        $query = "SELECT gn_division_id FROM gn_division WHERE gnDivisionName = '$selectedDivision'";
        $result = mysqli_query($con, $query);
        $row = mysqli_fetch_assoc($result);
        $gnDivisionID = $row["gn_division_id"];

        // Retrieve the relevant ar_officerID for the selected GN Division
        $query = "SELECT ar_officerID FROM ar_officer WHERE gn_division_id = $gnDivisionID";
        $result = mysqli_query($con, $query);
        $arOfficerIDs = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $arOfficerIDs[] = $row["ar_officerID"];
        }

        // Retrieve the total quantity of each fertilizer for each relevant ar_officerID
        $fertilizerQuantities = array(
            "urea" => 0,
            "mop" => 0,
            "tsp" => 0
        );

        foreach ($arOfficerIDs as $arOfficerID) {
            $query = "SELECT quantityOfUrea, quantityOfMOP, quantityOfTSP FROM orders WHERE ar_officerID = $arOfficerID";
            $result = mysqli_query($con, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $fertilizerQuantities["urea"] += $row["quantityOfUrea"];
                $fertilizerQuantities["mop"] += $row["quantityOfMOP"];
                $fertilizerQuantities["tsp"] += $row["quantityOfTSP"];
            }
        }

        mysqli_close($con);

        // Display the results
        echo "<h2>Total Fertilizer Quantities for GN Division:</h2>";
        //echo "<p>GN Division ID: $gnDivisionID</p>";
        echo "<p>GN Division Name: $selectedDivision</p>";
        echo "<p>Total Quantity of Urea: {$fertilizerQuantities['urea']}</p>";
        echo "<p>Total Quantity of MOP: {$fertilizerQuantities['mop']}</p>";
        echo "<p>Total Quantity of TSP: {$fertilizerQuantities['tsp']}</p>";
    }
}
?>
