<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/register.css">
    <title>Farmer registration Stage1</title>
</head>
<body>

    <!----------------------- Main Container -------------------------->

     <div class="container d-flex justify-content-center align-items-center min-vh-100">

    

       <div class="row border rounded-5 p-3 bg-white shadow box-area">

    


    <!-------------------- ------ Right Box ---------------------------->
  
       <div class="col-md-6 right-box">
          <div class="row align-items-center">
                <div class="header-text mb-4">
                <form action="f_registerVal.php" method="POST" > 
                     <h2>Registration</h2>
                     <p>Please provide your details to complete the registration process</p>
                                     </div>
                <?php if (isset($_GET['error'])){?>
    <p class="error"><?php echo $_GET['error'];?></p>
    <?php }?> 
    <label>National Identity Card Number</label><br><br>
                <div class="input-group mb-3 ">
                    <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="NIC" name="nic">
                </div>
                <label>GN Division</label><br><br>
                <div class="input-group mb-3">
      <select class="form-select form-select-lg bg-light fs-6" name="designation">
        <option selected disabled>Select GN Division</option>
        <option value="xxx-1r">xxx-1</option>
        <option value="yyy-2">yyy-2</option>
        <option value="zzz-3">zzz-3</option>
        <option value="mmm-4">mmm-4</option>
        <option value="nnn-5">nnn-5</option>
        <option value="ttt-6">ttt-6</option>
        <option value="uuu-7">uuu-7</option>

      </select>
    </div>
                <label>Farmers Association Registration Number</label><br><br>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Farmers Association Registration Number" name="FA_Code">
                </div>
                <label>Farmers Association Member ID</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control form-control-lg bg-light fs-6" placeholder="Farmers Association Member ID" name="FA_MemberID">
                </div>
                <br><br><br><br>
                </div>
                <div class="row">
  <div class="col">
    <div class="input-group mb-3">
      <button class="btn btn-lg btn-primary w-100 fs-6">Save and Next</button>
    </div>
  </div>
  <div class="col">
    <div class="input-group mb-3">
      <button class="btn btn-lg btn-danger w-100 fs-6">Cancel</button>
      <br><br>
    </div>
  </div>
</div>

                
          <form>
       </div> 

      </div>
    </div>

</body>
</html>
