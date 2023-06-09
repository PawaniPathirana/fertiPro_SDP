<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" type="text/css" href="css/reg.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="css/home.css" />
    <title>Agrarian Service Center Srawasthipura</title>
    <style>
    .error{
		background: #F2DEDE;
		color: #A94442;
		padding: 10px;
		width: 95%;
		border-radius: 5px;
    }
    .error_wrap {
  background-color: #ffcccc;
  padding: 10px;
  border: 1px solid #ff0000;
  border-radius: 5px;
  margin: 20px auto;
  width: 300px;
  text-align: center;
  font-weight: bold;
}


        </style>
  </head>
  <body>
    <!-- Navbar -->
    
<nav class="navbar navbar-expand-lg bg-primary bg-dark navbar-dark py-3 fixed-top">
  <div class="container">
    <a href="#" class="navbar-brand">Agrarian Service Center Srawasthipura</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="#" class="nav-link">Home</a>
        </li>
        <li class="nav-item">
          <a href="#aboutUs" class="nav-link">About Us</a>
        </li>
        <li class="nav-item">
          <a href="#news" class="nav-link">News</a>
        </li>
        <li class="nav-item">
          <a href="#contact" class="nav-link">Contact Us</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownRegister" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Register
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownRegister">
          <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#f_reg">Farmer</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#enroll">Staff Member</a></li>
          </ul>
          
        </li>
        <li class="nav-item">
          <a href="login.php" class="btn btn-primary">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>


    <br><br><br>
    <!-- Showcase -->
    
  <img class="img-fluid w-100" src="https://e0.pxfuel.com/wallpapers/379/496/desktop-wallpaper-rice-field-paddy.jpg" alt="Web Developer" style="max-height: 400px;">
  <div class="container position-absolute top-50 start-50 translate-middle">
    <h1 class="text-black fw-bold">Introducing a Revolutionary Approach</h1>
    <p class="lead my-4 text-white fw-bold">
    "Empowering Paddy Farmers with Precision Fertilizer Distribution for Bountiful Harvests"
    </p>
    <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#">
     Learn More
    </button>
  </div>




<br><br>


    <!-- Newsletter -->
    <section id="aboutUs" class="p-5 ">
      <div>
    <h2 class='text-center'>Overview</h2>
    <p class="lead">
              fjjjjjjjjasxjhgfforkmefjmwfhujvndvvdm vmn ndlkfewbfdk v , mn xchagvrbgf mn basvfvvd s hsdv ,cx z sdfmd mnc ncsd m n  hcs
              gugwudg dkjxbb  jhwgfwfqvefvmn nb sdvnhqb   bddbygdqdl csncbgfcsdcm vc wdncs nbeve vnmb ekjsdv  vncvgcvcbcvc fjwsdjurfur nffhfyegr fur   
            </p>
            <div class="col-md-12 text-center">
            <a href="#enroll" class="btn btn-light mt-3">
          <i class="bi bi-chevron-right"></i> Read More
        </a>
        <div>
            <div>
</section>

    <!-- Boxes -->
    <section id ="news" class="p-5">
      <div class="container">
        <div class="row text-center g-4">
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class=""></i>
                </div>
                <h3 class="card-title mb-3">About Crops</h3>
                <p class="card-text">
                  hhhhhhb bbbb hh jjjjj kkkkkkkkkkll mnh.
                  bb nhjm j bghuy mnbvvrr vgttrde njhyuim bbbbbbbbbb
                  hhhhhhh.
                </p>
                <a href="#" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card bg-secondary text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class=""></i>
                </div>
                <h3 class="card-title mb-3">About Fertilizer</h3>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Iure, quas quidem possimus dolorum esse eligendi?
                </p>
                <a href="#" class="btn btn-dark">Read More</a>
              </div>
            </div>
          </div>
          <div class="col-md">
            <div class="card bg-dark text-light">
              <div class="card-body text-center">
                <div class="h1 mb-3">
                  <i class=""></i>
                </div>
                <h3 class="card-title mb-3">Government Annoucements</h3>
                <p class="card-text">
                  Lorem, ipsum dolor sit amet consectetur adipisicing elit.
                  Iure, quas quidem possimus dolorum esse eligendi?
                </p>
                <a href="#" class="btn btn-primary">Read More</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Learn Sections -->
    <section id="learn" class="p-5 ">
      <div class="container">
        <div class="row align-items-center justify-content-between">
          <div class="col-md">
            <img src="https://lectura.press/media-storage/press_releases/rice_farmer_in_his_paddy_field_in_monaragala_sri_lanka(6ae).jpg" class="img-fluid" alt="" />
          </div>
          <div class="col-md p-5">
            <h2>Learn The Fundamentals of Farming</h2>
            <p class="lead">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit.
              Similique deleniti possimus magnam corporis ratione facere!
            </p>
            <p>
              Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
              reiciendis eius autem eveniet mollitia, at asperiores suscipit
              quae similique laboriosam iste minus placeat odit velit quos,
              nulla architecto amet voluptates?
            </p>
            <a href="#" class="btn btn-light mt-3">
              <i class="bi bi-chevron-right"></i> Read More
            </a>
          </div>
        </div>
      </div>
    </section>

    

    <section id="contact" class="p-5 bg-dark">
      <div class="container">
        <h2 class="text-center text-white">Our Staff</h2>
        <p class="lead text-center text-white mb-5">
          ggg hhjkk nnnnn bhgtshhgc bv gc bhhgtrfde
        </p>
        <div class="row g-4">
          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://static.vecteezy.com/system/resources/thumbnails/001/505/042/small/employee-icon-free-vector.jpg"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <h3 class="card-title mb-3">er vbgty</h3>
                <p class="card-text">
                Divisional Officer
                </p>
                <a href="#"><i class="bi bi-phone text-dark mx-1"></i></a>
                <a href="#"><i class="bi bi-telephone text-dark mx-1"></i></a>
               
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://static.vecteezy.com/system/resources/thumbnails/001/505/042/small/employee-icon-free-vector.jpg"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <h3 class="card-title mb-3">hj nhgty</h3>
                <p class="card-text">
                  Development Officer
                </p>
                <a href="#"><i class="bi bi-phone text-dark mx-1"></i></a>
                <a href="#"><i class="bi bi-telephone text-dark mx-1"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://static.vecteezy.com/system/resources/thumbnails/001/505/042/small/employee-icon-free-vector.jpg"
                  class="rounded-circle mb-3"
                  alt=""
                />
                <h3 class="card-title mb-3">Shj jjj</h3>
                <p class="card-text">
                 Agriculture Reaserch Officer
                </p>
                <a href="#"><i class="bi bi-phone text-dark mx-1"></i></a>
                <a href="#"><i class="bi bi-telephone text-dark mx-1"></i></a>
              </div>
            </div>
          </div>

          <div class="col-md-6 col-lg-3">
            <div class="card bg-light">
              <div class="card-body text-center">
                <img
                  src="https://static.vecteezy.com/system/resources/thumbnails/001/505/042/small/employee-icon-free-vector.jpg"
                  class="rounded-circle mb-3"
                  alt="staff member"
                />
                <h3 class="card-title mb-3">g hytuj</h3>
                <p class="card-text">
                Management Assistent
                </p>
                <a href="#"><i class="bi bi-phone text-dark mx-1"></i></a>
                <a href="#"><i class="bi bi-telephone text-dark mx-1"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact & Map -->
    <section class="p-5">
      <div class="container">
        <div class="row g-4">
          <div class="col-md">
            <h2 class="text-center mb-4">Contact Info</h2>
            <ul class="list-group list-group-flush lead">
              <li class="list-group-item">
                <span class="fw-bold">Location:</span> 79JQ+VV4, Rathmale - Nachchaduwa Rd, Anuradhapura
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Telephone:</span> 0252234876
              </li>
              <li class="list-group-item">
                <span class="fw-bold">Email:</span> kjkj@jj.com
              </li>
              
            </ul>
          </div>
          <div class="col-md">
            <div id="map"></div>
          </div>
        </div>
      </div>
    </section>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Open Modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <img src="https://www.agrifarming.in/wp-content/uploads/2022/02/Fertilizer-for-Rice-Crop1-1024x768.jpg" class="img-fluid" alt="Modal Image">
          </div>
          <div class="col-md-6">
            <form class="needs-validation" novalidate>
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" required>
                <div class="invalid-feedback">
                  Please enter a valid email address.
                </div>
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
                <div class="invalid-feedback">
                  Please enter a password.
                </div>
              </div>
              <div class="form-check mb-1">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

    <!-- Footer -->
    <footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">hhhhkppffd  mvrtyujokmn</p>

        <a href="#" class="position-absolute bottom-0 end-0 p-5">
          <i class="bi bi-arrow-up-circle h1"></i>
        </a>
      </div>
    </footer>
    <div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="errorModalLabel">Error</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Incorrect information provided.</p>
        </div>
      </div>
    </div>
  </div>
    <!-- Modal -->
   
   <!-- Enrollment Form -->
<div class="modal fade" id="enroll" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enrollLabel">Enrollment Form</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="wrapper">
	<div class="header">
		<ul>
			<li class="active form_1_progessbar">
				<div>
					<p>1</p>
				</div>
			</li>
			<li class="form_2_progessbar">
				<div>
					<p>2</p>
				</div>
			</li>
			<li class="form_3_progessbar">
				<div>
					<p>3</p>
				</div>
			</li>
		</ul>
	</div>
	<div class="form_wrap">
		<div class="form_1 data_info">
			<h2>Signup Info</h2>
			<form action="f_registerVal.php" method="POST">
				<div class="form_container">
					<div class="input_wrap">
						<label for="nic">NIC</label>
						<input type="text" name="nic" class="input" id="nic">
					</div>
					<div class="input_wrap">
						<label for="password">GN Division</label>
						<input type="text" name="Gn_division" class="input" id="Gn_division">
					</div>
					<div class="input_wrap">
						<label for="confirm_password">Farmers Association Registration Number</label>
						<input type="password" name="asoociationID" class="input" id="asoociationID">
					</div>
					<div class="input_wrap">
						<label for="confirm_password">Farmers Association Member ID</label>
						<input type="password" name="fa_memberID" class="input" id="fa_memberID">
					</div>
				</div>
			</form>
		</div>
		<div class="form_2 data_info" style="display: none;">
			<h2>Personal Info</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="user_name">User Name</label>
						<input type="text" name="User Name" class="input" id="user_name">
					</div>
					<div class="input_wrap">
						<label for="first_name">First Name</label>
						<input type="text" name="First Name" class="input" id="first_name">
					</div>
					<div class="input_wrap">
						<label for="last_name">Last Name</label>
						<input type="text" name="Last Name" class="input" id="last_name">
					</div>
				</div>
			</form>
		</div>
		<div class="form_3 data_info" style="display: none;">
			<h2>Professional Info</h2>
			<form>
				<div class="form_container">
					<div class="input_wrap">
						<label for="company">Current Company</label>
						<input type="text" name="Current Company" class="input" id="company">
					</div>
					<div class="input_wrap">
						<label for="experience">Total Experience</label>
						<input type="text" name="Total Experience" class="input" id="experience">
					</div>
					<div class="input_wrap">
						<label for="designation">Designation</label>
						<input type="text" name="Designation" class="input" id="designation">
					</div>
				</div>
			</form>
		</div>
	</div>
	<div class="btns_wrap">
		<div class="common_btns form_1_btns">
			<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_2_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn_next">Next <span class="icon"><ion-icon name="arrow-forward-sharp"></ion-icon></span></button>
		</div>
		<div class="common_btns form_3_btns" style="display: none;">
			<button type="button" class="btn_back"><span class="icon"><ion-icon name="arrow-back-sharp"></ion-icon></span>Back</button>
			<button type="button" class="btn_done">Done</button>
		</div>
	</div>
</div>

<div class="modal_wrapper">
	<div class="shadow"></div>
	<div class="success_wrap">
		<span class="modal_icon"><ion-icon name="checkmark-sharp"></ion-icon></span>
		<p>You have successfully completed the process.</p>
	</div>
</div>
    </div>
  </div>
</div>


    <div
      class="modal fade"
      id="s_reg"
      tabindex="-1"
      aria-labelledby="enrollLabel"
      aria-hidden="true" 
      role="dialog"
      aria-labelledby="modal1-label">
            <div class="modal-dialog" >
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="enrollLabel">Enrollment</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            <p class="lead">Fill out this form</p>
            <form>
              <div class="mb-3">
              <?php if (isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    <?php }?> 
                <label for="nic" class="col-form-label">
                  NIC:
                </label>
                <input type="text" class="form-control" id="nic" />
              </div>
              <div class="mb-3">
                <label for="s_ID" class="col-form-label">Staff ID:</label>
                <input type="text" class="form-control" id="s_ID" />
              </div>
              <div class="mb-3">
                <label for="designation" class="col-form-label">Designation:</label>
                <input type="text" class="form-control" id="Designation" />
              </div>
              
            </form>
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button type="button" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </div>
    </div>

<div class="modal fade" id="modal1" tabindex="-1" role="dialog" aria-labelledby="modal1-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title">Modal 1</h2>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="modal1-label">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h2 class="modal-title">Modal 2</h2>
      </div>
    </div>
  </div>
</div>
</div>
-->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
    <script src="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.js"></script>

    <script>
  mapboxgl.accessToken = 'pk.eyJ1IjoiYnRyYXZlcnN5IiwiYSI6ImNrbmh0dXF1NzBtbnMyb3MzcTBpaG10eXcifQ.h5ZyYCglnMdOLAGGiL1Auw';
  var map = new mapboxgl.Map({
    container: 'map',
    style: 'mapbox://styles/mapbox/streets-v11',
    center: [80.5487, 7.6419], // Coordinates for Agrarian Service Center
    zoom: 18,
  });

  var marker = new mapboxgl.Marker()
    .setLngLat([80.5487, 7.6419]) // Set the marker coordinates
    .addTo(map);
</script>
<script>
    // Check if error message is present in the URL parameters
    const urlParams = new URLSearchParams(window.location.search);
    const errorMessage = urlParams.get('error');
    if (errorMessage === '1') {
      // Display error message in the modal
      const errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
      errorModal.show();
    }
  </script>




  </body>
</html>
