<!DOCTYPE html>
<html>
 <head>
<title>LOGIN</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
 
 </head>
 <body>
   
 <form action="signupVal.php" style="border:1px solid #ccc" name="signup" method="POST" class="mb-3 mt-3">
 <?php if (isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    <?php }?> 
<div class="container">
    <h1 align="center">Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>


    <label for="name"><b>Name</b></label>
    <input type="text" placeholder="Enter your name" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>    

    <label for="designation"><b>Designation</b></label>
    <input type="text" placeholder="Enter your age" name="age" required>

        <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="psw-repeat" required>
    
    
    <div class="clearfix">
      <a href="login.php"> <button align="center" type="button" class="cancelbtn" onclick="" >Log in</button> </a>
      <button align="center" type="submit" class="signupbtn" onclick="ValidateEmail(document.signup.email)">Sign Up</button>



    </div>
  </div>
</form>

 </body>
