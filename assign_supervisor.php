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
                        $cluster = null;
                        $supervisors = null;
                        //var_dump($_REQUEST['cluster_id']);
                        $query = "select staffs.*, users.name from staffs 
                        left join users on users.id = staffs.user_id 
                        where staffs.user_id =".$_REQUEST['cluster_id'];

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $cluster[] = $row;
                            }
                        }

                        $query = "select staffs.*, users.name from staffs left join users on users.id = staffs.user_id where staffs.cluster_id ='".$cluster[0]['user_id']."'";
                        //var_dump($query);
                        $result = $conn->query($query);
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
                                    <label class="form-label">Cluster</label>
                                    <input type="text" class="form-control" value="<?php echo $cluster[0]['name'] ?>">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label class="form-label">Supervisor</label>
                                        </div>
                                        <div class="col-md-6 text-end">
                                            <a class="btn btn-primary btn-sm mb-2" href="/fyp/add_assign_supervisor.php?cluster_id=<?php echo $_REQUEST['cluster_id'];?>">Add</a>
                                        </div>
                                    </div>
                                    
                                    <ul class="list-group">
                                        <?php 
                                        if(isset($supervisors)){ 
                                            foreach ($supervisors as $key => $value) {?>
                                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                                    <?php echo $value['name']?>
                                                <button class="btn btn-sm btn-danger delete-supervisor" onclick="deleteSupervisor(<?php echo $value['id']?>)">Delete</button>
                                            </li>
                                            
                                       <?php } } ?>
                                       
                                    </ul>
                                  
                                    
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
