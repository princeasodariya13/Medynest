<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>

<div class="sidebar app-aside" id="sidebar" style="background-color:#4ca0c7ff; color:#fff;">
    <div class="sidebar-container perfect-scrollbar" style="background-color:#4ca0c7ff;">

        <nav>
            <!-- start: MAIN NAVIGATION MENU -->
            <div class="navbar-title">
                <span style="color:#fff; font-weight:600; font-size:16px; text-transform:uppercase; letter-spacing:0.6px;">Main Navigation</span>
            </div>

            <ul class="main-navigation-menu" style="list-style:none; padding:0; margin:0;background-color:#4ca0c7ff;">
                <!-- Dashboard -->
                <li onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                    onmouseout="this.style.backgroundColor='transparent';">
                    <a href="dashboard.php" style="display:block; color:#fff; padding:12px 20px; text-decoration:none;"
                        onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                        onmouseout="this.style.backgroundColor='transparent';">
                        <div class="item-content" style="display:flex; align-items:center;">
                            <div class="item-media">
                                <i class="ti-home" style="color:#fff; font-size:18px; margin-right:8px;"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title">Dashboard</span>
                            </div>
                        </div>
                    </a>
                </li>

                <!-- Appointment History -->
                <li onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                    onmouseout="this.style.backgroundColor='transparent';">
                    <a href="appointment-history.php" style="display:block; color:#fff; padding:12px 20px; text-decoration:none;"
                        onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                        onmouseout="this.style.backgroundColor='transparent';">
                        <div class="item-content" style="display:flex; align-items:center;">
                            <div class="item-media">
                                <i class="ti-list" style="color:#fff; font-size:18px; margin-right:8px;"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title">Appointment History</span>
                            </div>
                        </div>
                    </a>
                </li>

                <!-- Patients Dropdown -->
                <li onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                    onmouseout="this.style.backgroundColor='transparent';">
                    <a href="javascript:void(0)" style="display:block; color:#fff; padding:12px 20px; text-decoration:none;"
                        onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                        onmouseout="this.style.backgroundColor='transparent';">
                        <div class="item-content" style="display:flex; align-items:center;">
                            <div class="item-media">
                                <i class="ti-user" style="color:#fff; font-size:18px; margin-right:8px;"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title">Patients</span> <i class="icon-arrow" style="color:#fff;"></i>
                            </div>
                        </div>
                    </a>
                    <ul class="sub-menu" style="
                        list-style:none; 
                        padding:0; 
                        margin:0; 
                        background-color:rgba(246,73,73,0.86);
                        border-radius:4px;
                    ">
                        <li onmouseover="this.style.backgroundColor='rgba(200,50,50,0.9)';"
                            onmouseout="this.style.backgroundColor='transparent';">
                            <a href="add-patient.php" style="
                                display:block; 
                                color:#fff; 
                                padding:10px 30px; 
                                text-decoration:none;
                                transition:background-color 0.3s ease;">
                                Add Patient
                            </a>
                        </li>

                        <li onmouseover="this.style.backgroundColor='rgba(200,50,50,0.9)';"
                            onmouseout="this.style.backgroundColor='transparent';">
                            <a href="manage-patient.php" style="
                                display:block; 
                                color:#fff; 
                                padding:10px 30px; 
                                text-decoration:none;
                                transition:background-color 0.3s ease;">
                                Manage Patient
                            </a>
                        </li>
                    </ul>
                </li>

                <!-- Search -->
                <li onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                    onmouseout="this.style.backgroundColor='transparent';">
                    <a href="search.php" style="display:block; color:#fff; padding:12px 20px; text-decoration:none;"
                        onmouseover="this.style.backgroundColor='rgba(246, 73, 73, 0.86)';"
                        onmouseout="this.style.backgroundColor='transparent';">
                        <div class="item-content" style="display:flex; align-items:center;">
                            <div class="item-media">
                                <i class="ti-search" style="color:#fff; font-size:18px; margin-right:8px;"></i>
                            </div>
                            <div class="item-inner">
                                <span class="title">Search</span>
                            </div>
                        </div>
                    </a>
                </li>

            </ul>
            <!-- end: CORE FEATURES -->
        </nav>
    </div>
</div>