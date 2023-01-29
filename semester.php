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
                                            Semesters
                                        </h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->

                    <?php 
                       $conn = setDbConnection();
                       $sql = "select * from semesters";
                       $result = $conn->query($sql);
                       $semesters = [];

                       if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $semesters[] = $row;
                        }
                    }
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <a href="/fyp/register-semester.php" class="btn btn-primary me-2">Add Semester</a>
                                </div>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th style="width: 80%;">Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            if(isset($semesters)){
                                                foreach ($semesters as $key => $value) { ?>
                                                    <tr>
                                                        <td><?php echo $value['name']?></td>
                                                        <td><a class="btn btn-sm btn-primary" href="/fyp/edit-semester.php?id=<?php echo $value['id']?>">Edit</a> 
                                                        <a class="btn btn-sm btn-danger" href="/fyp/controllers/fypcoordinator/delete-semester.php?id=<?php echo $value['id']?>">Delete</a></td>
                                                    </tr>
                                        <?php   }
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

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Update Semester</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
           <form action="controllers/fypcoordinator/updateStudentSemester.php" method="post" id="updateSemester">
            <div class="from-group">
                <label for="" class="form-label">Semester</label>
                <input type="hidden" name="student_id" >
                <select name="semester" class="form-control">
                    <option value="12234">12234</option>
                    <option value="22234">22234</option>
                    <option value="32234">32234</option>
                </select>
            </div>
            <div class="mt-3 text-end">
                <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
           </form>
        </div>
       
        </div>
    </div>
</div>
    
    <script>

        function updateSemester(student_id){
            $('#updateSemester input[name=student_id]').val(student_id);
        }

        function approveSupervisor(student_id){
            
            $.ajax({
                type: "POST",
                url: '/fyp/controllers/users.php',
                data: {
                    'type' : 'updateSupervisorStatus',
                    'student_id' : student_id,
                    'status' : 'approved',
                }, // serializes the form's elements.
                success: function(data) { 
                    window.location.reload();
                }
            });
        }

        function rejectSupervisor(student_id){
            
            $.ajax({
                type: "POST",
                url: '/fyp/controllers/users.php',
                data: {
                    'type' : 'updateSupervisorStatus',
                    'student_id' : student_id,
                    'status' : null,
                }, // serializes the form's elements.
                success: function(data) { 
                    window.location.reload();
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
