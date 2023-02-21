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

                        $sql = "select 
                            staffs.user_id, 
                            users.name 
                        from staffs 
                        left join users on users.id = staffs.user_id
                        where staffs.roles='supervisor'
                        order by staffs.id desc";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $supervisors[] = $row;
                            }
                        }

                        //var_dump( $supervisors);

                        $preferred_supervisors = null;

                        $sql = "select 
                            supervisor_id
                        from student_supervisor_preferrences 
                        where user_id='".$_GET['student_id']."'
                        order by id desc";

                        //var_dump($sql);

                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $preferred_supervisors[] = $row['supervisor_id'];
                            }
                        }

                        // var_dump($preferred_supervisors);
                    ?>

                    <div class="container-xl px-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="mb-3">
                                <form action="/fyp/controllers/cluster/assign_supervisor_student.php" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label class="form-label">Supervisor</label>
                                                <select name="supervisor_id" class="form-select">
                                                    <option >Please Select Supervisor</option>
                                                    <?php 
                                                        if(isset($supervisors)){
                                                            foreach ($supervisors as $key => $value) { ?>
                                                                    <option value="<?php echo $value['user_id']?>">
                                                                        <?php echo $value['name'] ;  
                                                                        if(isset($preferred_supervisors)){
                                                                            if(in_array($value['user_id'], $preferred_supervisors)){ 
                                                                               echo ' (PREFERRED) ';     
                                                                } } ; ?> 
                                                                    </option>
                                                            <?php } } ?>
                                                </select>
                                                <div class="mt-3">
                                                    <input type="hidden" name="student_id" value="<?php echo $_REQUEST['student_id']?>">
                                                    <button class="btn btn-primary" type="submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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
       
       
    </script>
    <?php include('controllers/include_error.php')?>
</html>

<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
