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
                                            Supervisor
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->

                    <?php 
                        $conn = setDbConnection();
                        //var_dump($_SESSION['id']);

                        $students = null;
                        
                        // $query = "select 
                        //     users.* , staffs.id as cluster_id,  
                        //     staffs.roles as staff_role ,
                        //     staffs.staff_id, 
                        //     staffs.department, 
                        //     staffs.cluster_status, 
                        //     staffs.user_id 
                        // from users 
                        // left join staffs on staffs.user_id = users.id
                        // where staffs.roles = 'supervisor' and cluster_id ='".$_SESSION['id']."'  order by users.id desc";

                        $query = "
                        select 
                            users.name,
                            users.handphone,
                            users.email,
                            students.matric_number,
                            students.semester,
                            students.programmes,
                            students.supervisor_id,
                            students.user_id,
                            supervisor.name as supervisor_name
                        from students 
                        left join users on users.id = students.user_id
                        left join users as supervisor on supervisor.id = students.supervisor_id
                        order by students.id desc";

                        $result = $conn->query($query);
                
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $students[] = $row;
                            }
                        }
                        
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <a href="/fyp/register-supervisor.php" class="btn btn-primary me-2">Add Supervisor</a>
                                    <a href="controllers/cluster/assignSupervisorToStudentReport.php" class="btn btn-success">Assign Student to Supervisor Report</a>
                                </div>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Matric Number</th>
                                            <th>Semester</th>
                                            <th>Programmes</th>
                                            <th>Supervisor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if( $students != NULL){
                                                foreach ($students as $key => $value) {
                                                    $approvedBtn = '';
                                                    $rejectBtn = '';
                                                   
                                                    $approvedBtn = '<a class="btn btn-primary btn-sm mb-1" href="/fyp/assign_supervisor_student.php?student_id='.$value['user_id'].'">Assign Supervisor</a>';

                                                    echo '
                                                    <tr>
                                                        <td>'.($key + 1).'</td>
                                                        <td>'.($value['name'] ?? '-').'</td>
                                                        <td>'.($value['email'] ?? '-').'</td>
                                                        <td>'.($value['handphone'] ?? '-').'</td>
                                                        <td>'.($value['matric_number'] ?? '-').'</td>
                                                        <td>'.($value['semester'] ?? '-').'</td>
                                                        <td>'.($value['programmes'] ?? '-').'</td>
                                                        <td>'.($value['supervisor_name'] ?? '-').'</td>
                                                        <td class="">
                                                            '.$approvedBtn.$rejectBtn.'
                                                        </td>
                                                    </tr>';
                                                }
                                            }else{
                                                echo '<tr><td colspan=9>No Supervisor Assign to this cluster</td></tr>';
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
