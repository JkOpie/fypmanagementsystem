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

                        if($_SESSION['roles'] == 'fyp_coordinator'){
                            $students = getStudentSupervisorPending();
                        }
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="d-flex justify-content-end align-items-center mb-3">
                                    <a href="/fyp/register-student.php" class="btn btn-primary me-2">Add Student</a>
                                    <a href="controllers/fypcoordinator/finalizeStudentReport.php" class="btn btn-success">Finalize Supervisors Report</a>
                                </div>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Proposal Tittle</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Semester</th>
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
                                                    $approvebtn = null;
                                                    $rejectbtn = null;
                                                 

                                                    if($value['supervisor_status'] == 'pending'){
                                                        $approvebtn = "<button class='btn btn-success btn-sm me-1 mb-1' onclick='approveSupervisor(".$value['id'].")'>Approve Supervisor</button><br>";
                                                        $rejectbtn = "<button class='btn btn-secondary btn-sm me-1 mb-1' onclick='rejectSupervisor(".$value['id'].")'>Reject Supervisor</button> <br>";
                                                    }
    
                                                    echo '
                                                    <tr>
                                                        <td>'.($key + 1).'</td>
                                                        <td>'.$value['title'].'</td>
                                                        <td>'.$value['name'].'</td>
                                                        <td>'.$value['email'].'</td>
                                                        <td>'.$value['handphone'].'</td>
                                                        <td>'.(isset($value['semester']) ? $value['semester'] : '-' ).'</td>
                                                        <td>'.(isset($value['supervisor_name']) ? $value['supervisor_name'] : '-').'</td>
                                                        <td>'.(isset($value['supervisor_status']) ? $value['supervisor_status'] : '-').'</td>
                                                        <td> '.$approvebtn.$rejectbtn.'</td>
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
                <label for="" class="form-label">Semester</label>
                <input type="hidden" name="student_id" >
                <select name="semester" class="form-control">
                <?php 
                    if(isset($semesters)){
                        foreach ($semesters as $key => $value) { ?>
                        <option value="<?php echo $value['name'] ?>"> <?php echo $value['name']?></option>
                <?php      }
                    }
                ?>
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

        function approveSupervisor(proposal_id){
            
            $.ajax({
                type: "POST",
                url: '/fyp/controllers/users.php',
                data: {
                    'type' : 'updateSupervisorStatus',
                    'proposal_id' : proposal_id,
                    'status' : 'approved',
                }, // serializes the form's elements.
                success: function(data) { 
                    location.reload();
                }
            });
        }

        function rejectSupervisor(proposal_id){
            
            $.ajax({
                type: "POST",
                url: '/fyp/controllers/users.php',
                data: {
                    'type' : 'updateSupervisorStatus',
                    'proposal_id' : proposal_id,
                    'status' : 'rejected',
                }, // serializes the form's elements.
                success: function(data) { 
                    location.reload();
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
