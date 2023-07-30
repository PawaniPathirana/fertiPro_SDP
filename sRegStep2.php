<!DOCTYPE html>
<html>
<head>
  <title>Registration Step 2</title>
  <!-- Include Bootstrap 5.1.3 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <style>
    /* Custom CSS */
    body {
      margin-top: 50px;
    }
    .container {
      max-width: 400px;
      border: 1px solid #ccc;
      padding: 20px;
      border-radius: 5px;
    }
    h2 {
      margin-bottom: 20px;
      text-align: center;
    }
    .form-group {
      margin-bottom: 20px;
    }
    label {
      font-weight: bold;
    }
    .btn-primary {
      width: 100%;
    }
  </style>
</head>
<body>
  <div class="container">
    <h2>Registration Step 2</h2>
    <form id="step2Form" method="POST" action="process_step2.php">
      <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control form-control-lg bg-light fs-6" id="username" name="username" required>
      </div>
      <div class="form-group">
        <label for="password">Password:</label>
        <input type="password" class="form-control form-control-lg bg-light fs-6" id="password" name="password" required>
      </div>
      <div class="form-group">
        <label for="confirmPassword">Confirm Password:</label>
        <input type="password" class="form-control form-control-lg bg-light fs-6" id="confirmPassword" name="confirmPassword" required>
      </div>
      <?php
      session_start();
      $designation = $_SESSION['designation'];
      ?>
      <input type="hidden" name="designation" value="<?php echo $designation; ?>">
      <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Register</button>
    </form>
  </div>
</body>
</html>
