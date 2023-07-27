<!DOCTYPE html>
<html>
<head>
    <title>Order Form</title>
    <!-- Bootstrap CSS link -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <form method="post" action="farmer_orderVal.php">
            <div class="form-group">
                <label for="farmerNIC">Farmer NIC:</label>
                <input type="text" class="form-control" id="farmerNIC" name="farmerNIC" required>
            </div>
            <div class="form-group">
                <label for="gnDivision">GN Division:</label>
                <input type="text" class="form-control" id="gnDivision" name="gnDivision" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
