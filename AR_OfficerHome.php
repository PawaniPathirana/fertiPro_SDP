
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!----css3---->
    <link rel="stylesheet" href="css/sidebar/custom.css">
    <link rel="stylesheet" href="css/sidebar/style.css">
    <!-- SLIDER REVOLUTION 4.x CSS SETTINGS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <!--google material icon-->
    <link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
    <style>
         body {
            background-image: url("https://img.freepik.com/free-photo/large-green-rice-field-with-green-rice-plants-rows_181624-28862.jpg?size=626&ext=jpg");
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: cover;
        }
        </style>
</head>

<body>
<?php
                session_start();
      $gn_divisionID = $_SESSION['gn_divisionID'];
      //$_SESSION["gn_divisionID"] = $gn_divisionID;
      ?>
    <div class="wrapper">
        <div class="body-overlay"></div>
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3><img src="img/logo.png" class="img-fluid" /><span>Welcome!</span></h3>
            </div>
            <ul class="list-unstyled components">
                <li class="active">
                    <a href="#current-status-section" class="dashboard"><i class="material-icons">equalizer</i><span>Current Status</span></a>
                </li>
                <li class="dropdown">
                    <a href="#" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i><span>Field Visits</span></a>
                    <ul class="collapse list-unstyled menu" id="field-visits-section">
                        <li>
                            <a href="#">View</a>
                        </li>
                        <li>
                            <a href="#field-visits-section">Add</a>
                        </li>
                        <li>
                            <a href="#">Update</a>
                        </li>
                        <li>
                            <a href="#">Delete</a>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                <?php
               // session_start();
      //$gn_divisionID = $_SESSION['gn_divisionID'];
      //$_SESSION["gn_divisionID"] = $gn_divisionID;
      ?>
                    <a href="#farmerInfo" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">apps</i><span>View Farmer Info</span></a>
                      
      
                    <ul class="collapse list-unstyled menu" id="view-farmer-info-section">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
  </ul>
              <!--  </li>
                <li class="dropdown">
                    <a href="#current-status-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">equalizer</i><span>Current Status</span></a>
                    <ul class="collapse list-unstyled menu" id="current-status-section">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
 </ul>
                </li>
                <li class="dropdown">
                    <a href="#ui-element-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">extension</i><span>UI Element</span></a>
                    <ul class="collapse list-unstyled menu" id="ui-element-section">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>--> 
                </li>
                <li class="dropdown">
                    <a href="#orders-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i><span>Orders</span></a>
                   <!-- <ul class="collapse list-unstyled menu" id="orders-section">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
 </ul>-->
                </li>
              <!--  <li class="dropdown">
                    <a href="#tables-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">grid_on</i><span>Tables</span></a>
                    <ul class="collapse list-unstyled menu" id="tables-section">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
 </ul>
                </li>--> 
                <li class="dropdown">
                    <a href="#issue-fertilizer-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">content_copy</i><span>Issue Fertilizer</span></a>
                    <ul class="collapse list-unstyled menu" id="issue-fertilizer-section">
                      <!--  <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
  </ul>
                </li>
                <li class="">
                    <a href="#copy-section"><i class="material-icons">date_range</i><span>Copy</span></a>
                </li>
                <li class="">
                    <a href="#calender-section"><i class="material-icons">library_books</i><span>Calendar</span></a>
                </li>
            </ul>-->
        </nav>
        <!-- Page Content  -->
        <div id="content">
            <div class="top-navbar">
                <nav class="navbar navbar-expand-lg">
                    <div class="container-fluid">
                        <button type="button" id="sidebarCollapse" class="d-xl-block d-lg-block d-md-mone d-none">
                            <span class="material-icons">arrow_back_ios</span>
                        </button>
                        <a class="navbar-brand" href="#">Dashboard</a>
                        <button class="d-inline-block d-lg-none ml-auto more-button" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="material-icons">more_vert</span>
                        </button>
                        <div class="collapse navbar-collapse d-lg-block d-xl-block d-sm-none d-md-none d-none"
                            id="navbarSupportedContent">
                            <ul class="nav navbar-nav ml-auto">
                                <li class="dropdown nav-item active">
                                    <a href="#" class="nav-link" data-toggle="dropdown">
                                        <span class="material-icons">notifications</span>
                                        <span class="notification">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a href="#">You have 5 new messages</a>
                                        </li>
                                        <li>
                                            <a href="#">You're now friend with Mike</a>
                                        </li>
                                        <li>
                                            <a href="#">Wish Mary on her birthday!</a>
                                        </li>
                                        <li>
                                            <a href="#">5 warnings in Server Console</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="material-icons">apps</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="material-icons">person</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <span class="material-icons">settings</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="main-content">
                <div id="current-status-section" class="section">
                    <h2>Current Status</h2>
                    <p>This is the current status section content.</p>
                    
                </div>
                <div id="field-visits-section" class="section">
  
   
    <div class="container d-flex justify-content-center align-items-center  width: 1500px min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area"  >
            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-5">
    <form action="fieldVisitsVal.php" method="POST" class="smaller-form">
        <div class="form-group">
        <h2>Field Visits</h2>
            <label for="officer_name">Employee ID:</label>
            <input type="text" class="form-control form-control-sm" id="officer_name" name="officer_name" style="width: 500px;">
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control form-control-sm datepicker" id="date" name="date" style="width: 500px;">
        </div>

        <div class="form-group">
            <label for="time">Time:</label>
            <input type="time" class="form-control form-control-sm timepicker" id="time" name="time" style="width: 500px;">
        </div>

        <div class="form-group">
            <label for="eligibility_status">Eligibility Status:</label>
            <select class="form-control form-control-sm" id="eligibility_status" name="eligibility_status" style="width: 500px;">
                <option value="eligible">Eligible</option>
                <option value="not_eligible">Not Eligible</option>
            </select>
        </div>

        <div class="form-group">
            <label for="farmer_name">Farmer Name:</label>
            <input type="text" class="form-control form-control-sm" id="farmer_name" name="farmer_name" style="width: 500px;">
        </div>

        <div class="form-group">
            <label for="farmer_nic">Farmer NIC:</label>
            <input type="text" class="form-control form-control-sm" id="farmer_nic" name="farmer_nic" style="width: 500px;">
        </div>

        <div class="form-group">
            <label for="gn_division">GN Division:</label>
            <input type="text" class="form-control form-control-sm" id="gn_division" name="gn_division" style="width: 500px;">
        </div>

        <input type="submit" class="tn btn-lg btn-primary w-100 fs-6" value="Submit">
    </form>
</div>
</div></div></div></div></div>

<!-- Include the required libraries -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/css/bootstrap-timepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-timepicker/0.5.2/js/bootstrap-timepicker.min.js"></script>

<script>
  // Initialize datepicker
  $('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });

  // Initialize timepicker
  $('.timepicker').timepicker({
    showMeridian: false,
    defaultTime: false
  });
</script>

                </div>
                <div id="view-farmer-info-section" class="section">
                   <!-- <h2>View Farmer Info</h2>-->
                   
   
             <!--   <div id="current-status-section" class="section">
                    <h2>Current Status</h2>
                    <p>This is another current status section content.</p>
                </div>
                <div id="ui-element-section" class="section">
                    <h2>UI Element</h2>
                    <p>This is the UI element section content.</p>
                </div>-->
 <div id="orders-section" class="section">
                    <h2>Orders</h2>
                    <!DOCTYPE html>
<html>
<head>
    <title>GN Division Form</title>
    <!-- Add Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h2> </h2>
        <form method="post" action="orderInfoVal.php">
            <div class="form-group">
                <label for="gnDivision">Select GN Division:</label>
                <input class="form-control" id="gnDivision" name="gnDivision">
                    <!-- Add options dynamically using PHP -->
                    <?php
                    // Replace 'your_database_name' with your actual database name
                   /* $con=mysqli_connect("localhost","root","","fertidb",3307);
                    if ($con) {
                        $query = "SELECT gn_division_id, gnDivisionName FROM gn_division";
                        $result = mysqli_query($con, $query);
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<option value='{$row['gn_division_id']}'>{$row['gnDivisionName']}</option>";
                        }
                        mysqli_close($con);
                    }*/
                    ?>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Add Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html><br><br><br><br><br>

                </div>
              <!--  <div id="tables-section" class="section">
                    <h2>Tables</h2>
                    <p>This is the tables section content.</p>
                </div>-->
                <div id="issue-fertilizer-section" class="section">
                    <h2>Issue Fertilizer</h2>
                    <div class="container mt-4">
        <form method="post" action="farmer_orderVal.php">
            <div class="form-group">
                <label for="farmerNIC">Farmer NIC:</label>
                <input type="text" class="form-control" id="farmerNIC" name="farmerNIC" required>
            </div>
            <div class="form-group">
                <label for="gnDivision">GN Division:</label>
                <input type="text" class="form-control" id="gnDivision" name="gnDivision" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <br><br><br><br><br><br><br>

                </div>
                </div>
               <div id="farmerInfo" class="section">
             <?php
// Connect to the database
include "dbConn.php";

// Start the session (if not already started)
//session_start();
//$totalPrice=$_SESSION["totalPrice"] ;
// Check if gnDivisionID is set in the session
//$gn_divisionID = $_SESSION['gn_divisionID'];
if (!isset($_SESSION["gnDivisionID"])) {
    die("Error: GN Division ID not found in the session.");
}

// Sanitize the gnDivisionID to prevent SQL injection
$gnDivisionID = mysqli_real_escape_string($con, $_SESSION["gnDivisionID"]);

$sql = "SELECT
    farmers.farmerID,
    farmers.personalAddress,
    farmers.telephone,
    farmers.fieldAddress,
    farmers.fieldSize,
    farmers.accountNumber,
    farmers.holderName,
    farmers.branch,
    farmers.userID,
    farmers.memberID,
    farmers.NIC
FROM
    farmers
WHERE
    farmers.farmerID NOT IN (
        SELECT
            fieldvisit.farmerID
        FROM
            fieldvisit
    )
    AND farmers.gnDivisionID = '$gnDivisionID'";

$result = mysqli_query($con, $sql);

if ($result === false) {
    die("Error: " . mysqli_error($con));
}

echo "<table border='1'>";
echo "<thead>";
echo "<tr>";
echo "<th>Farmer ID</th>";
echo "<th>Personal Address</th>";
echo "<th>Telephone</th>";
echo "<th>Field Address</th>";
echo "<th>Field Size</th>";
echo "<th>Account Number</th>";
echo "<th>Holder Name</th>";
echo "<th>Branch</th>";
echo "<th>User ID</th>";
echo "<th>Member ID</th>";
echo "<th>NIC</th>";
echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["farmerID"] . "</td>";
    echo "<td>" . $row["personalAddress"] . "</td>";
    echo "<td>" . $row["telephone"] . "</td>";
    echo "<td>" . $row["fieldAddress"] . "</td>";
    echo "<td>" . $row["fieldSize"] . "</td>";
    echo "<td>" . $row["accountNumber"] . "</td>";
    echo "<td>" . $row["holderName"] . "</td>";
    echo "<td>" . $row["branch"] . "</td>";
    echo "<td>" . $row["userID"] . "</td>";
    echo "<td>" . $row["memberID"] . "</td>";
    echo "<td>" . $row["NIC"] . "</td>";
    echo "</tr>";
}
echo "</tbody>";
echo "</table>";

echo "<p>GN Division: " . $_SESSION["gnDivisionName"] . "</p>";
?>

                    <p>This is the copy section content.</p>
                </div>
               <div id="calender-section" class="section">
                    <h2>Calendar</h2>
                    <p>This is the calendar section content.</p>
               </div> -->
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-6">
                            <nav class="d-flex">
                                <ul class="m-0 p-0">
                                    <li>
                                        <a href="#">
                                            Home
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Company
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Portfolio
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            Blog
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-md-6">
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/sidebar.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $('#content').toggleClass('active');
            });

            $('#sidebar ul li a').on('click', function (e) {
                e.preventDefault();
                var target = $(this).attr('href');
                $('html, body').animate({
                    scrollTop: $(target).offset().top
                }, 800);
                $('#sidebar').removeClass('active');
                $('#content').removeClass('active');
            });
        });
    </script>
</body>

</html>
?>
