<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <title>Boostrap Login | Ludiflex</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    <!----------------------- Login Container -------------------------->

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    <!--------------------------- Left Box ----------------------------->


    <!-------------------- ------ Right Box ---------------------------->
  
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                <form action="loginFormval.php" method="POST" > 
                     <h2>Hello,Again</h2>
                     <p>We are happy to have you back.</p>
                </div>
                <?php if (isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    <?php }?> 
    <label>User Name</label>
                <div class="input-group mb-3 ">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="NIC" name="nic">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="GN Division" name="GN_Division">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Farmers Association Code" name="FA_Code">
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Farmers Association Member ID" name="FA_MemberID">
                </div>
               
                </div>
                <div class="input-group mb-3">
                    <button class="btn btn-lg btn-primary w-100 fs-6">Save and Next</button>
                </div>
                
          <form>
       </div> 

      </div>
    </div>

</body>
</html>
