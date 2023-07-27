<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
/* .invalid class prevents CSS from automatically applying */
.invalid input:required:invalid {
  background: #BE4C54;
}

/* Mark valid inputs during .invalid state */
.invalid input:required:valid {
  background: #17D654;
}
* {
  box-sizing: border-box;
}

body {
  background-color: #f1f1f1;
}

#regForm {
  background-color: #ffffff;
  margin: 100px auto;
  font-family: Raleway;
  padding: 40px;
  width: 70%;
  min-width: 300px;
}

h1 {
  text-align: center;  
}

input {
  padding: 10px;
  width: 100%;
  font-size: 17px;
  font-family: Raleway;
  border: 1px solid #aaaaaa;
}

/* Mark input boxes that gets an error on validation: */
input.invalid {
  background-color: #ffdddd;
}

/* Hide all steps by default: */
.tab {
  display: none;
}

button {
  background-color: #04AA6D;
  color: #ffffff;
  border: none;
  padding: 10px 20px;
  font-size: 17px;
  font-family: Raleway;
  cursor: pointer;
}

button:hover {
  opacity: 0.8;
}

#prevBtn {
  background-color: #bbbbbb;
}

/* Make circles that indicate the steps of the form: */
.step {
  height: 15px;
  width: 15px;
  margin: 0 2px;
  background-color: #bbbbbb;
  border: none;  
  border-radius: 50%;
  display: inline-block;
  opacity: 0.5;
}

.step.active {
  opacity: 1;
}

/* Mark the steps that are finished and valid: */
.step.finish {
  background-color: #04AA6D;
}
</style>
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
            <li><a class="dropdown-item"  href="sRegStep1.php">Staff Member</a></li>
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#f2_reg">Staff2 Member</a></li> 
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
   
    <div class="modal fade" id="f_reg" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true" role="dialog" aria-labelledby="modal1-label">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enrollLabel">Registration</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <p class="lead">Fill out this form</p>
        <form class="needs-validation" novalidate  action="f_registerVal.php" method="POST">
          <div class="mb-3">
            
            <label for="nic" class="col-form-label">NIC:</label>
            <input type="text" class="form-control" id="nic" name="nic"  required />
            <div class="invalid-feedback">
              Please enter a valid NIC
            </div>
          </div>
           

          <div class="mb-3">
            <label for="GN_Division" class="col-form-label">GN Division:</label>
            <input type="text" class="form-control" id="GN_Division" name="GN_Division" required />
            <div class="invalid-feedback">
            GN Division is Required
            </div>
          </div>
          
          <div class="mb-3">
            <label for="fa_RegNumber" class="col-form-label">Farmers' Association Registration Number:</label>
            <input type="text" class="form-control" id="fa_RegNumber" name="fa_RegNumber"  required />
                      <div class="invalid-feedback">
                      Farmers' Association Registration Number is Required
            </div>

</div>
          <div class="mb-3">
            <label for="fa_memberID" class="col-form-label">Farmers Association Member ID:</label>
            <input type="text" class="form-control" id="fa_memberID" name="fa_memberID" required/>
            <div class="invalid-feedback">
            Farmers Association Member ID is Required
            </div>
          </div>
          
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="s_reg" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true" role="dialog" aria-labelledby="modal1-label">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enrollLabel">Registration</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <p class="lead">Fill out this form</p>
        <form class="needs-validation" novalidate  action="s_registerVal.php" method="POST">
          <div class="mb-3">
            
            <label for="firstName" class="col-form-label">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName"  required />
            <div class="invalid-feedback">
            First Name is Required
            </div>
          </div>
           

          <div class="mb-3">
            <label for="lastName" class="col-form-label">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required />
            <div class="invalid-feedback">
            Last Name is Required
            </div>
          </div>
          
          <div class="mb-3">
            <label for="employeeID" class="col-form-label">Employee ID:</label>
            <input type="text" class="form-control" id="employeeID" name="employeeID"  required />
                      <div class="invalid-feedback">
                      Employee ID is Required
            </div>

</div>
                  
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<!--RegistraionM-->

<div class="modal fade" id="f2_reg" tabindex="-1" aria-labelledby="enrollLabel" aria-hidden="true" role="dialog" aria-labelledby="modal1-label">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="enrollLabel">Registration</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
        <p class="lead">Fill out this form</p>
        <form action="f_registerVal.php" method="POST">
                    <label for="nic">National Identity Card Number</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="nic" placeholder="NIC" name="nic">
                    </div>
                    <label for="staff-id">Staff ID</label>
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" id="staff-id" placeholder="Staff ID" name="GN_Division">
                    </div>
                    <label for="designation">Designation</label>
                    <div class="input-group mb-3">
                        <select class="form-select form-select-lg bg-light fs-6" id="designation" name="designation">
                            <option selected disabled>Select Designation</option>
                            <option value="Development Officer">Divisional Officer</option>
                            <option value="Agriculture Service Officer">Development Officer</option>
                            <option value="Management Assistent">Agriculture Research Officer</option>
                            <option value="Manager">Management Assistant</option>
                        </select>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col">
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-primary w-100 fs-6">Save and Next</button>
                            </div>
                        </div>
                        <div class="col">
                            <div class="input-group mb-3">
                                <button class="btn btn-lg btn-danger w-100 fs-6">Cancel</button>
                            </div>
                        </div>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>

>


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
  <script> 
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
    'use strict';
    window.addEventListener('load', function() {
      // Fetch all the forms we want to apply custom Bootstrap validation styles to
      var forms = document.getElementsByClassName('needs-validation');
      // Loop over them and prevent submission
      var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
          if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
          }
          form.classList.add('was-validated');
        }, false);
      });
    }, false);
  })();

  </script>
//Registraion

<script>
  document.addEventListener("DOMContentLoaded", function() {
    // Step 1: Next button
    var nextStep1Btn = document.getElementById("nextStep1");
    nextStep1Btn.addEventListener("click", function() {
      document.getElementById("step1").style.display = "none";
      document.getElementById("step2").style.display = "block";
    });

    // Step 2: Previous and Next buttons
    var prevStep2Btn = document.getElementById("prevStep2");
    var nextStep2Btn = document.getElementById("nextStep2");
    prevStep2Btn.addEventListener("click", function() {
      document.getElementById("step2").style.display = "none";
      document.getElementById("step1").style.display = "block";
    });
    nextStep2Btn.addEventListener("click", function() {
      document.getElementById("step2").style.display = "none";
      document.getElementById("step3").style.display = "block";
    });

    // Step 3: Previous button
    var prevStep3Btn = document.getElementById("prevStep3");
    prevStep3Btn.addEventListener("click", function() {
      document.getElementById("step3").style.display = "none";
      document.getElementById("step2").style.display = "block";
    });
  });
</script>

  </body>
</html>
