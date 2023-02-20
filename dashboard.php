
<?php
    session_start();
    include('controllers/validateAuthentication.php');
    require_once("controllers/db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include('layout_admin/header.php')?>
    </head>
    <body class="nav-fixed">
        <?php include('layout_admin/navbar.php')?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('layout_admin/sidenav.php')?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-5">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                                        <?php 
                                        if($_SESSION['roles'] != 'hod' &&  $_SESSION['roles'] != 'admin'){?>
                                            Dashboard
                                        <?php }else{?>
                                            Check Title Redundancy 
                                            <?php }
                                        ?>
                                        
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-xl" style="margin-top:-3rem">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card h-100">
                            <div class="card-body h-100 p-2 pt-3">
                                <div class="row align-items-center">
                                    <div class="col-xxl-12">
                                        <div class="text-center text-xl-start text-xxl-center">
                                            <input type="text" class="form-control text-center" 
                                            style="font-size:22px" placeholder="Search Title Redundancy" name="search-proposal" onkeypress="enterKeyPressed(event)">
                                            <div class="text-end">
                                                <i><small class="text-muted">press Enter to search</small></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         <!-- Example Colored Cards for Dashboard Demo-->

         <?php
            $conn = setDbConnection();
            $total_students= null;
            $sql = 'select count(*) as total_students from students';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total_students = $row['total_students'];
                }
            }
            
        ?>

        <?php 
            $total_proposals= null;
            $sql = 'select count(*) as total_proposals from proposals';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total_proposals = $row['total_proposals'];
                }
            }
        ?>

        <?php 
            $total_students_under_supervisor = null;
            $sql = "select count(*) as total_students_under_supervisor
            from proposals 
            left join users on users.id = proposals.user_id 
            left join students on students.user_id = proposals.user_id
            where proposals.supervisor_id = '".$_SESSION['id']."' ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total_students_under_supervisor = $row['total_students_under_supervisor'];
                }
            }
        ?>

        <?php

            $total_student_which_has_been_assigned_with_supervisor = null;

            $sql = "
                select count(distinct(user_id)) as  total_student_which_has_been_assigned_with_supervisor
                from
                proposals 
                where supervisor_id is not null and supervisor_status='approved' and cluster_status='approved'
            ";

            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total_student_which_has_been_assigned_with_supervisor = $row['total_student_which_has_been_assigned_with_supervisor'];
                }
            }
        ?>

        <div class="row">
            <?php 
                if($_SESSION['roles'] != 'admin'){?>

                    <div class="col-md-12 mt-5">
                    <table class="table table-bordered table-striped table-hover">
                       
                        <tbody>
                            <tr>
                                <th>Total Students Registered</th>
                                <td><?php echo $total_students ?></td>
                                <td><a class="btn btn-primary" href="/fyp/student-list.php">Click</a></td>
                            </tr>
                            <tr>
                                <th>Total Proposal Submited</th>
                                <td><?php echo $total_proposals ?></td>
                                <td><a class="btn btn-primary" href="/fyp/proposals.php">Click</a</td>
                            </tr>
                            <?php
                            if($_SESSION['roles'] == 'cluster'){ ?>
                                <tr>
                                    <th>Register Supervisors</th>
                                    <td> </td>
                                    <td><a class="btn btn-primary" href="/fyp/register-supervisor.php">Click</a> </td>
                                </tr>

                                <tr>
                                    <th>Total Student which has been assigned with supervisor</th>
                                    <td><?php echo $total_student_which_has_been_assigned_with_supervisor ?></td>
                                    <td><a class="btn btn-primary" href="/fyp/supervisor_list.php">Click</a> </td>
                                </tr>
                           <?php } ?>
                            
                            <?php
                            if($_SESSION['roles'] == 'supervisor'){ ?>
                                <tr>
                                    <th>Total Student Under Supervisor</th>
                                    <td> <?php echo $total_students_under_supervisor ?> </td>
                                    <td><a class="btn btn-primary" href="/fyp/student_supervisor.php">Click</a> </td>
                                </tr>
                           <?php } ?>

                           <?php
                            if($_SESSION['roles'] == 'fyp_coordinator'){ ?>
                                <tr>
                                    <th>Finalize Supervisor</th>
                                    <td></td>
                                    <td><a class="btn btn-primary" href="/fyp/finalize_supervisor.php">Click</a> </td>
                                </tr>
                                <tr>
                                    <th>Register Student</th>
                                    <td></td>
                                    <td><a class="btn btn-primary" href="/fyp/register-student.php">Click</a> </td>
                                </tr>

                                <tr>
                                    <th>Semester</th>
                                    <td></td>
                                    <td><a class="btn btn-primary" href="/fyp/semester.php">Click</a> </td>
                                </tr>
                           <?php } ?>

                           <?php
                            if($_SESSION['roles'] == 'hod'){ ?>
                              
                                <tr>
                                    <th>Register FYP Coordinator</th>
                                    <td></td>
                                    <td><a class="btn btn-primary" href="/fyp/register-fypcoordinator.php">Click</a> </td>
                                </tr>

                                <tr>
                                    <th>FYP Cooordinator list</th>
                                    <td></td>
                                    <td><a class="btn btn-primary" href="/fyp/fyp-coordinator-list.php">Click</a> </td>
                                </tr>

                                <tr>
                                    <th>Appoint Lead Cluster</th>
                                    <td></td>
                                    <td><a class="btn btn-primary" href="/fyp/appoint-lead-cluster.php">Click</a> </td>
                                </tr>
                           <?php } ?>
                            
                        </tbody>
                    </table>
                    </div>
            <?php   } ?> 
            
        </div>
    </div>
                    

                </main>
                <?php include('layout_admin/footer.php')?>
            </div>
        </div>
        <?php include('layout_admin/btm_scripts.php')?>
        <?php include('controllers/include_error.php')?>
    </body>
    <script>
        function enterKeyPressed(event){
            if (event.keyCode == 13) {
                $.ajax({
                    type: "POST",
                    url: '/fyp/controllers/search-proposal.php',
                    data: {
                        'title' : $('input[name=search-proposal]').val(),
                    }, // serializes the form's elements.
                    success: function(data) { 
                        if(data == 'available'){
                            alert('Title '+$('input[name=search-proposal]').val()+' is available');
                        }else{
                            alert('Title '+$('input[name=search-proposal]').val()+' not available');
                        }
                    }
                });
            }
        }
    </script>

</html>


<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
