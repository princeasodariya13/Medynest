<?php
session_start();
error_reporting(0);
include('include/config.php');
if(isset($_POST['submit']))
{
	$email=$_POST['email'];
$sql=mysqli_query($con,"Update admin set email='$email' where id='".$_SESSION['id']."'");
if($sql)
{
$msg="Your email updated Successfully";


}

}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User | Edit Profile</title>
		
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
									<h1 class="mainTitle" id="mainTitle-h1">Admin | Edit Profile</h1>
																	</div>
								 <ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>Admin</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Edit Profile </span>
									</li>
								</ol>
							</div>
						</section>
						<!-- end: PAGE TITLE -->
						<!-- start: BASIC EXAMPLE -->
						<div class="container-fluid container-fullw bg-white">
    <div class="row">
        <div class="col-md-12">
            <!-- Success Message -->
            <?php if($msg) { ?>
            <div class="success-message">
                <i class="fa fa-check-circle"></i>
                <?php echo htmlentities($msg); ?>
            </div>
            <?php } ?>

            <div class="row margin-top-30">
                <div class="col-lg-8 col-md-12">
                    <div class="custom-form-container">
                        <div class="custom-form-header">
                            <h5 class="custom-form-title">Update Email</h5>
                        </div>
                        <div class="custom-form-body">
                            <form name="registration" id="updatemail" method="post">
                                <div class="custom-form-group">
                                    <label for="email" class="custom-label">
                                        Admin Email
                                    </label>
                                    <input type="email" class="custom-input" name="email" id="email" onBlur="userAvailability()" placeholder="Enter new email address" required>
                                    <span id="user-availability-status1" class="availability-status"></span>
                                </div>

                                <button type="submit" name="submit" id="submit" class="custom-submit-btn">
                                    <i class="fa fa-envelope"></i>
                                    Update Email
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
/* Success Message Styling */
/* Submit button with envelope icon */
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

/* Input focus states */
.custom-input:focus {
    border-color: #25b4e8 !important;
    box-shadow: 0 0 0 4px rgba(37, 180, 232, 0.15);
    outline: none;
    background: white;
    transform: translateY(-2px);
}

/* Responsive design */
@media (max-width: 768px) {
    .success-message {
        padding: 12px 15px;
        font-size: 14px;
    }
    
    .custom-submit-btn {
        width: 100%;
        justify-content: center;
    }
    
    .custom-form-container {
        margin-bottom: 30px !important;
    }
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
	<script>
function userAvailability() {
$("#loaderIcon").show();
jQuery.ajax({
url: "check_availability.php",
data:'email='+$("#email").val(),
type: "POST",
success:function(data){
$("#user-availability-status1").html(data);
$("#loaderIcon").hide();
},
error:function (){}
});
}
</script>	
		
	</body>
</html>
