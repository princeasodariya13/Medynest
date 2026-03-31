<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	$did = intval($_GET['id']); // get doctor id
	if (isset($_POST['submit'])) {
		$docspecialization = $_POST['Doctorspecialization'];
		$docname = $_POST['docname'];
		$docaddress = $_POST['clinicaddress'];
		$docfees = $_POST['docfees'];
		$doccontactno = $_POST['doccontact'];
		$docemail = $_POST['docemail'];
		$sql = mysqli_query($con, "Update doctors set specilization='$docspecialization',doctorName='$docname',address='$docaddress',docFees='$docfees',contactno='$doccontactno',docEmail='$docemail' where id='$did'");
		if ($sql) {
			$msg = "Doctor Details updated Successfully";
		}
	}
?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Admin | Edit Doctor Details</title>

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
				<!-- start: MENU TOGGLER FOR MOBILE DEVICES -->

				<!-- end: TOP NAVBAR -->
				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" id="mainTitle-h1">Admin | Edit Doctor Details</h1>
								</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Admin</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Edit Doctor Details</span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE Edit Doctor Details-->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-12">
									<h5 style="color: green; font-size:18px; ">
										<?php if ($msg) {
											echo htmlentities($msg);
										} ?> </h5>
									<div class="row margin-top-30">
										<div class="col-lg-8 col-md-12">
											<div class="custom-form-container">
    <div class="custom-form-header">
        <h5 class="custom-form-title">Edit Doctor Info</h5>
    </div>
    <div class="custom-form-body">
        <?php $sql = mysqli_query($con, "select * from doctors where id='$did'");
        while ($data = mysqli_fetch_array($sql)) {
        ?>
            <div style="text-align: center; margin-bottom: 25px; padding: 20px 20px 5px; background: linear-gradient(135deg, #e8f7ff 0%, #d1f0ff 100%); border-radius: 12px; border: 2px solid #e1f5fe;">
                <h4 style="color: #115d79; margin: 0 0 10px 0; font-weight: 700;"><?php echo htmlentities($data['doctorName']); ?>'s Profile</h4>
                <!-- <p style="color: #115d79; margin: 5px 0;"><b>Profile Reg. Date: </b><?php echo htmlentities($data['creationDate']); ?></p> -->
                <!-- <?php if ($data['updationDate']) { ?>
                    <p style="color: #115d79; margin: 5px 0;"><b>Profile Last Updation Date: </b><?php echo htmlentities($data['updationDate']); ?></p>
                <?php } ?> -->
            </div>
            
            <form role="form" name="adddoc" method="post" onSubmit="return valid();">
                <div class="custom-form-group">
                    <label for="DoctorSpecialization" class="custom-label">
                        Doctor Specialization
                    </label>
                    <select name="Doctorspecialization" class="custom-select" required="required">
                        <option value="<?php echo htmlentities($data['specilization']); ?>">
                            <?php echo htmlentities($data['specilization']); ?>
                        </option>
                        <?php $ret = mysqli_query($con, "select * from doctorspecilization");
                        while ($row = mysqli_fetch_array($ret)) {
                        ?>
                            <option value="<?php echo htmlentities($row['specilization']); ?>">
                                <?php echo htmlentities($row['specilization']); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="custom-form-group">
                    <label for="doctorname" class="custom-label">
                        Doctor Name
                    </label>
                    <input type="text" name="docname" class="custom-input" value="<?php echo htmlentities($data['doctorName']); ?>">
                </div>

                <div class="custom-form-group">
                    <label for="address" class="custom-label">
                        Doctor Clinic Address
                    </label>
                    <textarea name="clinicaddress" class="custom-textarea"><?php echo htmlentities($data['address']); ?></textarea>
                </div>

                <div class="custom-form-group">
                    <label for="fess" class="custom-label">
                        Doctor Consultancy Fees
                    </label>
                    <input type="text" name="docfees" class="custom-input" required="required" value="<?php echo htmlentities($data['docFees']); ?>">
                </div>

                <div class="custom-form-group">
                    <label for="fess" class="custom-label">
                        Doctor Contact no
                    </label>
                    <input type="text" name="doccontact" class="custom-input" required="required" value="<?php echo htmlentities($data['contactno']); ?>">
                </div>

                <div class="custom-form-group">
                    <label for="fess" class="custom-label">
                        Doctor Email
                    </label>
                    <input type="email" name="docemail" class="custom-input" readonly="readonly" value="<?php echo htmlentities($data['docEmail']); ?>" style="background: #f8f9fa; cursor: not-allowed;">
                </div>

                <button type="submit" name="submit" class="custom-submit-btn">
                    Update
                </button>
            </form>
        <?php } ?>
    </div>
</div>
										</div>

									</div>
								</div>
								<div class="col-lg-12 col-md-12">
									<div class="panel panel-white">


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
		<>
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