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
                                            Cluster
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->

                    <?php 
                        $conn = setDbConnection();
                        $clusters = null;
                        $query = "select * from staffs left join users on users.id = staffs.user_id 
                        where staffs.roles = 'cluster' and cluster_status = 'cluster' order by users.id desc";
                        $result = $conn->query($query);
                
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $clusters[] = $row;
                            }
                        }
                        
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <!-- <input type="text" class="form-control w-25 me-3" placeholder="Search">
                                    <button class="btn btn-primary">Search</button> -->
                                </div>
                                <table class="table table-bordered table-striped table-hover table-responsive">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Staff ID</th>
                                            <th>Department</th>
                                            <th>Supervisor</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if( $clusters != NULL){
                                                foreach ($clusters as $key => $value) {

                                                    $supervisors = [];

                                                    //var_dump($value['user_id']);
                                                
                                                    if(isset($value['user_id'])){
                                                        $sql = "select staffs.*, users.name from staffs left join users on users.id = staffs.user_id where staffs.cluster_id='".$value['user_id']."'"; 
                                                        $result = $conn->query($sql);

                                                        //var_dump($result);

                                                        if ($result->num_rows > 0) {
                                                            while ($row = $result->fetch_assoc()) {
                                                                $supervisors[] = $row['name'];
                                                            }
                                                        }
                                                    }

                                                    //var_dump($supervisors);

                                                    $image = null; 
                                                    $checked = null;
                                                    $assignSupervisor = null;
                                                 
                                                    if(isset($value['image'])){
                                                        $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['images'].'">';
                                                    }else{
                                                        $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                                    }
                                                    
                                                    echo '
                                                    <tr>
                                                        <td>'.$image.'</td>
                                                        <td>'.$value['name'].'</td>
                                                        <td>'.$value['cluster_status'].'</td>
                                                        <td>'.$value['email'].'</td>
                                                        <td>'.$value['handphone'].'</td>
                                                        <td>'.$value['staff_id'].'</td>
                                                        <td>'.$value['department'].'</td>
                                                        <td>'.(isset($supervisors) ? implode(',<br>', $supervisors) : '-').'</td>
                                                        <td class="">
                                                            <a class="btn btn-primary btn-sm me-2" href=/fyp/add_assign_supervisor.php?cluster_id='.$value['id'].'>Assign Supervisor</a>
                                                           
                                                        </td>
                                                    </tr>';
                                                }
                                            }else{
                                                echo '<tr><td colspan=8>No Cluster Created</td></tr>';
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
        function allocateSupervisor(element){
            var type = '';
            if($(element).attr('data-type') == 'cluster'){
                type  = 'updateStatus';
            }else if($(element).attr('data-type') == 'hod'){
                type  = 'updateFypStatus';
            }else if($(element).attr('data-type') == 'fyp_coordinator'){
                type  = 'updateClusterStatus';
            }
            
            $.ajax({
                type: "POST",
                url: '/fyp/controllers/users.php',
                data: {
                    'type' : type,
                    'user_id' : $(element).attr('data-user-id'),
                    'allocated' : $(element).is(':checked'),
                }, // serializes the form's elements.
                success: function(data) { 
                
                }
            });
        }
    </script>
    <?php include('controllers/include_error.php')?>
</html>

<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
