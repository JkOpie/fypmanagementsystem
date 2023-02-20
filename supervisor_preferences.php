<?php
session_start();
include('controllers/validateAuthentication.php');
require_once("controllers/db_connection.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include('layout_admin/header.php')?>
       <style>
        .user-img{
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }
       </style>
    </head>
    <body class="nav-fixed">
        <?php include('layout_admin/navbar.php')?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('layout_admin/sidenav.php')?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-compact page-header-light border-bottom bg-white mb-4">
                        <div class="container-xl px-4">
                            <div class="page-header-content">
                                <div class="row align-items-center justify-content-between pt-3">
                                    <div class="col-auto mb-3">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="file"></i></div>
                                            Supervisor Preferences
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->

                    <?php 
                        $conn = setDbConnection();
                
                        $supervisors = null;
                    
                        $query = '
                        select 
                            student_supervisor_preferrences.id,
                            users.name,
                            users.email,
                            users.handphone,
                            staffs.department
                        from student_supervisor_preferrences 
                        left join users on users.id = student_supervisor_preferrences.supervisor_id
                        left join staffs on staffs.user_id = student_supervisor_preferrences.supervisor_id
                        where student_supervisor_preferrences.user_id = '.$_SESSION['id'];


                        $result = $conn->query($query);

                
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $supervisors[] = $row;
                            }
                        }
                        
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <a href="/fyp/add-supervisor_preferences.php" class="btn btn-primary me-2">Add Supervisor Preferences</a>
                                </div>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if( $supervisors != NULL){
                                                foreach ($supervisors as $key => $value) {
                                                    $approvedBtn = '';
                                                    $rejectBtn = '';
                                                echo '
                                                    <tr>
                                                        <td>'.($key + 1).'</td>
                                                        <td>'.$value['name'].'</td>
                                                        <td>'.$value['email'].'</td>
                                                        <td>'.$value['handphone'].'</td>
                                                        <td>'.$value['department'].'</td>
                                                        <td class="">
                                                            <a href="/fyp/controllers/student/delete-supervisor-preferrences.php?student_supervisor_preferrences_id='.$value['id'].'" class="btn btn-danger btn-sm">Delete</a>
                                                        </td>
                                                    </tr>';
                                                }
                                            }else{
                                                echo '<tr><td colspan=9>No Supervisor Preferences</td></tr>';
                                            }
                                          
                                            
                                        ?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                </main>
                <?php include('layout_admin/footer.php')?>
            </div>
        </div>
        <?php include('layout_admin/btm_scripts.php')?>
       
    </body>
    
    <script>
     
    </script>
    <?php include('controllers/include_error.php')?>
</html>

<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
