<?php
session_start();

// Enable error reporting for debugging (disable in production)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include('include/config.php');

// Check if the user is logged in
if (!isset($_SESSION['id']) || strlen($_SESSION['id']) == 0) {
    header('Location: logout.php');
    exit();
}

$msg = ""; // Initialize message variable

if (isset($_POST['submit'])) {
    // Safely retrieve form data
    $fullName = isset($_POST['fname']) ? trim($_POST['fname']) : '';
    $address = isset($_POST['address']) ? trim($_POST['address']) : '';
    $city = isset($_POST['city']) ? trim($_POST['city']) : '';
    $gender = isset($_POST['gender']) ? trim($_POST['gender']) : '';

    // Handle Profile Picture Upload
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0) {
        $allowed = ["jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png"];
        $filename = $_FILES['profile_pic']['name'];
        $filetype = $_FILES['profile_pic']['type'];
        $filesize = $_FILES['profile_pic']['size'];

        $ext = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if (!array_key_exists($ext, $allowed)) {
            $msg = "Error: Please select a valid file format.";
        } elseif ($filesize > 5 * 1024 * 1024) {
            $msg = "Error: File size is larger than the allowed limit.";
        } elseif (in_array($filetype, $allowed)) {
            $upload_dir = 'uploads/profile_pics/';
            if (!is_dir($upload_dir) && !mkdir($upload_dir, 0755, true)) {
                $msg = "Error: Failed to create upload directory.";
            } else {
                $newFilename = $upload_dir . uniqid() . "." . $ext;
                if (move_uploaded_file($_FILES['profile_pic']['tmp_name'], $newFilename)) {
                    $stmt_old = $con->prepare("SELECT profile_pic FROM users WHERE id = ?");
                    $stmt_old->bind_param("i", $_SESSION['id']);
                    $stmt_old->execute();
                    $result_old = $stmt_old->get_result();

                    if ($result_old->num_rows == 1) {
                        $data_old = $result_old->fetch_assoc();
                        if (!empty($data_old['profile_pic']) && file_exists($data_old['profile_pic'])) {
                            unlink($data_old['profile_pic']);
                        }
                    }
                    $stmt_old->close();
                    $profilePic = $newFilename;
                } else {
                    $msg = "Error: Failed to upload profile picture.";
                }
            }
        } else {
            $msg = "Error: There was a problem with your upload. Please try again.";
        }
    } else {
        $stmt_old = $con->prepare("SELECT profile_pic FROM users WHERE id = ?");
        $stmt_old->bind_param("i", $_SESSION['id']);
        $stmt_old->execute();
        $result_old = $stmt_old->get_result();

        if ($result_old->num_rows == 1) {
            $data_old = $result_old->fetch_assoc();
            $profilePic = $data_old['profile_pic'];
        } else {
            $profilePic = ''; // Default value if not found
        }
        $stmt_old->close();
    }

    if (empty($msg)) {
        $stmt = $con->prepare(
            "UPDATE users SET fullName = ?, address = ?, city = ?, gender = ?, profile_pic = ? WHERE id = ?"
        );

        if ($stmt === false) {
            die("Prepare failed: " . htmlspecialchars($con->error));
        }

        // Fix bind_param by ensuring the correct number of variables
        $stmt->bind_param(
            "sssssi", 
            $fullName, $address, $city, $gender, $profilePic, $_SESSION['id']
        );

        if ($stmt->execute()) {
            $msg = "User Details updated Successfully.";
        } else {
            $msg = "Error: Could not update user details. Please try again later.";
        }

        $stmt->close();
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
									<h1 class="mainTitle" id="mainTitle-h1">User | Edit Profile</h1>
																	</div>
								<ol class="breadcrumb" style="padding:25px 0px;">
									<li style="color:#fff;">
										<span>User</span>
									</li>
									<li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
										<span>Edit Profile</span>
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
                <h5 class="custom-form-title">Edit User Profile</h5>
            </div>
            <div class="custom-form-body">
                <?php 
                $uid = $_SESSION['id'];
                $sql = mysqli_query($con, "SELECT * FROM users WHERE id='$uid'");
                while ($data = mysqli_fetch_array($sql)) {
                ?>
                    <!-- Profile Info Box -->
                    <div style="margin-bottom: 30px; padding: 20px; background: linear-gradient(135deg, #f8fdff 0%, #e8f7ff 100%); border-radius: 12px; border-left: 4px solid #25b4e8;">
                        <h4 style="color: #115d79; margin-bottom: 10px;"><?php echo htmlentities($data['fullName']); ?>'s Profile</h4>
                        <p style="margin: 5px 0; color: #115d79;">
                            <b>Profile Reg. Date:</b> <?php echo htmlentities($data['regDate']); ?>
                        </p>
                        <?php if($data['updationDate']) { ?>
                        <p style="margin: 5px 0; color: #115d79;">
                            <b>Last Updated:</b> <?php echo htmlentities($data['updationDate']); ?>
                        </p>
                        <?php } ?>
                    </div>

                    <form action="" method="post" enctype="multipart/form-data" name="editProfileForm" onsubmit="return validateForm();">
                        
                        <!-- Full Name -->
                        <div class="custom-form-group">
                            <label for="fname" class="custom-label required">User Name</label>
                            <input type="text" name="fname" class="custom-input" id="fname" 
                                value="<?php echo htmlentities($data['fullName']); ?>" required>
                        </div>

                        <!-- Address -->
                        <div class="custom-form-group">
                            <label for="address" class="custom-label required">Address</label>
                            <textarea name="address" class="custom-textarea" id="address" required><?php echo htmlentities($data['address']); ?></textarea>
                        </div>

                        <!-- City -->
                        <div class="custom-form-group">
                            <label for="city" class="custom-label required">City</label>
                            <input type="text" name="city" class="custom-input" id="city" 
                                value="<?php echo htmlentities($data['city']); ?>" required>
                        </div>

                        <!-- Gender -->
                        <div class="custom-form-group">
                            <label for="gender" class="custom-label required">Gender</label>
                            <select name="gender" class="custom-select" required>
                                <option value="<?php echo htmlentities($data['gender']); ?>">
                                    <?php echo htmlentities($data['gender']); ?>
                                </option>
                                <option value="male">Male</option>	
                                <option value="female">Female</option>	
                                <option value="other">Other</option>	
                            </select>
                        </div>

                        <!-- Email -->
                        <div class="custom-form-group">
                            <label for="uemail" class="custom-label">User Email</label>
                            <input type="email" name="uemail" class="custom-input" id="uemail" 
                                value="<?php echo htmlentities($data['email']); ?>" readonly
                                style="background: #f8f9fa; cursor: not-allowed;">
                            <a href="change-emaild.php" class="custom-link">Update your email ID</a>
                        </div>

                        <!-- Profile Picture -->
                        <div class="custom-form-group">
                            <label for="profile_pic" class="custom-label">Profile Picture</label>
                            <div class="file-upload-container">
                                <input type="file" name="profile_pic" class="custom-file-input" id="profile_pic" accept="image/*">
                                <div class="file-upload-preview">
                                    <?php if(!empty($data['profile_pic']) && file_exists($data['profile_pic'])): ?>
                                        <div class="current-avatar">
                                            <img src="<?php echo htmlentities($data['profile_pic']); ?>" alt="Current Profile Picture" class="avatar-preview">
                                            <span class="avatar-label">Current Avatar</span>
                                        </div>
                                    <?php else: ?>
                                        <div class="no-avatar">
                                            <i class="fa fa-user-circle"></i>
                                            <span>No profile picture set</span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" name="submit" class="custom-submit-btn-edit">
                            <i class="fa fa-save"></i>
                            Update Profile
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
						
						<!-- end: BASIC EXAMPLE -->
			
					
					
						
						
					
						<!-- end: SELECT BOXES -->
						
					</div>
				</div>
			</div>
			<!-- start: FOOTER -->
	<?php include('include/footer.php');?>
			<!-- end: FOOTER -->
	
		</div>
		
		<!-- Form Validation Script -->
<script>
    function validateForm() {
        const fname = document.forms["editProfileForm"]["fname"].value;
        const address = document.forms["editProfileForm"]["address"].value;
        const city = document.forms["editProfileForm"]["city"].value;
        const profilePic = document.getElementById("profile_pic").files[0];

        if (fname === "" || address === "" || city === "") {
            alert("All fields are required.");
            return false;
        }

        if (profilePic && !profilePic.name.match(/\.(jpg|jpeg|png)$/)) {
            alert("Only JPG, JPEG, and PNG files are allowed for the profile picture.");
            return false;
        }

        return true;
    }
</script>
		
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
		
		<!-- Alert Box for Success or Error Message -->
        <?php if (!empty($msg)): ?>
            <script>
                alert("<?php echo htmlentities($msg); ?>");
            </script>
        <?php endif; ?>
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









