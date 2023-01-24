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

                        $supervisors = null;
                        
                        $query = "select users.* , staffs.id as cluster_id,  staffs.roles as staff_role ,staffs.staff_id, staffs.department, staffs.cluster_status, staffs.user_id from users 
                        left join staffs on staffs.user_id = users.id
                        where staffs.roles = 'supervisor' and cluster_id ='".$_SESSION['id']."'  order by users.id desc";

                        $result = $conn->query($query);

                        //var_dump($_SESSION);
                
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
                                    <a href="/fyp/register-supervisor.php" class="btn btn-primary me-2">Add Supervisor</a>
                                    <a href="controllers/cluster/assignSupervisorToStudentReport.php" class="btn btn-success">Assign Supervisor to Student Report</a>
                                </div>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Staff ID</th>
                                            <th>Department</th>
                                            <th>Student</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if( $supervisors != NULL){
                                                foreach ($supervisors as $key => $value) {
                                                    $students = [];

                                                    if(isset($value['user_id'])){
                                                        $sql = "select students.*, users.name from students left join users on users.id = students.user_id where students.supervisor_id='".$value['user_id']."'"; 
                                                        $result = $conn->query($sql);
    
                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $students[] = $row['name'];
                                                            }
                                                        }
                                                    }

                                                    $image = null; 

                                                    //var_dump($students);

                                                    if(isset($value['image'])){
                                                        $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['image'].'">';
                                                    }else{
                                                        $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                                    }

                                                    
                                                    echo '
                                                    <tr>
                                                        <td>'.($key + 1).'</td>
                                                        <td>'.$value['name'].'</td>
                                                        <td>'.$value['staff_role'].'</td>
                                                        <td>'.$value['email'].'</td>
                                                        <td>'.$value['handphone'].'</td>
                                                        <td>'.$value['staff_id'].'</td>
                                                        <td>'.$value['department'].'</td>
                                                        <td>'.(isset($students) ? implode(',<br>', $students) : '-').'</td>
                                                        <td class="">
                                                            <a class="btn btn-primary btn-sm mb-1" href="assign_supervisor_student.php?supervisor_id='.$value['user_id'].'">Assign Student</a>
                                                            <a href="edit-supervisor.php?supervisor_id='.$value['id'].'" class="btn btn-sm btn-secondary mb-1">Edit</a>
                                                            <a href="controllers/delete-supervisor.php?supervisor_id='.$value['id'].'" class="btn btn-sm btn-danger mb-1">Delete</a>
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
