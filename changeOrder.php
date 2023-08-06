<!DOCTYPE html>
<html>
<head>
<title>Fertilizer Calculator</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1>Fertilizer Calculator</h1>
<form action="" method="post">
<div class="form-group">
<label for="quantityUrea">Quantity of Urea</label>
<input type="number" class="form-control" id="quantityUrea" name="quantityUrea_n">
</div>
<div class="form-group">
<label for="quantityMOP">Quantity of MOP</label>
<input type="number" class="form-control" id="quantityMOP" name="quantityMOP_n">
</div>
<div class="form-group">
<label for="quantityTSP">Quantity of TSP</label>
<input type="number" class="form-control" id="quantityTSP" name="quantityTSP_n">
</div>
<?php
      session_start();
      $farmerID = $_SESSION['farmerID'];
      $arOfficerID = $_SESSION['ar_officerID'];
      ?>
<button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

<?php
// Connect to the database
include "dbConn.php";
session_start();

if ($con === false) {
    die("Connection error");
}

// Set default values for the variables outside the conditional block
$quantityUrea = 0;
$quantityMOP = 0;
$quantityTSP = 0;

// Check if the form has been submitted before accessing $_POST values
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the quantity of each fertilizer if they are set
    $quantityUrea = isset($_POST["quantityUrea_n"]) ? $_POST["quantityUrea_n"] : 0;
    $quantityMOP = isset($_POST["quantityMOP_n"]) ? $_POST["quantityMOP_n"] : 0;
    $quantityTSP = isset($_POST["quantityTSP_n"]) ? $_POST["quantityTSP_n"] : 0;

    // Save the data in each cell in sessions
    $_SESSION["quantityUrea_n"] = $quantityUrea;
    $_SESSION["quantityMOP_n"] = $quantityMOP;
    $_SESSION["quantityTSP_n"] = $quantityTSP;
}

// Get the unit price of each fertilizer
$query = 'SELECT fertilizerType, quantityPerUnit, unitPrice FROM fertilizer_data';
$result = mysqli_query($con, $query);

// Store the unit prices in an associative array for easier access
$unitPrices = array();
while ($row = mysqli_fetch_assoc($result)) {
    $unitPrices[$row['fertilizerType']] = $row['unitPrice'];
}

// Calculate the price of each fertilizer
$priceUrea = $quantityUrea * $unitPrices['Urea'];
$priceMOP = $quantityMOP * $unitPrices['MOP'];
$priceTSP = $quantityTSP * $unitPrices['TSP'];
$_SESSION["priceUrea"] = $priceUrea;
$_SESSION["priceMOP"] = $priceMOP;
$_SESSION["priceTSP"] = $priceTSP;


// Calculate the total price
$totalPrice = $priceUrea + $priceMOP + $priceTSP;
$_SESSION["totalPrice"] = $totalPrice;

// Display the results
echo '<form method="POST" action="paw2.php">';
echo '<table class="table table-bordered">
<thead>
<tr>
<th>Fertilizer</th>
<th>Quantity</th>
<th>Unit Price</th>
<th>Price</th>
</tr>
</thead>
<tbody>
<tr>
<td>Urea</td>
<td>' . $quantityUrea . '</td>
<td>' . $unitPrices['Urea'] . '</td>

<td>' . $priceUrea . '</td>
</tr>
<tr>
<td>MOP</td>
<td>' . $quantityMOP . '</td>
<td>' . $unitPrices['MOP'] . '</td>
<td>' . $priceMOP . '</td>
</tr>
<tr>
<td>TSP</td>
<td>' . $quantityTSP . '</td>
<td>' . $unitPrices['TSP'] . '</td>
<td>' . $priceTSP . '</td>
</tr>
<tr>
<td>Total</td>
<td colspan="2"></td>
<td>' . $totalPrice . '</td>
</tr>
</tbody>
</table>';
echo "<button type='submit' class='btn btn-primary' id='orderButton' name='orderButton'>Order</button>";
           
            echo "</form>";
?>

</body>
</html>
