<?php
session_start();

// Enable error reporting for debugging (Disable in production)
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('include/config.php');

// Corrected session check condition
if (strlen($_SESSION['id']) == 0) {
	header('location:logout.php');
	exit(); // Ensure the script stops after redirection
} else {

	date_default_timezone_set('Asia/Kolkata'); // Set the default timezone
	$currentTime = date('d-m-Y h:i:s A', time());

	if (isset($_POST['submit'])) {
		// Sanitize user inputs to prevent SQL injection
		$cpass = mysqli_real_escape_string($con, $_POST['cpass']);
		$npass = mysqli_real_escape_string($con, $_POST['npass']);
		$cfpass = mysqli_real_escape_string($con, $_POST['cfpass']);

		$email = $_SESSION['login']; // Assuming 'login' stores the admin's email

		// Check if the current password matches
		$sql = mysqli_query($con, "SELECT password FROM admin WHERE password='$cpass' AND email='$email'");
		$num = mysqli_num_rows($sql);

		if ($num > 0) {
			// Ensure new password and confirm password match
			if ($npass === $cfpass) {
				// Update the password in the database
				$update = mysqli_query($con, "UPDATE admin SET password='$npass'WHERE email='$email'");

				if ($update) {
					$_SESSION['msg1'] = "Password Changed Successfully !!";
				} else {
					$_SESSION['msg1'] = "Password Change Failed !! Please try again.";
				}
			} else {
				$_SESSION['msg1'] = "New Password and Confirm Password do not match !!";
			}
		} else {
			$_SESSION['msg1'] = "Old Password does not match !!";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Admin | change Password</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="vendor/themify-icons/themify-icons.min.css">
		<link href="vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/doctor.css">
		<!-- <link rel="stylesheet" href="assets/css/plugins.css"> -->
		<!-- <link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" /> -->
		<script type="text/javascript">
			function valid() {
				if (document.chngpwd.cpass.value == "") {
					alert("Current Password Filed is Empty !!");
					document.chngpwd.cpass.focus();
					return false;
				} else if (document.chngpwd.npass.value == "") {
					alert("New Password Filed is Empty !!");
					document.chngpwd.npass.focus();
					return false;
				} else if (document.chngpwd.cfpass.value == "") {
					alert("Confirm Password Filed is Empty !!");
					document.chngpwd.cfpass.focus();
					return false;
				} else if (document.chngpwd.npass.value != document.chngpwd.cfpass.value) {
					alert("Password and Confirm Password Field do not match  !!");
					document.chngpwd.cfpass.focus();
					return false;
				}
				return true;
			}
		</script>

	</head>
			<style>
				
.custom-submit-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: linear-gradient(135deg, #25b4e8 0%, #115d79 100%);
    color: white;
    border: none;
    padding: 16px 40px;
    border-radius: 12px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.3s ease;
    font-size: 1rem;
    letter-spacing: 0.5px;
    text-transform: uppercase;
    box-shadow: 0 8px 25px rgba(37, 180, 232, 0.3);
    position: relative;
    overflow: hidden;
}

.custom-submit-btn::before {
    content: "";
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: linear-gradient(
        90deg,
        transparent,
        rgba(255, 255, 255, 0.2),
        transparent
    );
    transition: left 0.5s;
}

.custom-submit-btn:hover {
    transform: translateY(-3px);
    box-shadow: 0 12px 35px rgba(37, 180, 232, 0.4);
}

.custom-submit-btn:hover::before {
    left: 100%;
}

.custom-submit-btn:active {
    transform: translateY(-1px);
    box-shadow: 0 6px 20px rgba(37, 180, 232, 0.4);
}

/* Responsive Design */
@media (max-width: 768px) {
    .custom-submit-btn {
        width: 100%;
        justify-content: center;
    }
    
    .error-message {
        padding: 12px 15px;
        font-size: 14px;
    }
}
			</style>
	<body>
		<div id="app">
			<?php include('include/sidebar.php'); ?>
			<div class="app-content">

				<?php include('include/header.php'); ?>

				</header>
				<!-- end: TOP NAVBAR -->
				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" id="mainTitle-h1">Admin | Change Password</h1>
								</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Admin</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Change Password </span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
    <div class="col-md-12">
        <div class="row margin-top-30">
            <div class="col-lg-8 col-md-12">
                <div class="custom-form-container">
                    <div class="custom-form-header">
                        <h5 class="custom-form-title">Change Password</h5>
                    </div>
                    <div class="custom-form-body">
                        <!-- Error Message -->
                        <div class="error-message">
                            <i class="fa fa-exclamation-circle"></i>
                            <?php echo htmlentities($_SESSION['msg1']); ?>
                            <?php echo htmlentities($_SESSION['msg1'] = ""); ?>
                        </div>

                        <form role="form" name="chngpwd" method="post" onSubmit="return valid();">
                            <style>
                                .required::after {
                                    font-weight: bold;
                                    content: ' *';
                                    color: #ff4757;
                                }
                            </style>

                            <!-- Current Password -->
                            <div class="custom-form-group">
                                <label for="exampleInputEmail1" class="custom-label required">
                                    Current Password
                                </label>
                                <input type="password" name="cpass" class="custom-input" placeholder="Enter Current Password">
                            </div>

                            <!-- New Password -->
                            <div class="custom-form-group">
                                <label for="exampleInputPassword1" class="custom-label required">
                                    New Password
                                </label>
                                <input type="password" name="npass" class="custom-input" placeholder="New Password">
                            </div>

                            <!-- Confirm Password -->
                            <div class="custom-form-group">
                                <label for="exampleInputPassword1" class="custom-label required">
                                    Confirm Password
                                </label>
                                <input type="password" name="cfpass" class="custom-input" placeholder="Confirm Password">
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" name="submit" class="custom-submit-btn">
                                <i class="fa fa-key"></i>
                                Update Password
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
						</div>
					</div>
				</div>
				<!-- end: BASIC EXAMPLE -->






				<!-- end: SELECT BOXES -->

			</div>
		</div>
		</div>
		<!-- start: FOOTER -->
		<?php include('include/footer.php'); ?>
		<!-- end: FOOTER -->

		<!-- start: SETTINGS -->
		<?php include('include/setting.php'); ?>

		<!-- end: SETTINGS -->
		</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="vendor/jquery/jquery.min.js"></script>
		<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="vendor/modernizr/modernizr.js"></script>
		<script src="vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<script src="vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="vendor/autosize/autosize.min.js"></script>
		<script src="vendor/selectFx/classie.js"></script>
		<script src="vendor/selectFx/selectFx.js"></script>
		<script src="vendor/select2/select2.min.js"></script>
		<script src="vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>

	</html>
<?php } ?>