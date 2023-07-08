<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <title>Staff Registration Stage1</title>
    <style>
        .custom-container {
            width: 600px;
            margin: auto;
        }
        .custom-container h2 {
            text-align: center;
        }
    </style>
</head>
<body>
    <!-- Main Container -->
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <!-- Form Container -->
            <div class="col-md-12 custom-container">
                <h2>Registration</h2>
                <p>Please provide your details to complete the registration process</p>
                <?php if (isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET['error'];?></p>
                <?php }?>
                <form action="f_registerVal.php" method="POST">
                    <label for="nic">National Identity Card Number</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="nic" placeholder="NIC" name="nic">
                    </div>
                    <label for="staff-id">Staff ID</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="staff-id" placeholder="Staff ID" name="GN_Division">
                    </div>
                    <label for="designation">Designation</label>
                    <div class="input-group mb-3">
                        <select class="form-select form-select-lg bg-light fs-6" id="designation" name="designation">
                            <option selected disabled>Select Designation</option>
                            <option value="Development Officer">Divisional Officer</option>
                            <option value="Agriculture Service Officer">Development Officer</option>
                            <option value="Management Assistent">Agriculture Research Officer</option>
                            <option value="Manager">Management Assistant</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-primary w-100 fs-6">Save and Next</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-danger w-100 fs-6">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
