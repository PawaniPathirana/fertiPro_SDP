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
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Quantities</title>
</head>
<body>

<!-- Display the results -->
<div style="padding: 20px;">
    <h2 style="color: #103cbe;">Total Fertilizer Quantities for GN Division:</h2>
    <p><strong>GN Division Name:</strong> <?php echo $selectedDivision; ?></p>
    <p><strong>Total Quantity of Urea:</strong> <?php echo $fertilizerQuantities['urea']; ?></p>
    <p><strong>Total Quantity of MOP:</strong> <?php echo $fertilizerQuantities['mop']; ?></p>
    <p><strong>Total Quantity of TSP:</strong> <?php echo $fertilizerQuantities['tsp']; ?></p>
</div>

</body>
</html>
