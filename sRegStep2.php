<!DOCTYPE html>
<html>
<head>
  <title>Registration Step 2</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Registration Step 2</h2>
    <form id="step2Form" method="POST" action="process_step2.php">
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
      <?php
      session_start();
      $designation = $_SESSION['designation'];
      ?>
      <input type="hidden" name="designation" value="<?php echo $designation; ?>">
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
  </div>
</body>
</html>
