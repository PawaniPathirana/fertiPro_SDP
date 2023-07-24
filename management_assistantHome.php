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
</head>

<body>
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
                    <a href="#field-visits-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">aspect_ratio</i><span>Field Visits</span></a>
                    <ul class="collapse list-unstyled menu" id="field-visits-section">
                        <li>
                            <a href="#">View</a>
                        </li>
                        <li>
                            <a href="#">Add</a>
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
                    <a href="#view-farmer-info-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
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
                </li>
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
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="#orders-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">border_color</i><span>Orders</span></a>
                    <ul class="collapse list-unstyled menu" id="orders-section">
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
                </li>
                <li class="dropdown">
                    <a href="#issue-fertilizer-section" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                        <i class="material-icons">content_copy</i><span>Issue Fertilizer</span></a>
                    <ul class="collapse list-unstyled menu" id="issue-fertilizer-section">
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
                <li class="">
                    <a href="#copy-section"><i class="material-icons">date_range</i><span>Copy</span></a>
                </li>
                <li class="">
                    <a href="#calender-section"><i class="material-icons">library_books</i><span>Calendar</span></a>
                </li>
            </ul>
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
                    <h2>Field Visits</h2>
                    <!DOCTYPE html>
<html>
<head>
    <title>Fertilizer Quantity Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Fertilizer Quantity Form</h2>
        <?php
        if (isset($_GET['success']) && $_GET['success'] === 'true') {
            echo '<div class="alert alert-success">Data saved successfully!</div>';
        }
        ?>
       <!-- ... (existing code) ... -->
<form method="POST" action="fertiTypeVal.php">
    <div class="form-group">
        <label for="urea_quantity">Quantity per unit - Urea:</label>
        <input type="text" class="form-control" id="urea_quantity" name="urea_quantity" required>
        <label for="urea_unit_price">Unit Price - Urea:</label>
        <input type="text" class="form-control" id="urea_unit_price" name="urea_unit_price" required>
    </div>

    <div class="form-group">
        <label for="tsp_quantity">Quantity per unit - T.S.P.:</label>
        <input type="text" class="form-control" id="tsp_quantity" name="tsp_quantity" required>
        <label for="tsp_unit_price">Unit Price - T.S.P.:</label>
        <input type="text" class="form-control" id="tsp_unit_price" name="tsp_unit_price" required>
    </div>

    <div class="form-group">
        <label for="mop_quantity">Quantity per unit - M.O.P.:</label>
        <input type="text" class="form-control" id="mop_quantity" name="mop_quantity" required>
        <label for="mop_unit_price">Unit Price - M.O.P.:</label>
        <input type="text" class="form-control" id="mop_unit_price" name="mop_unit_price" required>
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<!-- ... (existing code) ... -->

    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>


                </div>
                <div id="view-farmer-info-section" class="section">
                    <h2>View Farmer Info</h2>
                    <!DOCTYPE html>
<html>
<head>
    <title>View Fertilizer Data</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>

    <div class="container mt-4">
        <h2>Fertilizer Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    
                    <th>Fertilizer Type</th>
                    <th>Quantity per Unit</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "dbConn.php";

                // Retrieve data from the database
                $query = "SELECT * FROM fertilizer_data";
                $result = $con->query($query);

                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                       
                        echo '<td>' . $row['fertilizerType'] . '</td>';
                        echo '<td>' . $row['quantityPerUnit'] . '</td>';
                        echo '<td><a href="fertiTypeDelVal.php?action=delete&id=' . $row['ID'] . '">Delete</a> | ';
                        echo '<a href="edit_data.php?id=' . $row['ID'] . '">Edit</a></td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<tr><td colspan="4">No data found.</td></tr>';
                }

                $con->close();
                ?>
            </tbody>
        </table>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

                </div>
                <div id="current-status-section" class="section">
                    <h2>Current Status</h2>
                    <p>This is another current status section content.</p>
                </div>
                <div id="ui-element-section" class="section">
                    <h2>UI Element</h2>
                    <p>This is the UI element section content.</p>
                </div>
                <div id="orders-section" class="section">
                    <h2>Orders</h2>
                    <p>This is the orders section content.hhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhfdihfnughhhhhhhhhhhhhhhhhhhhhhvvvvvvvvvvvchgytrwdsuijknhbgtrfecvcbgdarwfyhuijndgatrf</p>
                </div>
                <div id="tables-section" class="section">
                    <h2>Tables</h2>
                    <p>This is the tables section content.</p>
                </div>
                <div id="issue-fertilizer-section" class="section">
                    <h2>Issue Fertilizer</h2>
                    <p>This is the issue fertilizer section content.</p>
                </div>
                <div id="copy-section" class="section">
                    <h2>Copy</h2>
                    <p>This is the copy section content.</p>
                </div>
                <div id="calender-section" class="section">
                    <h2>Calendar</h2>
                    <p>This is the calendar section content.</p>
                </div>
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
