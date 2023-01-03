<nav class="sidenav shadow-right sidenav-light">
    <div class="sidenav-menu">
        <div class="nav accordion" id="accordionSidenav">
            <!-- Sidenav Accordion (Dashboard)-->
            <!-- <div class="mt-3">
                <a class="nav-link" href="/fyp/dashboard.php">
                    <div class="nav-link-icon">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-activity"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"></polyline></svg></div>
                    Dashboards
                </a>
            </div> -->

            <?php

                if($_SESSION['roles'] != 'student'){
                    echo'
                    <div class="mt-4">
                        <a class="nav-link" href="/fyp/dashboard.php">
                            Dashboards
                        </a>
                    </div>
                    <hr>
                    ';
                }else{
                    echo '
                    <div class="mt-4">
                        <a class="nav-link" href="/fyp/student-dashboard.php">
                            Dashboards
                        </a>
                    </div>
                    <hr>
                    ';
                }

                if($_SESSION['roles'] == 'supervisor'){
                    echo '
                    
                        <a class="nav-link" href="/fyp/student_supervisor.php">
                            Students under Supervisor
                        </a>
                        <hr>
                    
                    ';
                }

                echo '
                <a class="nav-link" href="/fyp/profiles.php">
                    Profile
                </a>
                <hr>
                ';

                if($_SESSION['roles'] == 'admin'){
                    echo '

                    <a class="nav-link" href="/fyp/register-hod.php">
                        Register HOD
                    </a>
                    <hr>
                    ';

                    echo '
                        <a class="nav-link" href="/fyp/hod-list.php">
                            HOD List
                        </a>
                    <hr>
                    ';
                }


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
                            Proposal Submissions
                        </a>
                        <hr>
                    ';
                }

                if($_SESSION['roles'] == 'fyp_coordinator'){

                    echo '
                        <a class="nav-link" href="/fyp/register-student.php">
                            Register Student
                        </a>
                        <hr>
                    ';

                    echo '
                        <a class="nav-link" href="/fyp/finalize_supervisor.php">
                            Finalize Supervisors
                        </a>
                        <hr>
                    ';
                }

                if($_SESSION['roles'] == 'hod'){
                    echo '
                        <a class="nav-link" href="/fyp/register-fypcoordinator.php">
                            Register FYP Coordinator
                        </a>

                        <hr>

                        <a class="nav-link" href="/fyp/register-cluster.php">
                            Register Cluster
                        </a>

                        <hr>

                        <a class="nav-link" href="/fyp/fyp-coordinator-list.php">
                           FYP Cooordinator list
                        </a>

                        <hr>

                        <a class="nav-link" href="/fyp/appoint-lead-cluster.php">
                            Appoint Lead Cluster
                        </a>
                    ';
                }

                // if($_SESSION['roles'] == 'hod' || $_SESSION['roles'] == 'fyp_coordinator' ){
                //     echo '
                //         <a class="nav-link" href="/fyp/allocate_supervisor.php">
                //             <div class="nav-link-icon"><i class="fa-solid fa-graduation-cap"></i></div>
                //             Allocate Supervisors
                //         </a>
                //     ';
                // }


                if($_SESSION['roles'] == 'cluster'){
                    echo '
                        <a class="nav-link" href="/fyp/register-supervisor.php">
                            Register Supervisors
                        </a>
                        <hr>

                    ';

                    if($_SESSION['cluster_status'] != 'lead_cluster'){
                        echo '
                        <a class="nav-link" href="/fyp/supervisor_list.php">
                            Assign Student to Supervisor
                        </a>
                        <hr>
                    ';
                    }else{
                        echo '
                        <a class="nav-link" href="/fyp/supervisor_list.php">
                            Supervisor List
                        </a>
                        <hr>
                    ';
                    }
                  
                }
                
                if(isset($_SESSION["cluster_status"])){
                    if($_SESSION["cluster_status"]  == 'lead_cluster' && $_SESSION['roles'] == 'cluster'){
                        echo '
                        <a class="nav-link" href="/fyp/cluster-listing.php">
                             Assign Supervisor to Cluster
                        </a>
                    ';
                    }
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