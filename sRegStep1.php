<!DOCTYPE html>
<html>
<head>
  <title>Registration Step 1</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
  <div class="container">
    <h2>Registration Step 1</h2>
    <form id="step1Form" method="POST" action="process_step1.php">
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
      <button type="submit" class="btn btn-primary">Next</button>
    </form>
  </div>
</body>
</html>
