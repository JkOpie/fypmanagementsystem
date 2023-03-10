
<?php
    session_start();
    // include('controllers/validateAuthentication.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include('layout_admin/header.php')?>
    </head>
    <body class="nav-fixed">
        <?php include('layout_admin/navbar-login.php')?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('layout_admin/sidenav-login.php')?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-5">
                        <div class="container-xl px-4">
                            <div class="page-header-content pt-4">
                                <div class="row align-items-center justify-content-between">
                                    <div class="col-auto mt-4">
                                        <h1 class="page-header-title">
                                            <div class="page-header-icon"><i data-feather="activity"></i></div>
                                            Welcome to Final Year Title Management System!
                                        </h1>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4" style='margin-top:-6rem'>
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center">
                                        <?php 
                                            if($_REQUEST['type']){
                                                echo ('<h3 class="fw-light my-4">'.ucwords(str_replace("_", " ", $_REQUEST['type'])).' Forgot Password</h3>');
                                            }
                                        ?>
                                     </div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form action="controllers/forgot_password.php" method="post">
                                            <!-- Form Group (email address)-->
                                            <div class=" row mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1">Email</label>
                                                    <input class="form-control" type="email" name="email" placeholder="Enter email address" required />
                                                </div>

                                                <?php

                                                if($_REQUEST['type'] != 'student'){
                                                    echo '
                                                    <div class="col-md-6">
                                                        <label class="small mb-1">Staff ID</label>
                                                        <input class="form-control" type="text" name="staff_id" placeholder="Enter staff id" required />
                                                    </div>
                                                    ';
                                                }else{
                                                    echo '
                                                    <div class="col-md-6">
                                                        <label class="small mb-1">Matric Number</label>
                                                        <input class="form-control" type="text" name="matric_number" placeholder="Enter matric number" required />
                                                    </div>
                                                    ';
                                                }
                                                ?>
                                                    </div>
                                            <!-- Form Group (password)-->
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPassword">New Password</label>
                                                    <input class="form-control" type="password" name="password" placeholder="Enter password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).+$" title="Please Include at least one digit, one uppercase letter, one lowercase letter, and one symbol"/>
                                                    <input type="hidden" value="<?php echo $_REQUEST['type']?>" name="type">
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="small mb-1" for="inputPassword">Confirm Password</label>
                                                    <input class="form-control" type="password" name="confirm_password" placeholder="Enter password" required pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).+$" title="Please Include at least one digit, one uppercase letter, one lowercase letter, and one symbol"/>
                                                    <input type="hidden" value="<?php echo $_REQUEST['type']?>" name="type">
                                                </div>
                                            </div>
                                            
                                            <?php 
                                                if(isset($_SESSION["forgot_error"])){
                                                    echo '<div class="mb-3 text-center"><label class="text-danger small mb-1">'.$_SESSION['forgot_error'].'</label></div>';
                                                }
                                            ?>
                                            <!-- Form Group (login box)-->
                                            <div class="mt-4 mb-0">
                                                <button class="btn btn-primary w-100" type="submit">Submit</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="/fyp/admin-register.php">Need an account? Sign up!</a></div>
                                    </div>
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
</html>


<?php
    unset($_SESSION['forgot_error']);
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
