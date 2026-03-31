<?php
session_start();
error_reporting(0);
include('include/config.php');
if (strlen($_SESSION['id'] == 0)) {
	header('location:logout.php');
} else {

	if (isset($_POST['submit'])) {
		$doctorspecilization = $_POST['doctorspecilization'];
		$sql = mysqli_query($con, "insert into doctorSpecilization(specilization) values('$doctorspecilization')");
		$_SESSION['msg'] = "Doctor Specialization added successfully !!";
	}
	//Code Deletion
	if (isset($_GET['del'])) {
		$sid = $_GET['id'];
		mysqli_query($con, "delete from doctorSpecilization where id = '$sid'");
		$_SESSION['msg'] = "data deleted !!";
	}
?>

	<?php
	$msg = ""; // Initialize the message

	// Handle form submission
	if (isset($_POST['submit'])) {
		// Get the submitted specialization value
		$doctorspecilization = trim($_POST['doctorspecilization']);

		// Validate the input
		if (empty($doctorspecilization)) {
			$msg = "Please enter a valid Doctor Specialization.";
		} else {
			// You can add code here to save the specialization to the database, for example

			// Set a success message
			$msg = "Doctor specialization has been submitted successfully.";
		}
	}
	?>
	<!DOCTYPE html>
	<html lang="en">

	<head>
		<title>Admin | Doctor Specialization</title>

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
		<link rel="stylesheet" href="assets/css/plugins.css">
		<link rel="stylesheet" href="assets/css/themes/theme-1.css" id="skin_color" />
		<link rel="stylesheet" href="assets/css/styles.css">
		<link rel="stylesheet" href="assets/css/doctor.css">
	</head>


	<body>
		<div id="app">
			<?php include('include/sidebar.php'); ?>
			<div class="app-content">

				<?php include('include/header.php'); ?>

				<!-- end: TOP NAVBAR -->
				<div class="main-content">
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" id="mainTitle-h1">Admin | Add Doctor Specialization</h1>
								</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Admin</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Add Doctor Specialization</span>
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
            <div class="col-lg-6 col-md-12">
                <div class="custom-form-container">
                    <div class="custom-form-header">
                        <h5 class="custom-form-title">Doctor Specialization</h5>
                    </div>
                    <div class="custom-form-body">
                        <form role="form" name="dcotorspcl" method="post" onsubmit="return validateForm()" class="custom-form">
                            <div class="custom-form-group">
                                <label for="doctorspecilization" class="custom-label">
                                    Doctor Specialization
                                </label>
                                <input 
                                    type="text" 
                                    id="doctorspecilization" 
                                    name="doctorspecilization" 
                                    class="custom-input"  
                                    placeholder="Enter Doctor Specialization"
                                    required
                                >
                                <span id="error-message" class="custom-error">Please enter the doctor specialization.</span>
                            </div>

                            <button type="submit" name="submit" class="custom-submit-btn">
                                Submit
                            </button>
                        </form>
                        <?php if (!empty($msg)): ?>
                            <script>
                                alert("<?php echo htmlentities($msg); ?>");
                            </script>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
							<div class="row">
    <div class="col-md-12">
        <div class="custom-table-header">
            <h5 class="custom-table-title">Manage <span class="text-bold">Doctor Specialization</span></h5>
        </div>

        <div class="custom-table-container">
            <table class="custom-table" id="sample-table-1">
                <thead>
                    <tr>
                        <th class="center">Sr No.</th>
                        <th>Specialization</th>
                        <!-- <th class="hidden-xs">Creation Date</th> -->
                        <!-- <th>Updation Date</th> -->
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = mysqli_query($con, "select * from doctorSpecilization");
                    $cnt = 1;
                    while ($row = mysqli_fetch_array($sql)) {
                    ?>
                        <tr>
                            <td class="center"><?php echo $cnt; ?>.</td>
                            <td class="hidden-xs"><?php echo $row['specilization']; ?></td>
                            <!-- <td><?php echo $row['creationDate']; ?></td> -->
                            <!-- <td><?php echo $row['updationDate']; ?></td> -->
                            <td>
                                <div class="visible-md visible-lg hidden-sm hidden-xs">
                                    <a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="custom-btn custom-btn-edit" title="Edit">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a href="doctor-specilization.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="custom-btn custom-btn-delete" title="Remove">
                                        <i class="fa fa-times"></i>
                                    </a>
                                </div>
                                <div class="visible-xs visible-sm hidden-md hidden-lg">
                                    <div class="custom-mobile-actions">
                                        <button type="button" class="custom-mobile-btn">
                                            <i class="fa fa-ellipsis-v"></i>
                                        </button>
                                        <div class="custom-mobile-menu">
                                            <a href="edit-doctor-specialization.php?id=<?php echo $row['id']; ?>" class="custom-mobile-menu-item">
                                                <i class="fa fa-pencil"></i> Edit
                                            </a>
                                            <a href="doctor-specilization.php?id=<?php echo $row['id'] ?>&del=delete" onClick="return confirm('Are you sure you want to delete?')" class="custom-mobile-menu-item">
                                                <i class="fa fa-times"></i> Delete
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php
                        $cnt = $cnt + 1;
                    } ?>
                </tbody>
            </table>
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