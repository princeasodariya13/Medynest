<?php
session_start();
error_reporting(0);
include('include/config.php');

if(strlen($_SESSION['id']) == 0) {
    header('location:logout.php');
} else {

    if(isset($_GET['cancel'])) {
        $appointmentId = $_GET['id'];

        // Fetch appointment and patient details
        $result = mysqli_query($con, "SELECT users.email, users.fullName, appointment.doctorSpecialization FROM appointment JOIN users ON users.id = appointment.userId WHERE appointment.id = '$appointmentId'");
        $row = mysqli_fetch_assoc($result);

        $patientEmail = $row['email'];
        $patientName = $row['fullName'];
        $specialization = $row['doctorSpecialization'];

        // Update the appointment status to 'canceled'
        mysqli_query($con, "UPDATE appointment SET doctorStatus='0' WHERE id='$appointmentId'");
        $_SESSION['msg'] = "Appointment canceled !!";

        // Send cancellation email
        include('../../../../mail.php'); // Include the mail script

        $mail->addAddress($patientEmail, $patientName); // Send to the patient's email
        $mail->Subject = "Appointment Cancellation Notice";
        $mail->Body = "Dear $patientName, <br><br>Your appointment with the $specialization doctor has been canceled due to unforeseen circumstances. Please contact us for further assistance.<br><br>Thank you.";
        $mail->AltBody = $mail->Body; // For plain text clients

        if(!$mail->send()) {
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Cancellation email has been sent to ' . $patientEmail;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Doctor | Appointment History</title>
		
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
									<h1 class="mainTitle"  id="mainTitle-h1">Doctor  | Appointment History</h1>
																	</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Doctor</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Appointment History </span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <!-- Error Message -->
            <!-- <div class="error-message">
                <i class="fa fa-exclamation-circle"></i>
                <?php echo htmlentities($_SESSION['msg']);?>
                <?php echo htmlentities($_SESSION['msg']="");?>
            </div>
             -->
            <div class="custom-table-header">
                <h5 class="custom-table-title">My <span class="text-bold">Appointments</span></h5>
            </div>

            <div class="custom-table-container">
                <table class="custom-table" id="sample-table-1">
                    <thead>
                        <tr>
                            <th class="center">Sr No</th>
                            <th class="hidden-xs">Patient Name</th>
                            <th>Specialization</th>
                            <th>Consultancy Fee</th>
                            <th>Appointment Date / Time</th>
                            <th>Current Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql=mysqli_query($con,"select users.fullName as fname,appointment.*  from appointment join users on users.id=appointment.userId where appointment.doctorId='".$_SESSION['id']."'");
                        $cnt=1;
                        while($row=mysqli_fetch_array($sql))
                        {
                        ?>
                        <tr>
                            <td class="center"><?php echo $cnt;?>.</td>
                            <td class="hidden-xs"><?php echo $row['fname'];?></td>
                            <td><?php echo $row['doctorSpecialization'];?></td>
                            <td>₹<?php echo $row['consultancyFees'];?></td>
                            <td>
                                <div class="appointment-datetime">
                                    <span class="date"><?php echo $row['appointmentDate'];?></span>
                                    <span class="time"><?php echo $row['appointmentTime'];?></span>
                                </div>
                            </td>
                            <td>
                                <?php 
                                if(($row['userStatus']==1) && ($row['doctorStatus']==1)) {
                                    echo "<span class='status-badge status-active'>Active</span>";
                                }
                                if(($row['userStatus']==0) && ($row['doctorStatus']==1)) {
                                    echo "<span class='status-badge status-cancel-patient'>Cancel by Patient</span>";
                                }
                                if(($row['userStatus']==1) && ($row['doctorStatus']==0)) {
                                    echo "<span class='status-badge status-cancel-doctor'>Cancel by You</span>";
                                }
                                ?>
                            </td>
                            <td class="custom-action-cell">
                                <div class="action-desktop">
                                    <?php if(($row['userStatus']==1) && ($row['doctorStatus']==1)) { ?>
                                        <a href="appointment-history.php?id=<?php echo $row['id']?>&cancel=update" 
                                           onClick="return confirm('Are you sure you want to cancel this appointment?')" 
                                           class="custom-btn custom-btn-cancel" 
                                           title="Cancel Appointment">
                                            <i class="fa fa-times"></i>
                                        </a>
                                    <?php } else { ?>
                                        <span class="canceled-badge">Canceled</span>
                                    <?php } ?>
                                </div>
                            </td>
                        </tr>
                        <?php 
                        $cnt=$cnt+1;
                        }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
/* Additional CSS for Cancel Button */
.custom-btn-cancel {
    background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%) !important;
    color: white !important;
	transform: translateX(-35px);
}

.custom-btn-cancel:hover {
    transform: translateY(-2px) !important;
    box-shadow: 0 5px 15px rgba(255, 107, 107, 0.4) !important;
}



/* Currency Styling */
.custom-table td:nth-child(4) {
    color: #25b4e8;
    font-weight: 700;
}



/* Responsive Design */
@media (max-width: 768px) {
    .custom-action-cell {
        width: 100px !important;
        padding: 10px 8px !important;
    }
    
    .appointment-datetime {
        font-size: 12px;
    }
    
    .status-badge {
        font-size: 10px;
        padding: 4px 8px;
    }
    
    .custom-btn-cancel {
        width: 32px !important;
        height: 32px !important;
        font-size: 12px !important;
    }
}

/* Ensure table header alignment */
.custom-table th:last-child {
    text-align: center !important;
}

.custom-table td:last-child {
    text-align: center !important;
}
</style>
						
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
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>

