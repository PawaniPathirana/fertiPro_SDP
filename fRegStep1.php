<!-- registration_step1.html -->
<!DOCTYPE html>
<html>
<head>
  <title>Registration - Step 1</title>
  <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
  <div class="container">
    <h2>Registration - Step 1</h2>
    <?php
      // Display error message if it exists in the URL parameters
      if (isset($_GET['error'])) {
        echo '<p class="error">' . $_GET['error'] . '</p>';
      }
    ?>
    <form action="f1.php" method="POST" >
      <input type="text" name="nic" placeholder="NIC" id =nic required>
      <input type="text" name="gn_division" placeholder="GN Division" required>
      <input type="text" name="reg_number" placeholder="Farmers' Association Registration Number" required>
      <input type="text" name="member_id" placeholder="Farmers Association Member ID" required>
      <button type="submit">Next</button>
    </form>
  </div>
</body>
</html>
