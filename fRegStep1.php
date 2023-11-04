<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/login.css">
    <style>
    .error{
        background: #F2DEDE;
        color: #A94442;
        padding: 10px;
        width: 95%;
        border-radius: 5px;
        
    }
    body {
            position: relative;
        }

        body::before {
            content: "";
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background-image: url('https://amazinglanka.com/wp/wp-content/uploads/2015/07/1098746.jpg');
/* Replace 'your-image-url.jpg' with the actual URL of your background image */
            background-size: cover;
            background-repeat: no-repeat;
            filter: blur(8px); /* Adjust the '5px' value to control the amount of blur */
        }
        .box-area {
            max-width: 600px; /* Adjust the max-width to your preferred size */
            margin: 0 auto; /* Center the box horizontally */
            padding: 20px; /* Add some padding to the box */
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="row border rounded-5 p-3 bg-white shadow box-area"  >
            <div class="col-md-12 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-5">
                        <form action="f1.php" method="POST"> 
                            <h2 class="mb-3">Registration - Step 1</h2>
                            <?php
                                // Display error message if it exists in the URL parameters
                                if (isset($_GET['error'])) {
                                    echo '<p class="error">' . $_GET['error'] . '</p>';
                                }
                            ?>
                    </div>
                    <div class="mb-3">
                        <label for="nic" class="form-label">NIC:</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="NIC" name="nic" id="nic" required>
                    </div>
                    <div class="mb-3">
                        <label for="gn_division" class="form-label">GN Division:</label>
                        <select class="form-control form-control-lg bg-light fs-6" id="gn_division" name="gn_division" required>
                            <option value="">Select GN Division</option>
                            <option value="xxx-1">xxx-1</option>
                            <option value="yyy-2">yyy-2</option>
                            <option value="zzz-3">zzz-3</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="reg_number" class="form-label">Farmers' Association Registration Number:</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Farmers' Association Registration Number" name="reg_number" required>
                    </div>
                    <div class="mb-3">
                        <label for="member_id" class="form-label">Farmers Association Member ID:</label>
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Farmers Association Member ID" name="member_id" required>
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Next</button>
                </form>
            </div>
        </div> 
    </div>
    <script>
// Add your JavaScript code here
// ... (JavaScript code remains unchanged) ...

function validation(nic) {
    var result = false;
    if (nic.length === 10 && !isNaN(nic.substr(0, 9)) && isNaN(nic.substr(9, 1).toLowerCase()) && ['x', 'v'].includes(nicNumber.substr(9, 1).toLowerCase())) {
        var extracttedData = extractData(nic);
        var year = parseInt(extracttedData.year);
        var dayList = parseInt(extracttedData.dayList);

        // Validate birth year (assuming current year is 2023)
        if (year >= 0 && year <= 23) {
            // Validate day list
            if (dayList > 0 && dayList <= 366) { // 366 considering a leap year
                result = true;
            }
        }
    } else if (nic.length === 12 && !isNaN(nic)) {
        result = true;
    }

    return result;
}

</script>
</body>
</html>
