<?php
include_once('include/config.php');
if(isset($_POST['submit']))
{
$fname=$_POST['full_name'];
$address=$_POST['address'];
$city=$_POST['city'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$password=md5($_POST['password']);
$query=mysqli_query($con,"insert into users(fullname,address,city,gender,email,password) values('$fname','$address','$city','$gender','$email','$password')");
if($query)
{
	echo "<script>alert('Successfully Registered. You can login now');</script>";
	//header('location:user-login.php');
}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Patient Registration</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- FontAwesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        /* ===== Body ===== */
        body {
            background: linear-gradient(135deg, #0f2027, #203a43, #2c5364);
            /* height: 100vh; */
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', sans-serif;
            margin: 0;
			margin-top:10px;
        }

        /* ===== Registration Card ===== */
        .register-card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(15px);
            border-radius: 20px;
            padding: 40px;
            width: 100%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            color: #fff;
            animation: fadeIn 1s ease-in-out;
        }

        .register-card h2 {
            text-align: center;
            font-weight: 700;
            margin-bottom: 25px;
        }

        /* ===== Form Elements ===== */
        .form-control {
            background: rgba(255,255,255,0.1);
            border: none;
            color: #fff;
            padding: 12px;
            border-radius: 10px;
        }

        .form-control:focus {
            background: rgba(255,255,255,0.15);
            box-shadow: none;
            border: 1px solid #00c6ff;
        }

        .form-control::placeholder {
            color: #ddd;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            font-size: 16px;
            border-radius: 10px;
            background: linear-gradient(90deg, #00c6ff, #0072ff);
            border: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.3);
        }

        .radio-group label {
            margin-right: 20px;
        }

        .checkbox-group label {
            margin-left: 5px;
        }

        
    .links a {
      color: #00c6ff;
      text-decoration: none;
    }

    .links a:hover {
      text-decoration: underline;
    }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-20px);}
            to { opacity: 1; transform: translateY(0);}
        }
    </style>

    <script type="text/javascript">
        // Password confirmation validation
        function valid() {
            if (document.registration.password.value != document.registration.password_again.value) {
                alert("Password and Confirm Password do not match!");
                document.registration.password_again.focus();
                return false;
            }
            return true;
        }

        // Check email availability
        function userAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "check_availability.php",
                data: 'email=' + $("#email").val(),
                type: "POST",
                success: function(data){
                    $("#user-availability-status1").html(data);
                    $("#loaderIcon").hide();
                },
                error: function (){}
            });
        }
    </script>
</head>

<body>
    <div class="register-card" >
        <h2>Patient Registration</h2>

        <form name="registration" id="registration" method="post" onsubmit="return valid();">

            <p class="mb-3">Enter your personal details below:</p>

            <div class="mb-3">
                <input type="text" class="form-control" name="full_name" placeholder="Full Name" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="address" placeholder="Address" required>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" name="city" placeholder="City" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label><br>
                <div class="radio-group">
                    <input type="radio" id="male" name="gender" value="male">
                    <label for="male">Male</label>

                    <input type="radio" id="female" name="gender" value="female">
                    <label for="female">Female</label>

                    <input type="radio" id="other" name="gender" value="other">
                    <label for="other">Other</label>
                </div>
            </div>

            <p class="mb-3">Enter your account details below:</p>

            <div class="mb-3">
                <input type="email" class="form-control" name="email" id="email" onblur="userAvailability()" placeholder="Email" required>
                <span id="user-availability-status1" style="font-size:12px;"></span>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" id="password_again" name="password_again" placeholder="Confirm Password" required>
            </div>

            <div class="mb-3 checkbox-group">
                <input type="checkbox" id="agree" value="agree" checked readonly>
                <label for="agree">I agree to the terms and conditions</label>
            </div>

            <div class="mb-3 text-center links">
                <p>Already have an account? <a href="user-login.php">Log-in</a></p>
                <button type="submit" class="btn btn-primary" name="submit">
                    <i class="fa fa-arrow-circle-right"></i> Submit
                </button>
            </div>

        </form>

        <div class="mt-3 text-center">
            &copy; <span class="current-year"></span> <span class="text-bold text-uppercase">HMS</span>. All rights reserved.
        </div>
    </div>

    <!-- Scripts -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/modernizr/modernizr.js"></script>
    <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="vendor/switchery/switchery.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/login.js"></script>
    <script>
        jQuery(document).ready(function() {
            Main.init();
            Login.init();
        });
    </script>


		

		
	</body>
	<!-- end: BODY -->
</html>