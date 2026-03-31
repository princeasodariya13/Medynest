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
		<title>Doctor | Manage Patients</title>

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
									<h1 class="mainTitle" id="mainTitle-h1">Doctor | Manage Patients</h1>
								</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
                  <li style="color:#fff;">
                    <span>Doctor</span>
                  </li>
                  <li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
                    <span>Manage Patient</span>
                  </li>
                </ol>
							</div>
						</section>
						<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <!-- Search Form Container -->
            <div class="custom-form-container">
                <div class="custom-form-header">
                    <h5 class="custom-form-title">Search Patients</h5>
                </div>
                <div class="custom-form-body">
                    <form role="form" method="post" name="search">
                        <div class="custom-form-group">
                            <label for="doctorname" class="custom-label">
                                Search by Name/Mobile No.
                            </label>
                            <input type="text" name="searchdata" id="searchdata" class="custom-input" value="" required='true' placeholder="Enter patient name or mobile number">
                        </div>
                        <div class="form-actions text-center">
                            <button type="submit" name="search" id="submit" class="custom-submit-btn">
                                <i class="fa fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <?php
            if (isset($_POST['search'])) {
                $sdata = $_POST['searchdata'];
            ?>
                <!-- Results Section -->
                <div class="custom-table-header">
                    <h5 class="custom-table-title">Search Results against "<span class="text-bold"><?php echo $sdata; ?></span>"</h5>
                </div>
                
                <div class="custom-table-container">
                    <div class="table-responsive">
                        <table class="custom-table" id="sample-table-1">
                            <thead>
                                <tr>
                                    <th class="center">Sr No</th>
                                    <th>Patient Name</th>
                                    <th>Contact Number</th>
                                    <th>Gender</th>
                                    <th>Creation Date</th>
                                    <!-- <th>Updation Date</th> -->
                                    <th class="center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql = mysqli_query($con, "select * from tblpatient where PatientName like '%$sdata%'|| PatientContno like '%$sdata%'");
                                $num = mysqli_num_rows($sql);
                                if ($num > 0) {
                                    $cnt = 1;
                                    while ($row = mysqli_fetch_array($sql)) {
                                ?>
                                        <tr>
                                            <td class="center"><?php echo $cnt; ?>.</td>
                                            <td class="hidden-xs"><?php echo $row['PatientName']; ?></td>
                                            <td><?php echo $row['PatientContno']; ?></td>
                                            <td><?php echo $row['PatientGender']; ?></td>
                                            <td><?php echo $row['CreationDate']; ?></td>
                                            <!-- <td><?php echo $row['UpdationDate']; ?></td> -->
                                            <td class="custom-action-cell">
                                                <!-- Desktop Actions -->
                                                <div class="action-desktop">
                                                    <a href="edit-patient.php?editid=<?php echo $row['ID']; ?>" class="custom-btn custom-btn-edit" target="_blank" title="Edit Patient">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>" class="custom-btn custom-btn-view" target="_blank" title="View Details">
                                                        <i class="fa fa-eye"></i>
                                                    </a>
                                                </div>
                                                
                                                <!-- Mobile Actions -->
                                                <div class="action-mobile">
                                                    <div class="custom-mobile-actions">
                                                        <button class="custom-mobile-btn">
                                                            <i class="fa fa-ellipsis-v"></i>
                                                        </button>
                                                        <div class="custom-mobile-menu">
                                                            <a href="edit-patient.php?editid=<?php echo $row['ID']; ?>" class="custom-mobile-menu-item" target="_blank">
                                                                <i class="fa fa-edit"></i> Edit
                                                            </a>
                                                            <a href="view-patient.php?viewid=<?php echo $row['ID']; ?>" class="custom-mobile-menu-item" target="_blank">
                                                                <i class="fa fa-eye"></i> View
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php
                                        $cnt = $cnt + 1;
                                    }
                                } else { ?>
                                    <tr>
                                        <td colspan="7" class="text-center" style="padding: 40px; color: #90caf9; font-style: italic;">
                                            <i class="fa fa-search" style="font-size: 3rem; margin-bottom: 15px; display: block;"></i>
                                            No records found against "<?php echo $sdata; ?>" keyword
                                        </td>
                                    </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            <?php } ?>
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