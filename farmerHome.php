<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
   <!-- <link rel="stylesheet" href="css/login.css">-->
    <style>
body{
    font-family: 'Poppins', sans-serif;
   background: #ececec;
  /*  background: url(https://images.pexels.com/photos/1509607/pexels-photo-1509607.jpeg?cs=srgb&dl=pexels-ashutosh-sonwani-1509607.jpg&fm=jpg) no-repeat center center fixed;
    */background-size: cover;
   
}


/*------------ Login container ------------*/

.box-area {
    width: 700px;
}

/*------------ Right box ------------*/

.right-box {
    padding: 40px 30px 40px 40px;
}

/*------------ Custom Placeholder ------------*/

::placeholder {
    font-size: 16px;
}

.rounded-4 {
    border-radius: 20px;
}

.rounded-5 {
    border-radius: 30px;
}

/*------------ For small screens------------*/

@media only screen and (max-width: 768px) {
    .box-area {
        margin: 0 10px;
    }

    .left-box {
        height: 100px;
        overflow: hidden;
    }

    .right-box {
        padding: 20px;
    }
}
</style>

</head>
<body>

   

    <!--<form method="POST" action="placeOrderVal.php" class="container">
        <div class="row">
            <div class="col-md-6">
                <label for="gnDivision">GN Division</label>
                <input type="text" class="form-control" id="gnDivision" name="gnDivision" required>
            </div>
            <div class="col-md-6">
                <label for="nic">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" required>
            </div>
        </div>

        <button type="submit" class="btn btn-primary">Calculate Fertilizer</button>

    </form>-->
    <div class="container d-flex justify-content-center align-items-center min-vh-100" >
        <div class="row border rounded-5 p-3 bg-white shadow box-area"  >
            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-5">
                        <form action="placeOrderVal.php" method="POST"> 
                            <h2 class="mb-3">Check the Required Fertilizer Quantity</h2>
                            <br><br>
                    <div class="mb-3">
                    <label for="nic" class="form-label fw-bold">National Identity Card Number:</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="NIC" name="nic" id="nic" required>
                    </div>
                    <br>
                    <div class="mb-3">
                        <label for="gn_division" class="form-label fw-bold">Grama Niladhari Division:</label>
                        <select class="form-control form-control-lg bg-light fs-6" id="gn_division" name="gnDivision" required>
                            <option value="">Select GN Division</option>
                            <option value="xxx-1">xxx-1</option>
                            <option value="yyy-2">yyy-2</option>
                            <option value="zzz-3">zzz-3</option>
                        </select>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Submit</button>
                </form>
            </div>
        </div> 
    </div>

    <!--
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Fertilizer Type</th>
                <th>Recommended Quantity</th>
                <th>Price per Unit</th>
                <th>Total Price for Recommended Quantity</th>
                <th>Change</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>

    <h3>Total Price of the Order: <span id="totalPrice"></span></h3>


    <script>
        $(document).ready(function() {
            // Calculate the total price of the order
            var totalPrice = 0;
            $("tbody").on("change", "input[type=number]", function() {
                var fertilizerType = $(this).closest("tr").find("td:first").text();
                var quantity = $(this).val();
                var pricePerUnit = $(this).data("price");
                totalPrice += quantity * pricePerUnit;
                $("#totalPrice").text(totalPrice);
            });

            // Add a change button to each row in the table
            $("tbody tr").each(function() {
                var $tr = $(this);
                var $quantityInput = $tr.find("input[type=number]");
                var $changeButton = $("<button type='button' class='btn btn-primary'>Change</button>");
                $changeButton.click(function() {
                    $quantityInput.val("").focus();
                });
                $tr.append($changeButton);
            });
        });
    </script>
    -->
</body>
</html>
