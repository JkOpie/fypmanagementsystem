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
                        $students = null;

                        $sql = "select students.*, users.name from students left join users on users.id = students.user_id where supervisor_id is null and programmes='".$_SESSION['department']."'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $students[] = $row;
                            }
                        }

                        //var_dump($students);

                        // $sql = 'select staffs.*, users.name from staffs left join users on users.id = staffs.user_id 
                        // where staffs.roles="supervisor" and cluster_id is null and department="'.$cluster[0]['department'].'"';
                        // $result = $conn->query($sql);

                        // if ($result->num_rows > 0) {
                        //     while ($row = $result->fetch_assoc()) {
                        //         $supervisors[] = $row;
                        //     }
                        // }
                        //var_dump($supervisors);
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                <form action="controllers/assign_supervisor_student.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Student</label>
                                                <select name="student_id" class="form-select">
                                                    <option >Please Select Student</option>
                                                    <?php 
                                                        if(isset($students)){
                                                            foreach ($students as $key => $value) {
                                                                //var_dump($value); ?>
                                                            <option value="<?php echo $value['id']?>"><?php echo $value['name']?></option>

                                                <?php } } ?>
                                                </select>
                                                <div class="mt-3">
                                                    <input type="hidden" name="supervisor_id" value="<?php echo $_REQUEST['supervisor_id']?>">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php 
                        $students = null;
                        $sql = "select students.*, users.name, users.image, users.handphone, users.email, users.roles from students left join users on users.id = students.user_id where students.supervisor_id='{$_REQUEST['supervisor_id']}'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $students[] = $row;
                            }
                        }
                        //var_dump($students);

                        if($students != null){ ?>
                            <div class="container-xl px-4">
                                <div class="card mb-4">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <label class="mb-1">Students</label>

                                            <table class="table table-bordered table-striped table-hover">
                                                <thead>
                                                    <tr>
                                                        <th>Image</th>
                                                        <th>Name</th>
                                                        <th>Position</th>
                                                        <th>Email</th>
                                                        <th>Phone Number</th>
                                                        <th>Matric Number</th>
                                                        <th>Programmes</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                    
                                                        foreach ($students as $key => $value) {
                                                            $image = null;

                                                            if(isset($value['image'])){
                                                                $image = '<img class="user-img" src="/fyp/assets/profile/'.$value['image'].'">';
                                                            }else{
                                                                $image = '<img class="user-img" src="/fyp/assets/img/illustrations/profiles/profile-1.png">'; 
                                                            }


                                                            echo '
                                                                <tr>
                                                                    <td>'.$image.'</td>
                                                                    <td>'.$value['name'].'</td>
                                                                    <td>'.$value['roles'].'</td>
                                                                    <td>'.$value['email'].'</td>
                                                                    <td>'.$value['handphone'].'</td>
                                                                    <td>'.$value['matric_number'].'</td>
                                                                    <td>'.$value['programmes'].'</td>
                                                                    <td class="">
                                                                        <a class="btn btn-sm btn-danger" href="controllers/cluster/deleteStudent.php?student_id='.$value['id'].'&supervisor_id='.$_REQUEST['supervisor_id'].'">Delete</a>
                                                                    </td>
                                                                </tr>
                                                            ';
                                                            
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                      


                
                    
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
