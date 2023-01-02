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
                                            Assign Supervisor
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
                        $cluster = null;

                        $sql = "select * from staffs where user_id=".$_REQUEST['cluster_id'];
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $cluster[] = $row;
                            }
                        }

                        //var_dump($cluster[0]['department']);

                        $sql = 'select staffs.*, users.name from staffs left join users on users.id = staffs.user_id 
                        where staffs.roles="supervisor" and cluster_id is null and department="'.$cluster[0]['department'].'"';
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $supervisors[] = $row;
                            }
                        }
                        //var_dump($supervisors);
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <form action="controllers/cluster/add_assign_supervisor.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Supervisor</label>
                                                <select name="staff_id" class="form-select">
                                                    <option >Please Select Supervisor</option>
                                                    <?php 
                                                        if(isset($supervisors)){
                                                            foreach ($supervisors as $key => $value) {
                                                                //var_dump($value); ?>
                                                            <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>

                                                <?php } } ?>
                                                </select>
                                                <div class="mt-3">
                                                    <input type="hidden" name="cluster_id" value="<?php echo $_REQUEST['cluster_id'] ?>">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <?php 
                                        $sql = "select staffs.*,staffs.roles as supervisor_role , users.name,  users.email, users.handphone, users.image from staffs  left join users on users.id = staffs.user_id where cluster_id='".$_REQUEST['cluster_id']."'";
                                        $result = $conn->query($sql);
                                        $supervisors = null;

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $supervisors[] = $row;
                                            }
                                        }
                                        
                                        if($supervisors != null){
                                        
                                        ?>

                                    <label class="mb-1">Supervisor</label>
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
                                           
                                                foreach ($supervisors as $key => $value) {
                                                    $image = null;

                                                    if(isset($value['image'])){
                                                        $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['image'].'">';
                                                    }else{
                                                        $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                                    }

                                                    echo 
                                                    '
                                                        <tr>
                                                            <td>'.$image.'</td>
                                                            <td>'.$value['name'].'</td>
                                                            <td>'.$value['supervisor_role'].'</td>
                                                            <td>'.$value['email'].'</td>
                                                            <td>'.$value['handphone'].'</td>
                                                            <td>'.$value['staff_id'].'</td>
                                                            <td>'.$value['department'].'</td>
                                                            <td><a class="btn btn-danger btn-sm" href="controllers/cluster/delete_assign_supervisor.php?cluster_id='.$_REQUEST['cluster_id'].'&supervisor_id='.$value['id'].'">Delete</a></td>
                                                        </tr>
                                                    ';
                                                }
                                              

                                           
                                        ?>
                                    </tbody>
                                    </table>
                                        <?php 
                                         }
                                    ?>
                                </div>
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
        function deleteSupervisor(staff_id){
            if(confirm('Are you sure to delete this supervisor ?')){
                $.ajax({
                    type: "POST",
                    url: '/fyp/controllers/remove-assign-supervisor.php',
                    data: {
                        'staff_id' : staff_id,
                        'cluster_id' : <?php echo $_REQUEST['cluster_id'] ?>,
                    }, // serializes the form's elements.
                    success: function(data) { 
                        location.reload();
                    }
                });
             
            }
        }
       
    </script>
    <?php include('controllers/include_error.php')?>
</html>

<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
