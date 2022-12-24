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
                                            Student
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->

                    <?php 
                        include('controllers/users.php');

                        if($_SESSION['roles'] == 'cluster'){
                            $students = getAllStudent();
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
                                            <th>Supervisor</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if( $students != NULL){
                                                foreach ($students as $key => $value) {

                                                    $image = null; 
                                                    $checked = 'checked';
                                                    $assignBtn = null;
                                                 
                                                    if(isset($value['image'])){
                                                        $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['image'].'">';
                                                    }else{
                                                        $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                                    }
                                                  
                                                    if(!$value['supervisor_name'] || $value['status'] == 'rejected'){
                                                        $assignBtn = "<button class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#exampleModal' onclick=assignSupervisor(".$value['student_id'].")>Assign Supervisor</button>";
                                                    }
    
                                                    echo '
                                                    <tr>
                                                        <td>'.$image.'</td>
                                                        <td>'.$value['name'].'</td>
                                                        <td>'.$value['roles'].'</td>
                                                        <td>'.$value['email'].'</td>
                                                        <td>'.$value['handphone'].'</td>
                                                        <td>'.$value['supervisor_name'].'</td>
                                                        <td>'.$value['status'].'</td>
                                                        <td>'.$assignBtn.'</td>
                                                    </tr>';
                                                }
                                            }else{
                                                // /var_dump($_SESSION['roles']);
                                                if($_SESSION['roles'] == 'cluster'){
                                                    echo '<tr><td colspan=8>No Student Available</td></tr>';
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

    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Assign Supervisor</h5>
                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                <div class="row gx-3">
                    <div class="col-12">
                        <form action="controllers/users.php" method="post" id="assignSupervisor">
                            <?php 
                                $supervisors = getSupervisorCluster();
                                //var_dump($supervisors);
                                if(isset($supervisors)){
                                    $options = '<option value="">Please Select Supersivor</option>';
                                    foreach ($supervisors as $key => $value) {
                                        $options =  $options.'<option value='.$value['id'].'>'.$value['name'].'</option>';
                                    }
                                    echo '<select name=supervisor_id class=form-select>'.$options.'</select>';
                                }else{
                                    echo 'No Supervisor, Please Create Supervisor!';
                                }
                            ?>
                             <input type="hidden" name="student_id">
                            <input type="hidden" name="type" value="assignSupervisor">
                            <div class="text-end mt-3">
                                <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-primary" type="submit">Save changes</button>
                            </div>
                          
                        </form>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        function assignSupervisor(student_id){
            console.log(student_id);
            $('form#assignSupervisor input[name=student_id]').val(student_id);
        }
    </script>
    <?php include('controllers/include_error.php')?>
</html>

<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
