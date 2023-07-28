<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multistep Registration Form</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">

  <h1>Multistep Registration Form</h1>

  <form action="f2.php" method="post">

    <!-- Step 1 -->
    <div class="step">
      <h2>Personal Details</h2>
      <input type="text" name="personalAddress" placeholder="Personal Address">
      <input type="text" name="telephone" placeholder="Telephone">
    </div>

    <!-- Step 2 -->
    <div class="step">
      <h2>Field Details</h2>
      <input type="text" name="fieldAddress" placeholder="Field Address">
      <input type="number" name="fieldSize" placeholder="Field Size">
    </div>

    <!-- Step 3 -->
    <div class="step">
      <h2>Account Details</h2>
      <input type="text" name="accountNumber" placeholder="Account Number">
      <input type="text" name="holderName" placeholder="Holder Name">
      <input type="text" name="branch" placeholder="Branch">
    </div>

    <!-- Step 4 -->
    <div class="step">
      <h2>Login Details</h2>
      <input type="text" name="userName" placeholder="Username">
      <input type="password" name="password" placeholder="Password">
      <input type="password" name="repeatPassword" placeholder="Repeat Password">
      
      <?php
      session_start();
      $NIC = $_SESSION['NIC'];
     // $_SESSION['NIC'] = $nic;
      ?>
    </div>

    <!-- Navigation buttons -->
    <div class="text-center mt-3">
      <button type="button" class="btn btn-primary prev-btn">Previous</button>
      <button type="button" class="btn btn-primary next-btn">Next</button>
      <button type="submit" class="btn btn-primary submit-btn" style="display: none;">Submit</button>
    </div>

  </form>

</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<script>
  // This code will show the next/previous steps when the user clicks on the "Next" and "Previous" buttons.
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

</body>
</html>
