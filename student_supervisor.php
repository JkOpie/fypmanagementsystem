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
                                                Students
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->

                    <?php 
                        $conn = setDbConnection();
                        $students = null;
                        $supervisor = null;
                        
                        //var_dump($_SESSION['id']);
                        $query = "select students.*, users.name, users.email, users.handphone 
                        from students 
                        left join users on users.id = students.user_id 
                        where students.supervisor_id = '".$_SESSION['id']."'";

                        $result = $conn->query($query);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                //var_dump($row);
                                $students[] = $row;
                            }
                        }

                        //var_dump($students);

                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-md-12 text-end">
                                            <a class="btn btn-success mb-3" href="controllers/supervisor/studentUnderSupervisorReport.php">Student under Supervisor Report</a>
                                        </div>
                                    </div>
                                    
                                    <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Name</th>
                                            <th>Matric Number</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Programmes</th>
                                            <!-- <th>Action</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $index = 0;
                                        if(isset($students)){
                                            foreach ($students as $key => $value) { 

                                            $image = null; 

                                            //var_dump($students);

                                            if(isset($value['image'])){
                                                $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['image'].'">';
                                            }else{
                                                $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                            }
                                            ?>

                                            <tr>
                                                <td>  <?php echo ($index + 1) ?></td>
                                                <td>  <?php echo $value['name']?> </td>
                                                <td>  <?php echo $value['matric_number']?> </td>
                                                <td>  <?php echo $value['email']?> </td>
                                                <td>  <?php echo $value['handphone']?> </td>
                                                <td>  <?php echo $value['programmes']?> </td>
                                              
                                                <!-- <td>
                                                    <div class="d-flex">
                                                        <?php 
                                                            if($value['status'] != 'approve'){ ?>
                                                                <a class="btn btn-sm btn-primary me-2" href="controllers/updateStudentSupervisorStatus.php?student_id=<?php echo $value['id'];?>&status=approve">Approve</a>
                                                                <a class="btn btn-sm btn-danger" href="controllers/updateStudentSupervisorStatus.php?student_id=<?php echo $value['id'];?>&status=reject">Reject</a>
                                                        <?php 
                                                            }else{ ?>
                                                                    <a class="btn btn-sm btn-danger me-2" href="controllers/updateStudentSupervisorStatus.php?student_id=<?php echo $value['id'];?>&status=delete">Delete</a>
                                                            <?php }
                                                        ?>
                                                    
                                                    </div>
                                                </td> -->
                                                <!-- <td>
                                                    <a href="controllers/supervisor/deleteStudent.php?student_id=<?php echo $value['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                                                </td> -->
                                            </tr>
                                        <?php  $index++; }
                                        }?>

                                    
                                            
                                        </tbody>

                                    </table>
                                        

                                    
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
