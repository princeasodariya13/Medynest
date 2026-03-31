<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$eid = $_GET['editid'];
		$patname = $_POST['patname'];
		$patcontact = $_POST['patcontact'];
		$patemail = $_POST['patemail'];
		$gender = $_POST['gender'];
		$pataddress = $_POST['pataddress'];
		$patage = $_POST['patage'];
		$medhis = $_POST['medhis'];
		$sql = mysqli_query($con, "update tblpatient set PatientName='$patname',PatientContno='$patcontact',PatientEmail='$patemail',PatientGender='$gender',PatientAdd='$pataddress',PatientAge='$patage',PatientMedhis='$medhis' where ID='$eid'");
		if ($sql) {
			echo "<script>alert('Patient info updated Successfully');</script>";
			header('location:manage-patient.php');
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
									<h1 class="mainTitle" id="mainTitle-h1">Patient | Add Patient</h1>
								</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Patient</span>
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
                            <h5 class="custom-form-title">Edit Patient</h5>
                        </div>
                        <div class="custom-form-body">
                            <form role="form" name="" method="post">
                                <?php
                                $eid = $_GET['editid'];
                                $ret = mysqli_query($con, "select * from tblpatient where ID='$eid'");
                                $cnt = 1;
                                while ($row = mysqli_fetch_array($ret)) {
                                ?>
                                    <div class="custom-form-group">
                                        <label for="doctorname" class="custom-label required">
                                            Patient Name
                                        </label>
                                        <input type="text" name="patname" class="custom-input" value="<?php echo $row['PatientName']; ?>" required="true">
                                    </div>
                                    <div class="custom-form-group">
                                        <label for="fess" class="custom-label required">
                                            Patient Contact no
                                        </label>
                                        <input type="text" name="patcontact" class="custom-input" value="<?php echo $row['PatientContno']; ?>" required="true" maxlength="10" pattern="[0-9]+">
                                    </div>
                                    <div class="custom-form-group">
                                        <label for="fess" class="custom-label">
                                            Patient Email
                                        </label>
                                        <input type="email" id="patemail" name="patemail" class="custom-input" value="<?php echo $row['PatientEmail']; ?>" readonly='true'>
                                        <span id="email-availability-status" class="custom-error"></span>
                                    </div>
                                    <div class="custom-form-group">
                                        <label class="custom-label required">Gender: </label>
                                        <div class="custom-radio-group">
                                            <?php if ($row['PatientGender'] == "Female") { ?>
                                                <div class="radio-item">
                                                    <input type="radio" name="gender" id="gender_female" class="custom-radio" value="Female" checked="true">
                                                    <label for="gender_female" class="radio-label">Female</label>
                                                </div>
                                                <div class="radio-item">
                                                    <input type="radio" name="gender" id="gender_male" class="custom-radio" value="Male">
                                                    <label for="gender_male" class="radio-label">Male</label>
                                                </div>
                                            <?php } else { ?>
                                                <div class="radio-item">
                                                    <input type="radio" name="gender" id="gender_male" class="custom-radio" value="Male" checked="true">
                                                    <label for="gender_male" class="radio-label">Male</label>
                                                </div>
                                                <div class="radio-item">
                                                    <input type="radio" name="gender" id="gender_female" class="custom-radio" value="Female">
                                                    <label for="gender_female" class="radio-label">Female</label>
                                                </div>
                                            <?php } ?>
                                        </div>
                                    </div>
                                    <div class="custom-form-group">
                                        <label for="address" class="custom-label required">
                                            Patient Address
                                        </label>
                                        <textarea name="pataddress" class="form-control custom-textarea" required="true"><?php echo $row['PatientAdd']; ?></textarea>
                                    </div>
                                    <div class="custom-form-group">
                                        <label for="fess" class="custom-label required">
                                            Patient Age
                                        </label>
                                        <input type="text" name="patage" class="custom-input" value="<?php echo $row['PatientAge']; ?>" required="true">
                                    </div>
                                    <div class="custom-form-group">
                                        <label for="fess" class="custom-label">
                                            Medical History
                                        </label>
                                        <textarea type="text" name="medhis" class="custom-textarea" placeholder="Enter Patient Medical History(if any)"><?php echo $row['PatientMedhis']; ?></textarea>
                                    </div>
                                    <div class="custom-form-group">
                                        <label for="fess" class="custom-label">
                                            Creation Date
                                        </label>
                                        <input type="text" class="custom-input" value="<?php echo $row['CreationDate']; ?>" readonly='true'>
                                    </div>
                                <?php } ?>
                                <div class="form-actions">
                                    <button type="submit" name="submit" id="submit" class="custom-submit-btn">
                                        <i class="fa fa-save"></i> Update Patient
                                    </button>
                                </div>
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