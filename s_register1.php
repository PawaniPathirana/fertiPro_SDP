<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Registration</title>
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
                <form action="f_register1Val.php" method="POST">
                <div class="input-group mb-3">
                        <select class="form-select form-select-lg bg-light fs-6" id="designation" name="designation">
                            <option selected disabled>Select Designation</option>
                            <option value="Development Officer">Divisional Officer</option>
                            <option value="Agriculture Service Officer">Development Officer</option>
                            <option value="Management Assistent">Agriculture Research Officer</option>
                            <option value="Manager">Management Assistant</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="userName" class="form-label">Username</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="userName" placeholder="Username" name="userName" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" placeholder="Password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="repeatPassword" class="form-label">Repeat Password</label>
                        <input type="password" class="form-control form-control-lg bg-light fs-6" id="repeatPassword" placeholder="Repeat Password" name="repeatPassword" required>
                    </div>
                    <div class="text-center">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
