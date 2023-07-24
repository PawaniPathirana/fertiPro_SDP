<?php
include "dbConn.php";

// Retrieve form data
$ureaQuantity = $_POST['urea_quantity'];
$ureaUnitPrice = $_POST['urea_unit_price'];
$tspQuantity = $_POST['tsp_quantity'];
$tspUnitPrice = $_POST['tsp_unit_price'];
$mopQuantity = $_POST['mop_quantity'];
$mopUnitPrice = $_POST['mop_unit_price'];

// Prepare and bind the SQL statement
$stmt = $con->prepare('INSERT INTO fertilizer_data (fertilizerType, quantityPerUnit, unitPrice) VALUES (?, ?, ?)');

// Bind parameters and execute the statement for each fertilizer type
$stmt->bind_param('sdd', $fertilizerType, $quantityPerUnit, $unitPrice);

// Urea
$fertilizerType = 'Urea';
$quantityPerUnit = $ureaQuantity;
$unitPrice = $ureaUnitPrice;
$stmt->execute();

// T.S.P.
$fertilizerType = 'T.S.P.';
$quantityPerUnit = $tspQuantity;
$unitPrice = $tspUnitPrice;
$stmt->execute();

// M.O.P.
$fertilizerType = 'M.O.P.';
$quantityPerUnit = $mopQuantity;
$unitPrice = $mopUnitPrice;
$stmt->execute();

// Close the statement and connection
$stmt->close();
$con->close();

// Redirect back to the form page with a success message
header('Location: management_assistantHome.php?success=true');
exit();
?>
