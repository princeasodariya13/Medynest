<?php
session_start();
//error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();

if(isset($_POST['submit']))
{
$specilization=$_POST['Doctorspecialization'];
$doctorid=$_POST['doctor'];
$userid=$_SESSION['id'];
$fees=$_POST['fees'];
$appdate=$_POST['appdate'];
$time=$_POST['apptime'];
$userstatus=1;
$docstatus=1;
$query=mysqli_query($con,"insert into appointment(doctorSpecialization,doctorId,userId,consultancyFees,appointmentDate,appointmentTime,userStatus,doctorStatus) values('$specilization','$doctorid','$userid','$fees','$appdate','$time','$userstatus','$docstatus')");
	if($query)
	{
		echo "<script>alert('Your appointment successfully booked');</script>";
	}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User  | Book Appointment</title>
	
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
function getdoctor(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'specilizationid='+val,
	success: function(data){
		$("#doctor").html(data);
	}
	});
}
</script>	


<script>
function getfee(val) {
	$.ajax({
	type: "POST",
	url: "get_doctor.php",
	data:'doctor='+val,
	success: function(data){
		$("#fees").html(data);
	}
	});
}
</script>	




	</head>
	<body>
		<div id="app">		
<?php include('include/sidebar.php');?>
			<div class="app-content">
			
						<?php include('include/header.php');?>
					
				<!-- end: TOP NAVBAR -->
				<div class="main-content" >
					<div class="wrap-content container" id="container">
						<!-- start: PAGE TITLE -->
						<section id="page-title">
							<div class="row">
								<div class="col-sm-8">
									<h1 class="mainTitle" id="mainTitle-h1">User | Book Appointment</h1>
																	</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>User</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Book Appointment </span>
									</li>
								</ol>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
							<div class="row">
								<div class="col-md-10">
    <div class="custom-form-container">
        <!-- Header -->
        <div class="custom-form-header">
            <h5 class="custom-form-title">Book Appointment</h5>
        </div>

        <!-- Body -->
        <div class="custom-form-body">
            <p style="color:red;">
                <?php echo htmlentities($_SESSION['msg1']);?>
                <?php echo htmlentities($_SESSION['msg1']="");?>
            </p>

            <form role="form" name="book" method="post">
                <!-- Doctor Specialization -->
                <div class="custom-form-group">
                    <label for="DoctorSpecialization" class="custom-label required">
                        Doctor Specialization
                    </label>
                    <select name="Doctorspecialization" class="custom-select" onChange="getdoctor(this.value);" required="required">
                        <option value="">Select Specialization</option>
                        <?php 
                        $ret=mysqli_query($con,"select * from doctorspecilization");
                        while($row=mysqli_fetch_array($ret)) {
                        ?>
                        <option value="<?php echo htmlentities($row['specilization']);?>">
                            <?php echo htmlentities($row['specilization']);?>
                        </option>
                        <?php } ?>
                    </select>
                </div>

                <!-- Doctors -->
                <div class="custom-form-group">
                    <label for="doctor" class="custom-label required">
                        Doctors
                    </label>
                    <select name="doctor" class="custom-select" id="doctor" onChange="getfee(this.value);" required="required">
                        <option value="">Select Doctor</option>
                    </select>
                </div>

                <!-- Consultancy Fees -->
                <div class="custom-form-group">
                    <label for="consultancyfees" class="custom-label required">
                        Consultancy Fees
                    </label>
                    <select name="fees" class="custom-select" id="fees" readonly>
                    </select>
                </div>

                <!-- Appointment Date -->
                <div class="custom-form-group">
                    <label for="AppointmentDate" class="custom-label required">
                        Date
                    </label>
                    <input class="custom-input datepicker" name="appdate" required="required" data-date-format="yyyy-mm-dd" placeholder="YYYY-MM-DD">
                </div>

                <!-- Appointment Time -->
                <div class="custom-form-group">
                    <label for="Appointmenttime" class="custom-label required">
                        Time
                    </label>
                    <input class="custom-input" name="apptime" id="timepicker1" required="required" placeholder="e.g. 10:00 PM">
                </div>

                <!-- Submit Button -->
                <button type="submit" name="submit" class="custom-submit-btn">
                    Submit
                </button>
            </form>
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
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
		
			<!-- start: SETTINGS -->
	<?php include('include/setting.php');?>
			
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

			$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    startDate: '-3d'
});
		</script>
		  <script type="text/javascript">
            $('#timepicker1').timepicker();
        </script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>

	</body>
</html>
