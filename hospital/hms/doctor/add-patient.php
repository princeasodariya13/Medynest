<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$docid = $_SESSION['id'];

		$patname = $_POST['patname'];
		$patcontact = $_POST['patcontact'];
		$patemail = $_POST['patemail'];
		$gender = $_POST['gender'];
		$pataddress = $_POST['pataddress'];
		$patage = $_POST['patage'];
		$medhis = $_POST['medhis'];
		$sql = mysqli_query($con, "insert into tblpatient(Docid,PatientName,PatientContno,PatientEmail,PatientGender,PatientAdd,PatientAge,PatientMedhis) values('$docid','$patname','$patcontact','$patemail','$gender','$pataddress','$patage','$medhis')");
		if ($sql) {
			echo "<script>alert('Patient info added Successfully');</script>";
			echo "<script>window.location.href ='manage-patient.php'</script>";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Doctor | Add Patient</title>

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

		<script>
			function userAvailability() {
				$("#loaderIcon").show();
				jQuery.ajax({
					url: "check_availability.php",
					data: 'email=' + $("#patemail").val(),
					type: "POST",
					success: function(data) {
						$("#user-availability-status1").html(data);
						$("#loaderIcon").hide();
					},
					error: function() {}
				});
			}
		</script>
	</head>

	<body>
		<div id="app">
			<?php include('include/sidebar.php'); ?>
			<div class="app-content">
				<?php include('include/header.php'); ?>

				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" id="mainTitle-h1">Doctor | Add Patient</h1>
								</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Doctor</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Add Patient</span>
									</li>
								</ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <div class="row margin-top-30">
                <div class="col-lg-8 col-md-12">
                    <div class="custom-form-container">
                        <div class="custom-form-header">
                            <h5 class="custom-form-title">Add Patient</h5>
                        </div>
                        <div class="custom-form-body">
                            <form role="form" name="" method="post">
                                <!-- Patient Name -->
                                <div class="custom-form-group">
                                    <label for="doctorname" class="custom-label required">
                                        Patient Name
                                    </label>
                                    <input type="text" name="patname" class="custom-input" placeholder="Enter Patient Name" required="true">
                                </div>

                                <!-- Patient Contact -->
                                <div class="custom-form-group">
                                    <label for="fess" class="custom-label required">
                                        Patient Contact no
                                    </label>
                                    <input type="text" name="patcontact" class="custom-input" placeholder="Enter Patient Contact no" required="true" maxlength="10" pattern="[0-9]+">
                                </div>

                                <!-- Patient Email -->
                                <div class="custom-form-group">
                                    <label for="fess" class="custom-label required">
                                        Patient Email
                                    </label>
                                    <input type="email" id="patemail" name="patemail" class="custom-input" placeholder="Enter Patient Email id" required="true" onBlur="userAvailability()">
                                    <span id="user-availability-status1" class="availability-status"></span>
                                </div>

                                <!-- Gender -->
                                <div class="custom-form-group">
                                    <label class="custom-label required">
                                        Gender
                                    </label>
                                    <div class="custom-radio-group">
                                        <div class="radio-item">
                                            <input type="radio" id="rg-male" name="gender" value="male" class="custom-radio">
                                            <label for="rg-male" class="radio-label">
                                                Male
                                            </label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="rg-female" name="gender" value="female" class="custom-radio">
                                            <label for="rg-female" class="radio-label">
                                                Female
                                            </label>
                                        </div>
                                        <div class="radio-item">
                                            <input type="radio" id="rg-other" name="gender" value="other" class="custom-radio">
                                            <label for="rg-other" class="radio-label">
                                                Other
                                            </label>
                                        </div>
                                    </div>
                                </div>

                                <!-- Patient Address -->
                                <div class="custom-form-group">
                                    <label for="address" class="custom-label required">
                                        Patient Address
                                    </label>
                                    <textarea name="pataddress" class="custom-textarea" placeholder="Enter Patient Address" required="true"></textarea>
                                </div>

                                <!-- Patient Age -->
                                <div class="custom-form-group">
                                    <label for="fess" class="custom-label required">
                                        Patient Age
                                    </label>
                                    <input type="text" name="patage" class="custom-input" placeholder="Enter Patient Age" required="true">
                                </div>

                                <!-- Medical History -->
                                <div class="custom-form-group">
                                    <label for="fess" class="custom-label required">
                                        Medical History
                                    </label>
                                    <textarea name="medhis" class="custom-textarea" placeholder="Enter Patient Medical History(if any)" required="true"></textarea>
                                </div>

                                <!-- Submit Button -->
                                <button type="submit" name="submit" id="submit" class="custom-submit-btn">
                                    <i class="fa fa-user-plus"></i>
                                    Add Patient
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>

/* Required Field Styling */
.required::after {
    font-weight: bold !important;
    content: ' *' !important;
    color: #ff4757 !important;
}

/* Submit Button with Icon */
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
    .custom-radio-group {
        flex-direction: column;
        gap: 12px;
    }
    
    .custom-submit-btn {
        width: 100%;
        justify-content: center;
    }
    
    .radio-item {
        gap: 10px;
    }
}
</style>
					</div>
				</div>
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