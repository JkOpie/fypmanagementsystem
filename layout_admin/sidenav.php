<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Accordion (Dashboard)-->
            <div class="mt-3">
                <a class="nav-link" href="/fyp/dashboard.php">
                    <div class="nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                    Dashboards
                </a>
            </div>

            <a class="nav-link" href="/fyp/profiles.php">
                <div class="nav-link-icon"><i class="fa-solid fa-user"></i></div>
                Profile
            </a>
            

            <?php


                include_once('controllers/proposal.php');
                $validateProposals= index();

                $haveProposalsSideNav = false;
                if(isset($validateProposals)){
                    foreach ($validateProposals as $key => $value) {
                       
                        if($_SESSION['id'] == $value['student_id']){
                            $haveProposalsSideNav = true;
                        };
                    }
                }

                if($_SESSION['roles'] == 'student' && !$haveProposalsSideNav ){
                    echo '
                        <a class="nav-link" href="/fyp/add-proposal.php">
                            <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            Proposal Submissions
                        </a>
                    ';
                }
            ?>

            <?php
                if($_SESSION['roles'] == 'hod' || $_SESSION['roles'] == 'fyp_coordinator' ){
                    echo '
                        <a class="nav-link" href="/fyp/allocate_supervisor.php">
                            <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            Allocate Supervisors
                        </a>
                    ';
                }
            ?>

            <?php
                if($_SESSION['roles'] == 'cluster'){
                    echo '
                        <a class="nav-link" href="/fyp/add_supervisor.php">
                            <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            Register Supervisors
                        </a>
                    ';
                }
            ?>

            
            <?php
                if($_SESSION['roles'] == 'cluster'){
                    echo '
                        <a class="nav-link" href="/fyp/assign_supervisor.php">
                            <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            Assign Supervisors
                        </a>
                    ';
                }
            ?>

            <?php
                if($_SESSION['roles'] == 'fyp_coordinator'){
                    echo '
                        <a class="nav-link" href="/fyp/finalize_supervisor.php">
                            <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                            Finalize Supervisors
                        </a>
                    ';
                }
            ?>
          
        
        </div>
    </div>
    <!-- Sidenav Footer-->
    <div class="sidenav-footer">
        <div class="sidenav-footer-content">
            <div class="sidenav-footer-subtitle">Logged in as:</div>
            <div class="sidenav-footer-title"><?php echo $_SESSION['name'] ?></div>
        </div>
    </div>
</nav>