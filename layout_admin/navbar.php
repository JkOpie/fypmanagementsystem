<nav class="topnav navbar navbar-expand shadow justify-content-between justify-content-sm-start navbar-light bg-white" id="sidenavAccordion">
    <!-- Sidenav Toggle Button-->
    <button class="btn btn-icon btn-transparent-dark order-1 order-lg-0 me-2 ms-lg-2 me-lg-0" id="sidebarToggle"><i data-feather="menu"></i></button>
    <a class="navbar-brand pe-3 ps-4 ps-lg-2" >Final Year Title Management System</a>

    <!-- Navbar Items-->
    <ul class="navbar-nav align-items-center ms-auto">
        <!-- Navbar Search Dropdown-->
        <!-- * * Note: * * Visible only below the lg breakpoint-->
        <li class="nav-item dropdown no-caret me-3 d-lg-none">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="searchDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="search"></i></a>
            <!-- Dropdown - Search-->
            <div class="dropdown-menu dropdown-menu-end p-3 shadow animated--fade-in-up" aria-labelledby="searchDropdown">
                <form class="form-inline me-auto w-100">
                    <div class="input-group input-group-joined input-group-solid">
                        <input class="form-control pe-0" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />
                        <div class="input-group-text"><i data-feather="search"></i></div>
                    </div>
                </form>
            </div>
        </li>

        <?php 
            include_once('controllers/notifications.php');
            $notifications = getNotifications();

            if(isset($notifications)){
                echo '
                    <li class="nav-item dropdown no-caret d-none d-sm-block me-3 dropdown-notifications">
                    <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownAlerts" ';

                    $status = false;
                
                  foreach ($notifications as $key => $value) {
                    if($value['status'] == 'new'){$status = true;};
                  }

                  var_dump($status);

                  if($status){
                    echo 'style="background:red"';
                  }

                echo ' href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                    <svg xmlns="http://www.w3.org/2000/svg" ';

                if($status){
                    echo 'style="color:white"';
                }
                    
                echo'width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg></a>
                    <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownAlerts" data-bs-popper="none">
                        <h6 class="dropdown-header dropdown-notifications-header">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell me-2"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"></path><path d="M13.73 21a2 2 0 0 1-3.46 0"></path></svg>
                            Notifications Center
                        </h6>';


                foreach ($notifications as $key => $value) {
                    echo '<a class="dropdown-item dropdown-notifications-item position-relative" onclick="updateNotificationStatus('.$value['id'].')" >';
                    
                    if($value['status'] != 'read'){
                        echo '<div class="position-absolute" style="right:16px;top:0">
                            <button class="btn btn-sm btn-danger" style="padding:3px;font-size:10px">New</button>
                        </div>';
                    }

                    echo '
                            <div class="dropdown-notifications-item-content">
                            <div class="dropdown-notifications-item-content-details">'.$value['created_at'].'</div>
                            <div class="dropdown-notifications-item-content-text">'.$value['notification'].'</div>
                        </div>
                    </a>
                    ';
                }
   
                echo '
                </div>
                </li>';
            }
        ?>

       

        
        <!-- User Dropdown-->
        <li class="nav-item dropdown no-caret dropdown-user me-3 me-lg-4">
            <a class="btn btn-icon btn-transparent-dark dropdown-toggle" id="navbarDropdownUserImage" href="javascript:void(0);" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="img-fluid" src="
            <?php
                if(isset($_SESSION['image'])){
                    echo '/fyp/assets/profile/'.$_SESSION['image'];
                }else{
                    echo '/fyp/assets/img/illustrations/profiles/profile-1.png';
                }
            ?>" /></a>
            <div class="dropdown-menu dropdown-menu-end border-0 shadow animated--fade-in-up" aria-labelledby="navbarDropdownUserImage">
                <h6 class="dropdown-header d-flex align-items-center">
                    <img class="dropdown-user-img" src="
                    <?php
                        if(isset($_SESSION['image'])){
                            echo '/fyp/assets/profile/'.$_SESSION['image'];
                        }else{
                            echo '/fyp/assets/img/illustrations/profiles/profile-1.png';
                        }
                    ?>" />
                    <div class="dropdown-user-details">
                        <div class="dropdown-user-details-name"><?php echo $_SESSION['name']?></div>
                        <div class="dropdown-user-details-email"><?php echo $_SESSION['email']?></div>
                    </div>
                </h6>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="/fyp/admin-login.php?type=student">
                    <div class="dropdown-item-icon"><i data-feather="log-out"></i></div>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>

<script>
    function updateNotificationStatus(notification_id){
        $.ajax({
            type: "POST",
            url: '/fyp/controllers/notifications.php',
            data: {
                'type' : 'updateNotificationStatus',
                'notification_id' : notification_id,
            },
            success: function(data) { 
                location.reload();
            }
        });
    }
</script>