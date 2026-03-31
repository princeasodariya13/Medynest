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
        <title>Patients | Appointment History</title>

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
        <!-- appointment ma style ma link hover ma change karvanu che 	 -->
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
                                    <h1 class="mainTitle" id="mainTitle-h1">Patients | Appointment History</h1>
                                </div>
                                <ol class="breadcrumb" style="padding:25px 0px;">
                                    <li style="color:#fff;">
                                        <span>Patients</span>
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
                <?php echo htmlentities($_SESSION['msg']); ?>
                <?php echo htmlentities($_SESSION['msg'] = ""); ?>
            </div>
             -->
                                    <div class="custom-table-header">
                                        <h5 class="custom-table-title">Manage <span class="text-bold">Appointments</span></h5>
                                    </div>

                                    <div class="custom-table-container">
                                        <table class="custom-table" id="sample-table-1">
                                            <thead>
                                                <tr>
                                                    <th class="center">Sr No</th>
                                                    <th class="hidden-xs">Doctor Name</th>
                                                    <th>Patient Name</th>
                                                    <th>Specialization</th>
                                                    <th>Consultancy Fee</th>
                                                    <th>Appointment Date / Time</th>
                                                    <!-- <th>Appointment Creation Date</th> -->
                                                    <th>Current Status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $sql = mysqli_query($con, "select doctors.doctorName as docname,users.fullName as pname,appointment.*  from appointment join doctors on doctors.id=appointment.doctorId join users on users.id=appointment.userId ");
                                                $cnt = 1;
                                                while ($row = mysqli_fetch_array($sql)) {
                                                ?>
                                                    <tr>
                                                        <td class="center"><?php echo $cnt; ?>.</td>
                                                        <td class="hidden-xs"><?php echo $row['docname']; ?></td>
                                                        <td class="hidden-xs"><?php echo $row['pname']; ?></td>
                                                        <td><?php echo $row['doctorSpecialization']; ?></td>
                                                        <td>₹<?php echo $row['consultancyFees']; ?></td>
                                                        <td>
                                                            <div class="appointment-datetime">
                                                                <span class="date"><?php echo $row['appointmentDate']; ?></span>
                                                                <span class="time"><?php echo $row['appointmentTime']; ?></span>
                                                            </div>
                                                        </td>
                                                        <!-- <td><?php echo $row['postingDate']; ?></td> -->
                                                        <td style="width:200px;text-align:center">
                                                            <?php
                                                            $statusClass = '';
                                                            if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) {
                                                                echo "<span class='status-badge status-active' >Active</span>";
                                                                $statusClass = 'status-active';
                                                            }
                                                            if (($row['userStatus'] == 0) && ($row['doctorStatus'] == 1)) {
                                                                echo "<span class='status-badge status-cancel-patient'>Cancel Patient</span>";
                                                                $statusClass = 'status-cancel-patient';
                                                            }
                                                            if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 0)) {
                                                                echo "<span class='status-badge status-cancel-doctor'>Cancel Doctor</span>";
                                                                $statusClass = 'status-cancel-doctor';
                                                            }
                                                            ?>
                                                        </td>
                                                        <td class="custom-action-cell">
                                                            <div class="action-desktop">
                                                                <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                                                                    <span class="no-action">No Action yet</span>
                                                                <?php } else { ?>
                                                                    <span class="canceled-badge">Canceled</span>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="action-mobile">
                                                                <div class="custom-mobile-actions">
                                                                    <button type="button" class="custom-mobile-btn">
                                                                        <i class="fa fa-ellipsis-v"></i>
                                                                    </button>
                                                                    <div class="custom-mobile-menu">
                                                                        <?php if (($row['userStatus'] == 1) && ($row['doctorStatus'] == 1)) { ?>
                                                                            <span class="custom-mobile-menu-item no-action">No Action yet</span>
                                                                        <?php } else { ?>
                                                                            <span class="custom-mobile-menu-item canceled-badge">Canceled</span>
                                                                        <?php } ?>
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