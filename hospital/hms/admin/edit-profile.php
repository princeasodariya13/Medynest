<?php
session_start();
ini_set('display_errors', 1); // Enable for debugging; disable in production
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include('include/config.php');

// Debugging: Confirm session ID
if (isset($_SESSION['id'])) {
    echo "<!-- Session ID: " . htmlentities($_SESSION['id']) . " -->";
} else {
    echo "<!-- Session ID is not set. -->";
}

// Check if the admin is logged in
if (!isset($_SESSION['id'])) {
    header('Location: login.php'); // Redirect to login page if not logged in
    exit();
}

$adminId = $_SESSION['id'];
$msg = "";

// Ensure $adminId is an integer
if (!is_numeric($adminId)) {
    die("Invalid admin ID.");
}

$adminId = (int)$adminId; // Cast to integer

// Fetch current admin data
$stmt = $con->prepare("SELECT adminName, email, contactno, profile_pic FROM admin WHERE id = ?");
if ($stmt === false) {
    die("Prepare failed: " . htmlspecialchars($con->error));
}

$bind = $stmt->bind_param("i", $adminId);
if ($bind === false) {
    die("Bind param failed: " . htmlspecialchars($stmt->error));
}

$exec = $stmt->execute();
if ($exec === false) {
    die("Execute failed: " . htmlspecialchars($stmt->error));
}

$result = $stmt->get_result();
if ($result === false) {
    die("Get result failed: " . htmlspecialchars($stmt->error));
}

if ($result->num_rows == 1) {
    $data = $result->fetch_assoc();
} else {
    // Handle case where admin data is not found
    die("Admin data not found.");
}

$stmt->close();

// Handle form submission
if(isset($_POST['submit'])) {
    // Retrieve and sanitize form inputs
    $adminName = trim($_POST['adminName']);
    $email = trim($_POST['email']);
    $contactno = trim($_POST['contactno']);

    // Validate inputs (basic example)
    if (empty($adminName) || empty($email) || empty($contactno)) {
        $msg = "All fields are required.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $msg = "Invalid email format.";
    } else {
        // Handle profile picture upload if a new file is uploaded
        if(isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
            $filename = $_FILES['profile_pic']['name'];
            $filetype = $_FILES['profile_pic']['type'];
            $filesize = $_FILES['profile_pic']['size'];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists(strtolower($ext), $allowed)) {
                $msg = "Error: Please select a valid file format.";
            }

            // Verify file size - 5MB maximum
            if($filesize > 5 * 1024 * 1024){
                $msg = "Error: File size is larger than the allowed limit.";
            }

            // Verify MIME type
            if(in_array($filetype, $allowed)){
                // Check whether profile_pic directory exists, if not, create it
                $upload_dir = 'uploads/profile_pics/';
                if(!is_dir($upload_dir)){
                    if (!mkdir($upload_dir, 0755, true)) {
                        $msg = "Error: Failed to create directories for uploads.";
                    }
                }

                // Generate a unique filename to prevent overwriting
                $newFilename = $upload_dir . uniqid() . "." . $ext;

                // Move the file to the upload directory
                if(move_uploaded_file($_FILES['profile_pic']['tmp_name'], $newFilename)){
                    // Optionally, delete the old profile picture if exists
                    if(!empty($data['profile_pic']) && file_exists($data['profile_pic'])){
                        unlink($data['profile_pic']);
                    }
                    $profilePic = $newFilename;
                } else {
                    $msg = "Error: Failed to upload profile picture.";
                }
            } else {
                $msg = "Error: There was a problem with your upload. Please try again.";
            }
        } else {
            // If no new profile picture is uploaded, retain the old one
            $profilePic = $data['profile_pic'];
        }

        // Update the admin data using prepared statements
        $updateStmt = $con->prepare("UPDATE admin SET adminName = ?, email = ?, contactno = ?, profile_pic = ? WHERE id = ?");
        if ($updateStmt === false) {
            die("Prepare failed: " . htmlspecialchars($con->error));
        }

        $bindUpdate = $updateStmt->bind_param("ssssi", $adminName, $email, $contactno, $profilePic, $adminId);
        if ($bindUpdate === false) {
            die("Bind param failed: " . htmlspecialchars($updateStmt->error));
        }

        $execUpdate = $updateStmt->execute();
        if ($execUpdate){
            $msg = "Your profile has been updated successfully.";
            // Refresh the data array with updated values
            $data['adminName'] = $adminName;
            $data['email'] = $email;
            $data['contactno'] = $contactno;
            $data['profile_pic'] = $profilePic;
        } else {
            $msg = "Error: Could not update your profile. Please try again later.";
        }

        $updateStmt->close();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Admin | Edit Profile</title>
    
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
        
        <!-- <link rel="stylesheet" href="assets/css/plugins.css"> -->
		<link rel="stylesheet" href="assets/css/doctor.css">

</head>
<body>
    <div id="app">		
        <?php include('include/sidebar.php');?>
        <div class="app-content">
            <?php include('include/header.php');?>
            
            <div class="main-content">
                <div class="wrap-content container" id="container">
                    <!-- PAGE TITLE -->
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
                    <!-- END PAGE TITLE -->

                    <!-- PROFILE EDIT FORM -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                            <div class="col-md-12">
                             <div class="row margin-top-30">
    <div class="col-lg-8 col-md-12">
        <div class="custom-form-container">
            <div class="custom-form-header">
                <h5 class="custom-form-title">Edit Profile</h5>
            </div>
            <div class="custom-form-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <!-- Admin Name -->
                    <div class="custom-form-group">
                        <label for="adminName" class="custom-label">Admin Name</label>
                        <input type="text" name="adminName" class="custom-input" id="adminName" value="<?php echo htmlentities($data['adminName']); ?>" required>
                    </div>

                    <!-- Admin Email -->
                    <div class="custom-form-group">
                        <label for="email" class="custom-label">Admin Email</label>
                        <input type="email" name="email" class="custom-input" id="email" readonly value="<?php echo htmlentities($data['email']); ?>" style="background: #f8f9fa; cursor: not-allowed;">
                        <div style="margin-top: 10px;">
                            <a href="change-emaild.php" style="color: #25b4e8; text-decoration: none; font-weight: 600; display: inline-flex; align-items: center; gap: 5px;">
                                <i class="fa fa-envelope"></i>
                                Update your email id
                            </a>
                        </div>
                    </div>

                    <!-- Admin Contact Number -->
                    <div class="custom-form-group">
                        <label for="contactno" class="custom-label">Admin Contact Number</label>
                        <input type="text" name="contactno" class="custom-input" id="contactno" value="<?php echo htmlentities($data['contactno']); ?>" required="true" maxlength="10">
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
            </div>
        </div>
    </div>
</div>



                               

                                <!-- Additional Content or Panels -->
                               
                            </div>
                        </div>
                    </div>
                    <!-- END PROFILE EDIT FORM -->

                </div>
            </div>
        </div>
        <!-- FOOTER -->
        <?php include('include/footer.php');?>
        <!-- END FOOTER -->
    </div>

    <!-- JavaScript Includes -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <!-- Add other JS files as needed -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/form-elements.js"></script>

    <!-- Alert Box for Success Message -->
    <?php if (!empty($msg) && strpos($msg, 'successfully') !== false): ?>
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
</body>
</html>
