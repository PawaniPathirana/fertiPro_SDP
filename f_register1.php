<!DOCTYPE html>
<html>
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
	<link rel="stylesheet" type="text/css" href="css/reg.css">
	<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary bg-dark navbar-dark py-3 fixed-top">
  <div class="container">
    <a href="#" class="navbar-brand">Agrarian Service Center Srawasthipura</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navmenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item">
          <a href="home.php" class="nav-link">Home</a>
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
            <li><a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#s_reg">Staff Member</a></li>
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

<script type="text/javascript" src="js/reg.js"></script>

</body>
</html>
