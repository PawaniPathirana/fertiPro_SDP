<!DOCTYPE html>
<html>
<head>
    <title>Farmer Registration</title>
    <!-- Add Bootstrap CSS link here -->
    <!-- Add your custom CSS styles if necessary -->
</head>
<body>
    <div class="container">
        <h1>Farmer Registration</h1>
        <form id="registrationForm" method="post" action="registerUserVal.php">
            <!-- Step 1: NIC, GN Division, Farmers' Association Registration Number, Farmers Association Member ID -->
            <div id="step1">
                <div class="form-group">
                    <label for="nic">NIC</label>
                    <input type="text" class="form-control" id="nic" name="nic" required>
                </div>
                <div class="form-group">
                    <label for="gnDivision">GN Division</label>
                    <input type="text" class="form-control" id="gnDivision" name="gnDivision" required>
                </div>
                <div class="form-group">
                    <label for="associationRegNumber">Farmers' Association Registration Number</label>
                    <input type="text" class="form-control" id="associationRegNumber" name="associationRegNumber" required>
                </div>
                <div class="form-group">
                    <label for="associationMemberID">Farmers Association Member ID</label>
                    <input type="text" class="form-control" id="associationMemberID" name="associationMemberID" required>
                </div>
                <button type="button" class="btn btn-primary" id="nextStep1">Next</button>
            </div>

            <!-- Step 2: Personal Address, Telephone -->
            <div id="step2" style="display: none;">
                <div class="form-group">
                    <label for="personalAddress">Personal Address</label>
                    <input type="text" class="form-control" id="personalAddress" name="personalAddress" required>
                </div>
                <div class="form-group">
                    <label for="telephone">Telephone</label>
                    <input type="text" class="form-control" id="telephone" name="telephone" required>
                </div>
                <button type="button" class="btn btn-primary" id="nextStep2">Next</button>
            </div>

            <!-- Step 3: Field Address, Field Size -->
            <div id="step3" style="display: none;">
                <div class="form-group">
                    <label for="fieldAddress">Field Address</label>
                    <input type="text" class="form-control" id="fieldAddress" name="fieldAddress" required>
                </div>
                <div class="form-group">
                    <label for="fieldSize">Field Size</label>
                    <input type="text" class="form-control" id="fieldSize" name="fieldSize" required>
                </div>
                <button type="button" class="btn btn-primary" id="nextStep3">Next</button>
            </div>

            <!-- Step 4: Account Number, Holder Name, Branch -->
            <div id="step4" style="display: none;">
                <div class="form-group">
                    <label for="accountNumber">Account Number</label>
                    <input type="text" class="form-control" id="accountNumber" name="accountNumber" required>
                </div>
                <div class="form-group">
                    <label for="holderName">Holder Name</label>
                    <input type="text" class="form-control" id="holderName" name="holderName" required>
                </div>
                <div class="form-group">
                    <label for="branch">Branch</label>
                    <input type="text" class="form-control" id="branch" name="branch" required>
                </div>
                <button type="button" class="btn btn-primary" id="nextStep4">Next</button>
            </div>

            <!-- Step 5: Username and Password -->
            <div id="step5" style="display: none;">
                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <div class="form-group">
                    <label for="repeatPassword">Repeat Password</label>
                    <input type="password" class="form-control" id="repeatPassword" name="repeatPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </form>
    </div>

    <!-- Add Bootstrap JS and any custom JS scripts here -->
    <script>
        document.getElementById('nextStep1').addEventListener('click', function() {
            document.getElementById('step1').style.display = 'none';
            document.getElementById('step2').style.display = 'block';
        });

        document.getElementById('nextStep2').addEventListener('click', function() {
            document.getElementById('step2').style.display = 'none';
            document.getElementById('step3').style.display = 'block';
        });

        document.getElementById('nextStep3').addEventListener('click', function() {
            document.getElementById('step3').style.display = 'none';
            document.getElementById('step4').style.display = 'block';
        });

        document.getElementById('nextStep4').addEventListener('click', function() {
            document.getElementById('step4').style.display = 'none';
            document.getElementById('step5').style.display = 'block';
        });
    </script>
</body>
</html>
