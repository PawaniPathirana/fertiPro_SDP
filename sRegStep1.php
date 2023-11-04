<!DOCTYPE html>
<html>
<head>
    <title>Registration Step 1</title>
    <!-- Include Bootstrap 5.1.3 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
       body {
            background-image: url('https://i.ytimg.com/vi/bmfBAvSKB_8/maxresdefault.jpg'); /* Replace 'your-image-url.jpg' with the actual URL of your background image */
            background-size: cover;
            background-repeat: no-repeat;
        }

        .box-area {
            max-width: 600px; /* Adjust the max-width to your preferred size */
            margin: 0 auto; /* Center the box horizontally */
            padding: 20px; /* Add some padding to the box */
            border-radius: 20px;
        }
    </style>
</head>
<body>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-4 bg-white shadow box-area"  >
            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-5">
                        <form action="process_step1.php" method="POST"> <!-- Update action attribute -->
                            <h2 class="mb-3">Registration - Step 1</h2>
                            <!-- Display error message if it exists in the URL parameters -->
                            <?php
                                if (isset($_GET['error'])) {
                                    echo '<p class="error">' . $_GET['error'] . '</p>';
                                }
                            ?>
                    </div>
                    <div class="mb-3">
                        <label for="firstName" class="form-label">First Name:</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="firstName" name="firstName" required>
                    </div>
                    <div class="mb-3">
                        <label for="lastName" class="form-label">Last Name:</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="lastName" name="lastName" required>
                    </div>
                    <div class="mb-3">
                        <label for="employeeID" class="form-label">Employee ID:</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="employeeID" name="employeeID" required>
                    </div>
                    <div class="mb-3">
                        <label for="designation" class="form-label">Designation:</label>
                        <select class="form-control form-control-lg bg-light fs-6" id="designation" name="designation" required>
                            <option value="">Select Designation</option>
                            <option value="Divisional Officer">Divisional Officer</option>
                            <option value="Development Officer">Development Officer</option>
                            <option value="Agriculture Research Officer">Agriculture Research Officer</option>
                            <option value="Management Assistant">Management Assistant</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Next</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
