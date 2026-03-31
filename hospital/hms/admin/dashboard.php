<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {


?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Admin | Dashboard</title>

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
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="assets/css/styles.css">


		
	</head>

	<body>
		<div id="app">
			<?php include('include/sidebar.php'); ?>
			<div class="app-content">

				<?php include('include/header.php'); ?>

				<!-- end: TOP NAVBAR style="
           background-color:#4ca0c7ff;
            padding:25px 25px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);
           "> -->
				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title" style="
           background-color:#4ca0c7ff;
            padding:25px 25px;
            box-shadow:0 4px 12px rgba(0,0,0,0.1);
           ">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle " style=" color:#fff;
									font-weight:600;">Admin | Dashboard</h1>
								</div>
								<!-- <ol class="breadcrumb" style="padding:40px 0px">
									<li class="breadcrumb-item" style="color:#fff;">
										Admin
									</li>
									<li class="breadcrumb-item active" style="color:rgba(200,50,50,0.9);">
										Dashboard
									</li>
								</ol> -->
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Admin</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Dashboard</span>
									</li>
								</ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-sm-4">
									<!-- HMS Glossy Card -->
									<div class="doctor-card">
										<div class="doctor-icon">
											<i class="fa fa-user-md"></i>
										</div>

										<h2 class="doctor-title">Manage Doctors</h2>

										<a href="manage-doctors.php" class="doctor-link">
											<?php
											// This would be your PHP code to get the doctor count
											$result1 = mysqli_query($con, "SELECT * FROM doctors");
											$num_rows1 = mysqli_num_rows($result1);
											echo "👨‍⚕️ Total Doctors: " . htmlentities($num_rows1);

											// For demo purposes, showing static content
											// echo "👨‍⚕️ Total Doctors: 12";
											?>
										</a>

										<div class="doctor-glow"></div>
									</div>


								</div>
								<div class="col-sm-4">
									<div class="doctor-card">
										<div class="doctor-icon">
											<i class="fa fa-medkit"></i>
										</div>

										<h2 class="doctor-title">Appointments</h2>

										<a href="appointment-history.php" class="doctor-link">
											<?php
											$sql = mysqli_query($con, "SELECT * FROM appointment");
											$num_rows2 = mysqli_num_rows($sql);
											echo "📅Total Appointment:" . htmlentities($num_rows2);
											?>
										</a>

										<div class="doctor-glow"></div>
									</div>
								</div>

								<div class="col-sm-4">
									
										<div class="doctor-card">
											<div class="doctor-icon">
												<i class="fa fa-user-plus"></i>
											</div>

											<h2 class="doctor-title">Manage Patients</h2>

											<a href="manage-patient.php" class="doctor-link">
												<?php
												$result = mysqli_query($con, "SELECT * FROM tblpatient");
												$num_rows = mysqli_num_rows($result);
												echo "👥 Total Patients: " . htmlentities($num_rows);
												?>
											</a>

											<div class="doctor-glow"></div>
										</div>
									
								</div>
								<!--
<div class="col-sm-4">
                                <div class="panel panel-white no-radius text-center">
                                    <div class="panel-body">
                                        <span class="fa-stack fa-2x">
                                            <i class="fa fa-circle fa-stack-2x text-primary"></i>
                                            <i class="fa fa-solid fa-plus fa-stack-1x fa-inverse"></i>
                                        </span>
                                        <h2 class="StepTitle">Pharmacy</h2>
                                        <p class="links cl-effect-1">
                                            <a href="unread-queries.php">Total orders: <?php echo htmlentities($num_rows22); ?></a>
                                        </p>
                                    </div>
                                </div>
                            </div>

-->
								<!--
			<div class="col-sm-4">
									<div class="panel panel-white no-radius text-center">
										<div class="panel-body">
											<span class="fa-stack fa-2x"> 
											<i class="fa fa-circle fa-stack-2x text-primary"></i>
											<i class="fa fa-question-circle fa-stack-1x fa-inverse"></i> </span>
											<h2 class="StepTitle"> New Queries</h2>
											
											<p class="links cl-effect-1">
												<a href="book-appointment.php">
													<a href="unread-queries.php">
												<?php
												$sql = mysqli_query($con, "SELECT * FROM tblcontactus where  IsRead is null");
												$num_rows22 = mysqli_num_rows($sql);
												?>
											Total New Queries :<?php echo htmlentities($num_rows22);   ?>	
												</a>
												</a>
											</p>
										</div>
									</div>
								</div>

-->

							</div>
						</div>






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