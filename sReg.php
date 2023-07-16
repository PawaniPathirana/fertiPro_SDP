<!DOCTYPE html>
<html>
<head>
  <title>Multi-Step Registration Form</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <style>
    .step-form {
      display: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Multi-Step Registration Form</h2>
    <form id="registrationForm" method="POST" action="process_registration.php">
      <div class="step-form" id="step1Form">
        <h3>Step 1</h3>
        <div class="form-group">
          <label for="firstName">First Name:</label>
          <input type="text" class="form-control" id="firstName" name="firstName" required>
        </div>
        <div class="form-group">
          <label for="lastName">Last Name:</label>
          <input type="text" class="form-control" id="lastName" name="lastName" required>
        </div>
        <div class="form-group">
          <label for="employeeID">Employee ID:</label>
          <input type="text" class="form-control" id="employeeID" name="employeeID" required>
        </div>
        <div class="form-group">
          <label for="designation">Designation:</label>
          <select class="form-control" id="designation" name="designation" required>
            <option value="">Select Designation</option>
            <option value="Divisional Officer">Divisional Officer</option>
            <option value="Development Officer">Development Officer</option>
            <option value="Agriculture Research Officer">Agriculture Research Officer</option>
            <option value="Management Assistant">Management Assistant</option>
          </select>
        </div>
        <button type="button" class="btn btn-primary" onclick="nextStep(2)">Next</button>
      </div>
      
      <div class="step-form" id="step2Form">
        <h3>Step 2</h3>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirmPassword">Confirm Password:</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="nextStep(1)">Previous</button>
        <button type="submit" class="btn btn-primary">Register</button>
      </div>
    </form>
  </div>

  <script>
    var currentStep = 1;

    function nextStep(step) {
      if (step === 1) {
        document.getElementById("step1Form").style.display = "block";
        document.getElementById("step2Form").style.display = "none";
        currentStep = 1;
      } else if (step === 2) {
        document.getElementById("step1Form").style.display = "none";
        document.getElementById("step2Form").style.display = "block";
        currentStep = 2;
      }
    }

    document.getElementById("step1Form").style.display = "block";

    document.getElementById("registrationForm").addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent the default form submission

      // Get form data
      var formData = new FormData(this);

      // Add the current step value to the form data
      formData.append("step", currentStep);

      // Send form data via AJAX
      fetch("process_registration.php", {
        method: "POST",
        body: formData
      })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          if (data.step === 2) {
            nextStep(2); // Proceed to the second step
          } else {
            // Handle successful registration
            alert(data.message);
            // Reset the form or redirect to a success page
          }
        } else {
          // Handle error
          alert(data.message);
        }
      })
      .catch(error => {
        console.error("Error:", error);
      });
    });
  </script>
</body>
</html>
