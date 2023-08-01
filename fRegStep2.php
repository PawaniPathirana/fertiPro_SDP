<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <style>
    .error{
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
    }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area">
            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <h2 class="mb-3">Registration</h2>
                        <?php
                            // Display error message if it exists in the URL parameters
                            if (isset($_GET['error'])) {
                                echo '<p class="error">' . $_GET['error'] . '</p>';
                            }
                        ?>
                    </div>
                    <form id="registrationForm" action="f2.php" method="POST">
                        <!-- Step 1 -->
                        <div class="step step-1">
                            <div class="mb-3">
                           <!-- <h2 class="mb-1">Personal Info</h2>-->
                                <label for="personalAddress" class="form-label">Personal Address:</label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Personal Address" name="personalAddress" required>
                            </div>
                            <div class="mb-3">
                                <label for="telephone" class="form-label">Telephone:</label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6 validatePhoneNumber" placeholder="Telephone" name="telephone" required>
                            </div>
                            <button type="button" class="btn btn-primary next-btn">Next</button>
                        </div>
                        <!-- Step 2 -->
                        <div class="step step-2" style="display: none;">
                            <div class="mb-3">
                                <label for="fieldAddress" class="form-label">Field Address:</label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Field Address" name="fieldAddress" required>
                            </div>
                            <div class="mb-3">
                                <label for="fieldSize" class="form-label">Field Size:</label>
                                <input type="number" class="form-control form-control-lg bg-light fs-6" placeholder="Field Size" name="fieldSize" required>
                            </div>
                            <button type="button" class="btn btn-primary prev-btn">Previous</button>
                            <button type="button" class="btn btn-primary next-btn">Next</button>
                        </div>
                        <!-- Step 3 -->
                        <div class="step step-3" style="display: none;">
                            <div class="mb-3">
                                <label for="accountNumber" class="form-label">Account Number:</label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Account Number" name="accountNumber" required>
                            </div>
                            <div class="mb-3">
                                <label for="holderName" class="form-label">Holder Name:</label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Holder Name" name="holderName" required>
                            </div>
                            <div class="mb-3">
                                <label for="branch" class="form-label">Branch:</label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Branch" name="branch" required>
                            </div>
                            <button type="button" class="btn btn-primary prev-btn">Previous</button>
                            <button type="button" class="btn btn-primary next-btn">Next</button>
                        </div>
                        <!-- Step 4 -->
                        <div class="step step-4" style="display: none;">
                            <div class="mb-3">
                                <label for="userName" class="form-label">Username:</label>
                                <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Username" name="userName" required>
                            </div>
                            <div class="mb-3">
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Password" name="password" required>
                            </div>
                            <div class="mb-3">
                                <label for="repeatPassword" class="form-label">Repeat Password:</label>
                                <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Repeat Password" name="repeatPassword" required>
                            </div>
                            <input type="hidden" name="NIC" value="<?php echo $NIC; ?>">
                            <button type="button" class="btn btn-primary prev-btn">Previous</button>
                            <button type="submit" class="btn btn-primary submit-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div> 
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script>
        // This code will handle the navigation between steps in the multi-step form
        $(document).ready(function() {
            const steps = $(".step");
            let currentStep = 0;

            steps.hide();
            steps.eq(currentStep).show();

            $(".next-btn").click(function() {
                steps.eq(currentStep).hide();
                currentStep++;
                steps.eq(currentStep).show();

                updateButtons();
            });

            $(".prev-btn").click(function() {
                steps.eq(currentStep).hide();
                currentStep--;
                steps.eq(currentStep).show();

                updateButtons();
            });

            function updateButtons() {
                $(".prev-btn").toggle(currentStep > 0);
                $(".next-btn").toggle(currentStep < steps.length - 1);
                $(".submit-btn").toggle(currentStep === steps.length - 1);
            }
        });
    </script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="js/fRegStep2Validation.js"></script>
</body>
</html>

