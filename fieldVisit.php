<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Staff Registration Stage1</title>

 
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="css/register.css">

  <!-- jQuery -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- jQuery UI CSS -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <!-- jQuery UI JS -->
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

  <!-- Bootstrap Datepicker CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/css/bootstrap-datepicker.min.css">

  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Bootstrap Datepicker JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-datepicker@1.9.0/dist/js/bootstrap-datepicker.min.js"></script>

  <!-- Include Moment.js CDN -->
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>

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
        <h2>Field Visit Info</h2>
        <p>Please provide the relevant information</p>
        <div style="text-align:center;margin-top:40px;">
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
          <span class="step"></span>
        </div>
        <?php if (isset($_GET['error'])){?>
        <p class="error"><?php echo $_GET['error'];?></p>
        <?php }?>
        <form action="fieldVisitVal.php" method="POST" id="regForm">
          <div class="tab">
            <label for="staffID">Staff ID</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg bg-light fs-6" id="staffID" placeholder="Staff ID" name="staffID" required>
            </div>
            <div class="invalid-feedback">
              Staff ID is required
            </div>
            <div id="personalAddressError" class="error"></div>

            <label for="date">Date</label>
            <div class="input-group mb-3">
              <input type="text" id="datepicker" class="form-control form-control-lg bg-light fs-6" id="date" placeholder="Date" name="date" required>
            </div>
            <div class="invalid-feedback">
              Date is required
            </div>
            <div id="dateError" class="error"></div>

            <label for="time">Time</label>
            <div class="input-group mb-3">
              <input type="text" class="form-control form-control-lg bg-light fs-6" id="time" placeholder="Time" name="time" required>
            </div>
            <div class="invalid-feedback">
              Time is required
            </div>
            <div id="timeError" class="error"></div>
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
    $(document).ready(function() {
      $('#datepicker').datepicker();
    });
  </script>
  <script>
    <script>
  $(document).ready(function() {
    $('#time').datetimepicker({
      format: 'hh:mm A'
    });
  });
</script>

  </script>
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
