<?php
session_start();
include('controllers/validateAuthentication.php');
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
                        include_once('controllers/users.php');

                        if($_SESSION['roles'] == 'hod'){
                            $supervisor = getUserSupervisor();
                        }

                        // if($_SESSION['roles'] == 'cluster'){
                        //     $supervisor = getSupervisorCluster();
                        // }

                        if($_SESSION['roles'] == 'fyp_coordinator'){
                            $supervisor = getSupervisorCluster();
                        }
                        
                
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <!-- <input type="text" class="form-control w-25 me-3" placeholder="Search">
                                    <button class="btn btn-primary">Search</button> -->
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
                                            <th>Staff Department</th>
                                            <th>Allocated</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if( $supervisor != NULL){
                                                foreach ($supervisor as $key => $value) {

                                                    $image = null; 
                                                    $checked = null;
                                                 
                                                    if(isset($value['image'])){
                                                        $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['images'].'">';
                                                    }else{
                                                        $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                                    }
    
                                                    if($_SESSION['roles'] == 'hod'){
                                                        if(isset($value['fypcoordinator_status'])){
                                                            if($value['fypcoordinator_status'] == 'allocated'){
                                                                $checked = 'checked';
                                                            }
                                                        }
                                                    }

                                                    if($_SESSION['roles'] == 'fyp_coordinator'){
                                                        if(isset($value['cluster_status'])){
                                                            if($value['cluster_status'] == 'allocated'){
                                                                $checked = 'checked';
                                                            }
                                                        }
                                                    }
        
                                                    if($_SESSION['roles'] == 'cluster'){
                                                        if(isset($value['status'])){
                                                            if($value['status'] == 'allocated'){
                                                                $checked = 'checked';
                                                            }
                                                        }
                                                    }
    
                                                    echo '
                                                    <tr>
                                                        <td>'.$image.'</td>
                                                        <td>'.$value['name'].'</td>
                                                        <td>'.$value['staff_role'].'</td>
                                                        <td>'.$value['email'].'</td>
                                                        <td>'.$value['handphone'].'</td>
                                                        <td>'.$value['staff_id'].'</td>
                                                        <td>'.$value['staff_department'].'</td>
                                                        <td class="text-center">
                                                            <div class="form-check d-flex justify-content-center">
                                                                <input class="form-check-input" type="checkbox" data-user-id='.$value['id'].' data-type='.$_SESSION['roles'].' '.$checked.' onchange="allocateSupervisor(this)">
                                                            </div>
                                                        </td>
                                                    </tr>';
                                                }
                                            }else{
                                                // /var_dump($_SESSION['roles']);
                                                if($_SESSION['roles'] == 'cluster'){
                                                    echo '<tr><td colspan=8>No Supervisor Available, Please Contact HOD</td></tr>';
                                                }

                                                if($_SESSION['roles'] == 'fyp_coordinator'){
                                                    echo '<tr><td colspan=8>No Supervisor Available, Please Contact Cluster</td></tr>';
                                                }
                                              
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
