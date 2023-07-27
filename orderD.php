<!DOCTYPE html>
<html>
<head>
    <title>GN Division Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2>GN Division Selection</h2>
        <form method="post" action="order.php">
            <div class="form-group">
                <label for="gnDivision">Select GN Division:</label>
                <input class="form-control" id="gnDivision" name="gnDivision">
                    <!-- Add options dynamically using PHP -->
                    <?php
                    // Replace 'your_database_name' with your actual database name
                    $con=mysqli_connect("localhost","root","","fertidb",3307);
                    if ($con) {
                        $query = "SELECT gn_division_id, gnDivisionName FROM gn_division";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['gn_division_id']}'>{$row['gnDivisionName']}</option>";
                        }
                        mysqli_close($con);
                    }
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
