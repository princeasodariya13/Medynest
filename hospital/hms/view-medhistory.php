<?php
session_start();
error_reporting(0);
include('include/config.php');
include('include/checklogin.php');
check_login();
if (isset($_POST['submit'])) {

  $vid = $_GET['viewid'];
  $bp = $_POST['bp'];
  $bs = $_POST['bs'];
  $weight = $_POST['weight'];
  $temp = $_POST['temp'];
  $pres = $_POST['pres'];


  $query .= mysqli_query($con, "insert   tblmedicalhistory(PatientID,BloodPressure,BloodSugar,Weight,Temperature,MedicalPres)value('$vid','$bp','$bs','$weight','$temp','$pres')");
  if ($query) {
    echo '<script>alert("Medicle history has been added.")</script>';
    echo "<script>window.location.href ='manage-patient.php'</script>";
  } else {
    echo '<script>alert("Something Went Wrong. Please try again")</script>';
  }
}
$vid = $_GET['viewid'];
$ret = mysqli_query($con, "SELECT * FROM tblpatient WHERE ID='$vid'");
$patient = mysqli_fetch_array($ret);

// Initialize HTML for PDF generation
$html .= '<br>';
$html .= '<br>';
$html = '<h1>Patient Details</h1>';

$html .= '<p>ID: ' . $patient['ID'] . '</p>';
$html .= '<p>Name: ' . $patient['PatientName'] . '</p>';
$html .= '<p>Email: ' . $patient['PatientEmail'] . '</p>';
$html .= '<p>Contact: ' . $patient['PatientContno'] . '</p>';
$html .= '<p>Address: ' . $patient['PatientAdd'] . '</p>';
$html .= '<p>Gender: ' . $patient['PatientGender'] . '</p>';
$html .= '<p>Age: ' . $patient['PatientAge'] . '</p>';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Users | Medical History</title>

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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

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
                <h1 class="mainTitle" id="mainTitle-h1">Users | Medical History</h1>
              </div>
              <ol class="breadcrumb" style="padding:25px 0px;">
                  <li style="color:#fff;">
                    <span>Users</span>
                  </li>
                  <li class="active " style="color:rgba(200,50,50,0.9); padding:25px 5px;">
                      <span>Medical History</span>
                  </li>
                </ol>
            </div>
          </section>
          <div class="container-fluid container-fullw bg-white">
            <div class="row">
    <div class="col-md-12">

        <!-- Modern Header -->
        <div class="modern-header">
            <div class="header-content">
                <h1 class="modern-title">My <span class="accent-text">Medical History</span></h1>
                <div class="header-badge">
                    <i class="fa fa-user-injured"></i>
                    User Profile
                </div>
            </div>
        </div>

        <?php
        $vid = $_GET['viewid'];
        $ret = mysqli_query($con, "SELECT * FROM tblpatient WHERE ID='$vid'");
        while ($row = mysqli_fetch_array($ret)) {
        ?>

        <!-- Patient Info Cards -->
        <div class="info-grid">
            <!-- Personal Info -->
            <div class="info-card primary-card">
                <div class="card-icon"><i class="fa fa-user"></i></div>
                <div class="card-content">
                    <h3>Personal Information</h3>
                    <div class="info-row">
                        <span class="info-label">Full Name</span>
                        <span class="info-value"><?php echo $row['PatientName']; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Email</span>
                        <span class="info-value"><?php echo $row['PatientEmail']; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Phone</span>
                        <span class="info-value"><?php echo $row['PatientContno']; ?></span>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="info-card secondary-card">
                <div class="card-icon"><i class="fa fa-home"></i></div>
                <div class="card-content">
                    <h3>Contact Details</h3>
                    <div class="info-row">
                        <span class="info-label">Address</span>
                        <span class="info-value"><?php echo $row['PatientAdd']; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Gender</span>
                        <span class="info-value"><?php echo $row['PatientGender']; ?></span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Age</span>
                        <span class="info-value"><?php echo $row['PatientAge']; ?></span>
                    </div>
                </div>
            </div>

            <!-- Medical Background -->
            <div class="info-card accent-card">
                <div class="card-icon">
                  <!-- <i class="fa fa-file-medical"></i> -->
                        <i class="fa fa-file-medical"></i>

                </div>
                <div class="card-content">
                    <h3>Medical Background</h3>
                    <div class="info-row">
                        <span class="info-label">Medical History</span>
                        <span class="info-value">
                            <?php echo $row['PatientMedhis'] ?: 'No significant history'; ?>
                        </span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Registration Date</span>
                        <span class="info-value"><?php echo $row['CreationDate']; ?></span>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>

        <!-- Medical History Timeline -->
        <div class="section-header">
            <h2><i class="fa fa-history"></i> Medical History Timeline</h2>
            <?php
            $history = mysqli_query($con, "SELECT * FROM tblmedicalhistory WHERE PatientID='$vid'");
            $total = mysqli_num_rows($history);
            ?>
            <div class="header-actions">
                <span class="record-count">Total Records: <?php echo $total; ?></span>
            </div>
        </div>

        <div class="timeline-container">
            <?php
            $counter = 1;
            while ($row = mysqli_fetch_array($history)) {
            ?>
            <div class="timeline-item">
                <div class="timeline-marker" style="transform: translate(-7px);">
                    <div class="marker-dot"></div>
                    <div class="visit-number">#<?php echo $counter; ?></div>
                </div>
                <div class="timeline-content">
                    <div class="timeline-header">
                        <h4>Visit on <?php echo $row['CreationDate']; ?></h4>
                        <span class="visit-badge">Checkup</span>
                    </div>
                    <div class="vitals-grid">
                        <div class="vital-item">
                            <span class="vital-label">Blood Pressure</span>
                            <span class="vital-value"><?php echo $row['BloodPressure']; ?></span>
                        </div>
                        <div class="vital-item">
                            <span class="vital-label">Weight</span>
                            <span class="vital-value"><?php echo $row['Weight']; ?> kg</span>
                        </div>
                        <div class="vital-item">
                            <span class="vital-label">Blood Sugar</span>
                            <span class="vital-value"><?php echo $row['BloodSugar']; ?></span>
                        </div>
                        <div class="vital-item">
                            <span class="vital-label">Temperature</span>
                            <span class="vital-value"><?php echo $row['Temperature']; ?>°C</span>
                        </div>
                    </div>
                    <?php if ($row['MedicalPres']) { ?>
                    <div class="prescription-section">
                        <h5>Medical Prescription</h5>
                        <p><?php echo $row['MedicalPres']; ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <?php $counter++; } ?>

            <?php if ($counter == 1) { ?>
            <div class="empty-state">
                <i class="fa fa-clipboard-list"></i>
                <h3>No Medical History Found</h3>
                <p>No medical records available for you yet.</p>
            </div>
            <?php } ?>
        </div>

        <!-- Print / PDF Button -->
        <!-- <form method="post" action="generate-pdf.php?viewid=<?php echo $vid; ?>">
            <p align="center">
                <button class="btn btn-primary waves-effect waves-light w-lg" type="button" onclick="<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
;">
                    Print Medical History
                </button>
            </p>
        </form> -->

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