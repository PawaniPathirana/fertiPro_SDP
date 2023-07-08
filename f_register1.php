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
        .tab {
            display: none;
        }
        /* Make circles that indicate the steps of the form: */
        .step {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbbbbb;
            border: none;  
            border-radius: 50%;
            display: inline-block;
            opacity: 0.5;
        }

        .step.active {
            opacity: 1;
        }

        /* Mark the steps that are finished and valid: */
        .step.finish {
            background-color: #04AA6D;
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
                <div style="text-align:center;margin-top:40px;">
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                    <span class="step"></span>
                </div>
                <?php if (isset($_GET['error'])){?>
                    <p class="error"><?php echo $_GET['error'];?></p>
                <?php }?>
                <form action="f_register1Val.php" method="POST" id="regForm">
                    <div class="tab">
                        <label for="personalAddress">Personal Address</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="personalAddress" placeholder="Personal Address" name="personalAddress" required>
                        </div>
                        <div class="invalid-feedback">
                            Personal Address is required
                        </div>
                        <div id="personalAddressError" class="error"></div>
                        
                        <label for="nic">NIC</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="nic" placeholder="NIC" name="nic" required>
                        </div>
                        <div class="invalid-feedback">
                            NIC is required
                        </div>
                        <div id="nicError" class="error"></div>
                        
                        <label for="telephone">Telephone</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="telephone" placeholder="Telephone" name="telephone" required>
                        </div>
                        <div class="invalid-feedback">
                            Telephone is required
                        </div>
                        <div id="telephoneError" class="error"></div>
                    </div>
                    <div class="tab">
                        <label for="fieldAddress">Field Address</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="fieldAddress" placeholder="Field Address" name="fieldAddress" required>
                        </div>
                        <div class="invalid-feedback">
                            Field Address is required
                        </div>
                        <div id="fieldAddressError" class="error"></div>
                        
                        <label for="fieldSize">Field Size</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="fieldSize" placeholder="Field Size" name="fieldSize" required>
                        </div>
                        <div class="invalid-feedback">
                            Field Size is required
                        </div>
                        <div id="fieldSizeError" class="error"></div>
                    </div>
                    <div class="tab">
                        <label for="accountNumber">Account Number</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="accountNumber" placeholder="Account Number" name="accountNumber" required>
                        </div>
                        <div class="invalid-feedback">
                            Account Number is required
                        </div>
                        <div id="accountNumberError" class="error"></div>
                        
                        <label for="holderName">Holder Name</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="holderName" placeholder="Holder Name" name="HolderName" required>
                        </div>
                        <div class="invalid-feedback">
                            Holder Name is required
                        </div>
                        <div id="holderNameError" class="error"></div>
                        
                        <label for="branch">Branch</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="branch" placeholder="Branch" name="Branch" required>
                        </div>
                        <div class="invalid-feedback">
                            Branch is required
                        </div>
                        <div id="branchError" class="error"></div>
                    </div>
                    <div class="tab">
                        <label for="userName">NIC</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" id="userName" placeholder="NIC" name="userName" required>
                        </div>
                        <div class="invalid-feedback">
                            NIC is required
                        </div>
                        <div id="userNameError" class="error"></div>
                        
                        <label for="password">Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="invalid-feedback">
                            Password is required
                        </div>
                        <div id="passwordError" class="error"></div>
                        
                        <label for="repeatPassword">Repeat Password</label>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control form-control-lg bg-light fs-6" id="repeatPassword" placeholder="Repeat Password" name="repeatPassword" required>
                        </div>
                        <div class="invalid-feedback">
                            Password is required
                        </div>
                        <div id="repeatPasswordError" class="error"></div>
                    </div>

                    <br>
                    <div style="overflow:auto;">
                        <div style="float:right;">
                            <button class="btn btn-primary" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
                            <button class="btn btn-primary" type="button" id="nextBtn" onclick="nextPrev(1)">Next</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            //... and fix the Previous/Next buttons
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            //... and run a function that will display the correct step indicator:
            fixStepIndicator(n);
            // Check if the current tab is the last tab
            if (currentTab == (x.length - 1)) {
                // If it is, disable the "Next" button
                document.getElementById("nextBtn").disabled = true;
            } else {
                // Otherwise, re-enable the "Next" button
                document.getElementById("nextBtn").disabled = false;
            }
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form...
            if (currentTab >= x.length) {
                // ... the form gets submitted:
                document.getElementById("regForm").submit();
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
    // This function deals with validation of the form fields
    var x, y, i, valid = true;
    x = document.getElementsByClassName("tab");
    y = x[currentTab].getElementsByTagName("input");
    // A loop that checks every input field in the current tab:
    for (i = 0; i < y.length; i++) {
        // If a field is empty...
        if (y[i].value == "") {
            // add an "invalid" class to the field:
            y[i].className += " invalid";
            // and set the current valid status to false
            valid = false;

            // Display error message
            var errorId = y[i].id + "Error";
            document.getElementById(errorId).textContent = y[i].name + " is required";
        } else {
            // Clear error message if field is not empty
            var errorId = y[i].id + "Error";
            document.getElementById(errorId).textContent = "";
        }
    }
    // If the valid status is true, mark the step as finished and valid:
    if (valid) {
        document.getElementsByClassName("step")[currentTab].className += " finish";
        // Check if the current tab is the last tab
        if (currentTab == (x.length - 1)) {
            // Enable the submit button
            document.getElementById("nextBtn").disabled = false;
        }
    } else {
        // Disable the submit button if there are validation errors
        document.getElementById("nextBtn").disabled = true;
    }
    return valid; // return the valid status
}


        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class on the current step:
            x[n].className += " active";
        }
    </script>

</body>
</html>
