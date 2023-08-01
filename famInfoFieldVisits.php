<?php
// Connect to the database
include "dbConn.php";

// Start the session (if not already started)
session_start();

// Check if gnDivisionID is set in the session
if (!isset($_SESSION["gnDivisionID"])) {
    die("Error: GN Division ID not found in the session.");
}

// Sanitize the gnDivisionID to prevent SQL injection
$gnDivisionID = mysqli_real_escape_string($con, $_SESSION["gnDivisionID"]);

$sql = "SELECT
    farmers.farmerID,
    farmers.personalAddress,
    farmers.telephone,
    farmers.fieldAddress,
    farmers.fieldSize,
    farmers.accountNumber,
    farmers.holderName,
    farmers.branch,
    farmers.userID,
    farmers.memberID,
    farmers.NIC
FROM
    farmers
WHERE
    farmers.farmerID NOT IN (
        SELECT
            fieldvisit.farmerID
        FROM
            fieldvisit
    )
    AND farmers.gnDivisionID = '$gnDivisionID'";

$result = mysqli_query($con, $sql);

if ($result === false) {
    die("Error: " . mysqli_error($con));
}

echo "<table border='1'>";
echo "<thead>";
echo "<tr>";
echo "<th>Farmer ID</th>";
echo "<th>Personal Address</th>";
echo "<th>Telephone</th>";
echo "<th>Field Address</th>";
echo "<th>Field Size</th>";
echo "<th>Account Number</th>";
echo "<th>Holder Name</th>";
echo "<th>Branch</th>";
echo "<th>User ID</th>";
echo "<th>Member ID</th>";
echo "<th>NIC</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["farmerID"] . "</td>";
    echo "<td>" . $row["personalAddress"] . "</td>";
    echo "<td>" . $row["telephone"] . "</td>";
    echo "<td>" . $row["fieldAddress"] . "</td>";
    echo "<td>" . $row["fieldSize"] . "</td>";
    echo "<td>" . $row["accountNumber"] . "</td>";
    echo "<td>" . $row["holderName"] . "</td>";
    echo "<td>" . $row["branch"] . "</td>";
    echo "<td>" . $row["userID"] . "</td>";
    echo "<td>" . $row["memberID"] . "</td>";
    echo "<td>" . $row["NIC"] . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

echo "<p>GN Division: " . $_SESSION["gnDivisionName"] . "</p>";
?>
