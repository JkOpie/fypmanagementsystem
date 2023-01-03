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
                        $query = "select users.* , staffs.id as cluster_id, staffs.staff_id, staffs.department, staffs.cluster_status from users 
                        left join staffs on staffs.user_id = users.id
                        where staffs.roles = 'cluster' order by users.id desc";
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
                                    <a href="/fyp/register-cluster.php" class="btn btn-primary">Add Cluster</a>
                                </div>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Position</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Staff ID</th>
                                            <th>Department</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if( $clusters != NULL){
                                                foreach ($clusters as $key => $value) {

                                                    $image = null; 
                                                    $checked = null;
                                                    $appointLeadBtn = null;
                                                 
                                                    if(isset($value['image'])){
                                                        $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['images'].'">';
                                                    }else{
                                                        $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                                    }

                                                    if($value['cluster_status'] != 'lead_cluster'){
                                                        $appointLeadBtn  = '<button class="btn btn-primary btn-sm" type=submit name=apoint-lead-cluster>Appoint Lead CLuster</button>';
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
                                                        <td class="">
                                                            <form action="/fyp/controllers/appoint-lead-cluster.php" method="post">
                                                                <input type=hidden value='.$value['cluster_id'].' name=cluster_id>
                                                                <div class="">
                                                                    '.$appointLeadBtn.'
                                                                    <a class="btn btn-danger btn-sm" href="controllers/hod/delete-cluster.php?cluster_id='.$value['id'].'">Delete</a>
                                                                </div>
                                                            </form
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
