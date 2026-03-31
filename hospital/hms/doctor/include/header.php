<?php error_reporting(0); ?>
<header class="navbar navbar-default navbar-static-top" style="background-color:#4ca0c7ff;">
    <!-- start: NAVBAR HEADER -->
    <div class="navbar-header" style="background-color:#4ca0c7ff;">
        <a href="#" class="sidebar-mobile-toggler pull-left hidden-md hidden-lg" class="btn btn-navbar sidebar-toggle" data-toggle-class="app-slide-off" data-toggle-target="#app" data-toggle-click-outside="#sidebar">
            <i class="ti-align-justify" style="color:#000"></i>
        </a>
        <a class="navbar-brand" href="#">
            <h2 style="padding-top:10%; color:rgba(250, 35, 35, 0.97);font-weight:900; ">Medi Hub</h2>
        </a>
        <a href="#" class="sidebar-toggler pull-right visible-md visible-lg" data-toggle-class="app-sidebar-closed" data-toggle-target="#app">
            <i class="ti-align-justify" style="color:#000"></i>
        </a>
        <a class="pull-right menu-toggler visible-xs-block" id="menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <i class="ti-view-grid" style="color:#000"></i>
        </a>
    </div>
    <!-- end: NAVBAR HEADER -->
    
    <!-- start: NAVBAR COLLAPSE -->
    <div class="navbar-collapse collapse" style="background-color: #4ca0c7ff;">
        <ul class="nav navbar-right">
            <!-- start: MESSAGES DROPDOWN -->
            <li style="padding-top:2%; margin-right:10px;">
                <h2 style="color:rgba(246, 73, 73, 0.86);font-weight:500;">Hospital Management System</h2>
            </li>

            <li class="dropdown current-user">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="display:flex; align-items:center; padding:10px 15px;">
                    <!-- Fetch and display profile picture -->
                    <?php
                    // Initialize $userId from session
                    $userId = $_SESSION['id'];
                    
                    // Fetch user profile picture from the database
                    $sql = "SELECT profile_pic FROM doctors WHERE id = $userId";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);

                    // Check if a profile picture exists, otherwise show a default image
                    if (!empty($row['profile_pic'])) {
                        echo '<img src="' . $row['profile_pic'] . '" alt="Profile Picture" style="width:40px; height:40px; border-radius:10%;margin-right:10px;">';
                    } else {
                        echo '<img src="assets/images/images.jpg" alt="Default Profile Picture" style="width:40px; height:40px; border-radius:10%;margin-right:10px;">';
                    }
                    ?>
                    <span class="username" style="color:#000;font-size:larger">
                        <!-- Fetch doctor's name -->
                        <?php
                        $query = mysqli_query($con, "SELECT doctorName FROM doctors WHERE id='" . $_SESSION['id'] . "'");
                        while ($row = mysqli_fetch_array($query)) {
                            echo $row['doctorName'];
                        }
                        ?>
                    </span>
                    <i class="ti-angle-down" style="color:#000; margin-left:5px;"></i>
                </a>

                <ul class="dropdown-menu dropdown-dark" style="background-color:#415a77; color:#fff; border-radius:6px; border:none; box-shadow:0 2px 10px rgba(0,0,0,0.2);">
                    <li>
                        <a href="edit-profile.php" style="color:#fff; padding:10px 20px; display:block; text-decoration:none; transition:background-color 0.3s ease;" 
                           onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';" 
                           onmouseout="this.style.backgroundColor='transparent';">
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a href="change-password.php" style="color:#fff; padding:10px 20px; display:block; text-decoration:none; transition:background-color 0.3s ease;" 
                           onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';" 
                           onmouseout="this.style.backgroundColor='transparent';">
                            Change Password
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" style="color:#fff; padding:10px 20px; display:block; text-decoration:none; transition:background-color 0.3s ease;" 
                           onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';" 
                           onmouseout="this.style.backgroundColor='transparent';">
                            Log Out
                        </a>
                    </li>
                </ul>
            </li>
            <!-- end: USER OPTIONS DROPDOWN -->
        </ul>
        
        <!-- start: MENU TOGGLER FOR MOBILE DEVICES -->
        <div class="close-handle visible-xs-block menu-toggler" data-toggle="collapse" href=".navbar-collapse">
            <div class="arrow-left"></div>
            <div class="arrow-right"></div>
        </div>
        <!-- end: MENU TOGGLER FOR MOBILE DEVICES -->
    </div>
    <!-- end: NAVBAR COLLAPSE -->
</header>