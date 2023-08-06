<div class="container-fluid d-flex justify-content-center align-items-center min-vh-100">
    <div class="row border rounded-5 p-3 bg-white shadow box-area" style="width: 600px;">
        <div class="col-md-12 right-box">
            <div class="row align-items-center">
                <div class="header-text mb-5">
                    <div class="container mt-5">
                        <h2>Check Orders</h2>
                        <form method="post" action="infoRarmer.php">
                            <div class="form-group">
                                <label for="gnDivision">Select GN Division:</label>
                                <select class="form-control" id="gnDivision" name="gnDivision" required>
                                    <!-- Add options manually -->
                                    <option value="xxx-1">xxx-1</option>
                                    <option value="yyy-2">yyy-2</option>
                                    <option value="zzz-3">zzz-3</option>
                                </select>
                                    <!-- Add options dynamically using PHP -->
                                    <?php
                                    // Replace 'your_database_name' with your actual database name
                                    /*$con=mysqli_connect("localhost","root","","fertidb",3307);
                                    if ($con) {
                                        $query = "SELECT gn_division_id, gnDivisionName FROM gn_division";
                                        $result = mysqli_query($con, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "<option value='{$row['gn_division_id']}'>{$row['gnDivisionName']}</option>";
                                        }
                                        mysqli_close($con);
                                    }*/
                                    ?>
                                </select>
                            </div>
                            <br><br>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>