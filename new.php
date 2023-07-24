<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Farmer Registration Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<div class="container">

    <h1>Farmer Registration Form</h1>

    <form action="index.php" method="post">

        <div class="step">
            <h2>Step 1</h2>

            <div class="mb-3">
                <label for="nic" class="form-label">NIC</label>
                <input type="text" class="form-control" id="nic" name="nic" required>
            </div>

            <div class="mb-3">
                <label for="gn_division" class="form-label">GN Division</label>
                <input type="text" class="form-control" id="gn_division" name="gn_division" required>
            </div>

            <div class="mb-3">
                <label for="fa_registration_number" class="form-label">Farmers' Association Registration Number</label>
                <input type="text" class="form-control" id="fa_registration_number" name="fa_registration_number" required>
            </div>

            <div class="mb-3">
                <label for="fa_member_id" class="form-label">Farmers' Association Member ID</label>
                <input type="text" class="form-control" id="fa_member_id" name="fa_member_id" required>
            </div>

            <button type="button" class="btn btn-primary" id="next-btn">Next</button>
        </div>

        <div class="step" style="display: none;">
            <h2>Step 2</h2>

            <div class="mb-3">
                <label for="personal_address" class="form-label">Personal Address</label>
                <input type="text" class="form-control" id="personal_address" name="personal_address" required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label">Telephone</label>
                <input type="text" class="form-control" id="telephone" name="telephone" required>
            </div>

            <button type="button" class="btn btn-primary" id="previous-btn">Previous</button>
            <button type="button" class="btn btn-primary" id="next-btn">Next</button>
        </div>

        <div class="step" style="display: none;">
            <h2>Step 3</h2>

            <div class="mb-3">
                <label for="field_address" class="form-label">Field Address</label>
                <input type="text" class="form-control" id="field_address" name="field_address" required>
            </div>

            <div class="mb-3">
                <label for="field_size" class="form-label">Field Size</label>
                <input type="text" class="form-control" id="field_size" name="field_size" required>
            </div>

            <button type="button" class="btn btn-primary" id="previous-btn">Previous</button>
            <button type="button" class="btn btn-primary" id="next-btn">Next</button>
        </div>

        <div class="step" style="display: none;">
            <h2>Step 4</h2>

            <div class="mb-3">
<label for="username" class="form-label">Username</label>
<input type="text" class="form-control" id="username" name="username" required>
</div>

<div class="mb-3">
<label for="password" class="form-label">Password</label>
<input type="password" class="form-control" id="password" name="password" required>
</div>

<button type="button" class="btn btn-primary" id="previous-btn">Previous</button>
<button type="submit" class="btn btn-primary">Submit</button>
</div>

<script>

// Initialize the steps
const steps = document.querySelectorAll(".step");

// Hide all steps except the first one
for (let i = 1; i < steps.length; i++) {
  steps[i].style.display = "none";
}

// Click handler for the "Next" button
const nextBtn = document.querySelector("#next-btn");
nextBtn.addEventListener("click", function() {
  // Get the current step
  const currentStep = document.querySelector(".step.active");

  // If the current step is the last one, submit the form
  if (currentStep.id === "step4") {
    document.querySelector("form").submit();
  } else {
    // Otherwise, go to the next step
    const nextStep = currentStep.nextElementSibling;
    nextStep.style.display = "block";
    currentStep.style.display = "none";
  }
});

// Click handler for the "Previous" button
const previousBtn = document.querySelector("#previous-btn");
previousBtn.addEventListener("click", function() {
  // Get the current step
  const currentStep = document.querySelector(".step.active");

  /*If the current step is the first one, do nothing
  if (currentStep.id === "step1") {
    return;
  }*/

  // Otherwise, go to the previous step
  const previousStep = currentStep.previousElementSibling;
  previousStep.style.display = "block";
  currentStep.style.display = "none";
});

</script>

