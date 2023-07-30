<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fertilizer Calculator</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>
<body>

<h2>Fertilizer Calculator</h2>

<form method="POST" action="delee.php">

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

</form>

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

</body>
</html>

