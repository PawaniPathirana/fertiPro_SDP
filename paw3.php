<?php
session_start(); // Start the session
// Retrieve the saved values from the session
$savedQuantityUrea = $_SESSION["recommendedQuantity"]["Urea"];
$savedQuantityMOP = $_SESSION["recommendedQuantity"]["MOP"];
$savedQuantityTSP = $_SESSION["recommendedQuantity"]["TSP"];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Fertilizer Calculator</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .container {
            max-width: 500px; /* Adjust the max width as needed */
        }
        .center-table {
            margin: 0 auto; /* Center the table horizontally */
        }
        table {
            width: 100%;
        }
        table th, table td {
            text-align: center;
            padding: 5px;
        }
    </style>
</head>
<body>
<div class="container">
    <h3>Add New Quantities</h3>
    <form action="" method="post">
        <div class="form-group">
            <label for="quantityUrea">Quantity of Urea (Max: <?php echo $savedQuantityUrea; ?>)</label>
            <input type="number" class="form-control" id="quantityUrea" name="quantityUrea_n" max="<?php echo $savedQuantityUrea; ?>">
        </div>
        <div class="form-group">
            <label for="quantityMOP">Quantity of MOP (Max: <?php echo $savedQuantityMOP; ?>)</label>
            <input type="number" class="form-control" id="quantityMOP" name="quantityMOP_n" max="<?php echo $savedQuantityMOP; ?>">
        </div>
        <div class="form-group">
            <label for "quantityTSP">Quantity of TSP (Max: <?php echo $savedQuantityTSP; ?>)</label>
            <input type="number" class="form-control" id="quantityTSP" name="quantityTSP_n" max="<?php echo $savedQuantityTSP; ?>">
        </div>

        <?php
        $farmerID = $_SESSION['farmerID'];
        $arOfficerID = $_SESSION["ar_officerID"];
        ?>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
<br>
<?php
// Connect to the database
include "dbConn.php";

if ($con === false) {
    die("Connection error");
}

// Set default values for the variables
$quantityUrea = 0;
$quantityMOP = 0;
$quantityTSP = 0;
$priceUrea1 = 0;
$priceMOP1 = 0;
$priceTSP1 = 0;
$totalPrice1 = 0;

// Check if the form has been submitted before accessing $_POST values
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the quantity of each fertilizer if they are set
    $quantityUrea = isset($_POST["quantityUrea_n"]) ? $_POST["quantityUrea_n"] : 0;
    $quantityMOP = isset($_POST["quantityMOP_n"]) ? $_POST["quantityMOP_n"] : 0;
    $quantityTSP = isset($_POST["quantityTSP_n"]) ? $_POST["quantityTSP_n"] : 0;

    // Check if input quantities are greater than recommended quantities
    if ($quantityUrea > $savedQuantityUrea || $quantityMOP > $savedQuantityMOP || $quantityTSP > $savedQuantityTSP) {
        echo '<p style="color: red;">Input quantities should be less than or equal to the recommended quantities.</p>';
    } else {
        // Get the unit price of each fertilizer from the database
        $query = "SELECT fertilizerType, unitPrice FROM fertilizer_data WHERE fertilizerType IN ('Urea', 'MOP', 'TSP')";
        $result = mysqli_query($con, $query);

        // Store the unit prices in an associative array for easier access
        $unitPrices = array();
        while ($row = mysqli_fetch_assoc($result)) {
            $unitPrices[$row['fertilizerType']] = $row['unitPrice'];
        }

        // Calculate the price of each fertilizer
        $_SESSION["quantityUrea"] = $quantityUrea;
        $_SESSION["quantityMOP"] = $quantityMOP;
        $_SESSION["quantityTSP"] = $quantityTSP;
        $priceUrea1 = $quantityUrea * $unitPrices['Urea'];
        $priceMOP1 = $quantityMOP * $unitPrices['MOP'];
        $priceTSP1 = $quantityTSP * $unitPrices['TSP'];
        $_SESSION["priceUrea_n"] = $priceUrea1;
        $_SESSION["priceMOP_n"] = $priceMOP1;
        $_SESSION["priceTSP_n"] = $priceTSP1;

        // Calculate the total price
        $totalPrice1 = $priceUrea1 + $priceMOP1 + $priceTSP1;
        $_SESSION["totalPrice"] = $totalPrice1;
    }
}

// Display the results
echo '<form method="POST" action="paw2.php">';
$farmerID = $_SESSION['farmerID'];
$arOfficerID = $_SESSION["ar_officerID"];

echo '<table class="styled-table" style="width: 70%; margin: 0 auto; border-collapse: collapse;">';
?>

<thead>
<tr>
    <th style='padding: 14px; border: 1px solid #ddd;'>Fertilizer</th>
    <th style='padding: 14px; border: 1px solid #ddd;'>Quantity</th>
    <th style='padding: 14px; border: 1px solid #ddd;'>Unit Price</th>
    <th style='padding: 14px; border: 1px solid #ddd;'>Price</th>
</tr>
</thead>
<tbody>
<tr style='padding: 15px; border: 1px solid #ddd;'>
    <td style='padding: 14px; border: 1px solid #ddd;'>Urea</td>
    <td style='padding: 14px; border: 1px solid #ddd;'><?php echo $quantityUrea; ?></td>
    <?php
    if (isset($unitPrices['Urea'])) {
        echo '<td>' . $unitPrices['Urea'] . '</td>';
    } else {
        echo '<td>N/A</td>';
    }
    echo '<td>' . $priceUrea1 . '</td>';
    ?>
</tr>
<tr style='padding: 15px; border: 1px solid #ddd;'>
    <td style='padding: 14px; border: 1px solid #ddd;'>MOP</td>
    <td style='padding: 14px; border: 1px solid #ddd;'><?php echo $quantityMOP; ?></td>
    <?php
    if (isset($unitPrices['MOP'])) {
        echo '<td>' . $unitPrices['MOP'] . '</td>';
    } else {
        echo '<td>N/A</td>';
    }
    echo '<td>' . $priceMOP1 . '</td>';
    ?>
</tr>
<tr style='padding: 15px; border: 1px solid #ddd;'>
    <td style='padding: 14px; border: 1px solid #ddd;'>TSP</td>
    <td style='padding: 14px; border: 1px solid #ddd;'><?php echo $quantityTSP; ?></td>
    <?php
    if (isset($unitPrices['TSP'])) {
        echo '<td>' . $unitPrices['TSP'] . '</td>';
    } else {
        echo '<td>N/A</td>';
    }
    echo '<td>' . $priceTSP1 . '</td>';
    ?>
</tr>
<tr style='padding: 15px; border: 1px solid #ddd;'>
    <td style='padding: 14px; border: 1px solid #ddd;'>Total</td>
    <td style='padding: 14px; border: 1px solid #ddd;'></td>
    <td style='padding: 14px; border: 1px solid #ddd;'></td>
    <td style='padding: 14px; border: 1px solid #ddd;'><?php echo $totalPrice1; ?></td>
</tr>

</tbody>
</table>
<br>
<button type="submit" class="btn btn-primary" id="orderButton" name="orderButton">Order</button>
</form>
<?php
mysqli_close($con);
?>
</body>
</html>
<!DOCTYPE html>
    <html>
    <head>
        
        <!-- Add your CSS styles and external scripts here, if needed -->
        <style>
            .styled-table{

                border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }
            .btn1{

                
               
                display: inline-block;
                outline: 0;
                cursor: pointer;
                border: none;
                padding: 0 56px;
                height: 45px;
                line-height: 45px;
                border-radius: 7px;
                background-color: #0070f3;
                color: white;
                font-weight: 400;
                font-size: 16px;
                box-shadow: 0 4px 14px 0 rgb(0 118 255 / 39%);
                transition: background 0.2s ease,color 0.2s ease,box-shadow 0.2s ease;
                :hover{
                    background: rgba(0,118,255,0.9);
                    box-shadow: 0 6px 20px rgb(0 118 255 / 23%);
                }
                

            }
            .btn2{

                
               
display: inline-block;
outline: 0;
cursor: pointer;
border: none;
padding: 0 56px;
height: 45px;
line-height: 45px;
border-radius: 7px;
background-color: #008000;
color: white;
font-weight: 400;
font-size: 16px;
box-shadow: 0 4px 14px 0 rgb(0 118 255 / 39%);
transition: background 0.2s ease,color 0.2s ease,box-shadow 0.2s ease;
:hover{
    background: rgba(0,118,255,0.9);
    box-shadow: 0 6px 20px rgb(0 118 255 / 23%);
}


}

    .image-section {
        text-align: center;
        margin-top: 20px;
    }

    .image-section img {
        max-width: 100%;
        height: auto;
        margin: 10px;
    }

    .container{
        border-collapse: collapse;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    margin: 0 auto; /* Center the table horizontally */ 
    }
    #orderButton {
    display: block;
    margin: 0 auto; /* Add this line to center the button horizontally */
}

</style>

        </style>
    </head>
    <body>
        <br><br><br>
    
</body>


    </html>
