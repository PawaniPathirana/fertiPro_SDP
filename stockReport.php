<!DOCTYPE html>
<html>
<head>
  <title>GN Division Report</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container mt-5">
  <h2>GN Division Report</h2>
  <div class="form-group mt-3">
    <label for="gnDivision">Select GN Division:</label>
    <select class="form-control" id="gnDivision">
      <option value="Overall">Overall</option>
      <option value="xxx-1">xxx-1</option>
      <option value="yyy-2">yyy-2</option>
      <option value="zzz-3">zzz-3</option>
    </select>
  </div>
  
  <!-- Div to display the details -->
  <div id="reportDetails"></div>
</div>

<script>
$(document).ready(function(){
  $("#gnDivision").change(function(){
    var gnDivision = $(this).val();
    if (gnDivision === "Overall") {
      showOverallReport();
    } else {
      showGNDivisionDetails(gnDivision);
    }
  });
  
  function showOverallReport() {
    // Display loading indicator while fetching data
    $("#reportDetails").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');
    
    // AJAX call to fetch the overall details
    $.ajax({
      url: "fetch_overall_details.php",
      method: "POST",
      success: function(response) {
        $("#reportDetails").html(response);
      },
      error: function() {
        $("#reportDetails").html('<div class="text-danger">Error occurred while fetching data.</div>');
      }
    });
  }
  
  function showGNDivisionDetails(gnDivision) {
    // Display loading indicator while fetching data
    $("#reportDetails").html('<div class="text-center"><i class="fas fa-spinner fa-spin"></i> Loading...</div>');
    
    // AJAX call to fetch and display the GN division details
    $.ajax({
      url: "fetch_gn_division_details.php",
      method: "POST",
      data: { gnDivision: gnDivision },
      success: function(response){
        $("#reportDetails").html(response);
      },
      error: function() {
        $("#reportDetails").html('<div class="text-danger">Error occurred while fetching data.</div>');
      }
    });
  }
});
</script>

</body>
</html>
