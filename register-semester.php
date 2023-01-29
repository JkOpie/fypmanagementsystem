
<?php
    session_start();
    include('controllers/validateAuthentication.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include('layout_admin/header.php')?>
    </head>
    <body class="nav-fixed">
        <?php include('layout_admin/navbar.php')?>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <?php include('layout_admin/sidenav.php')?>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <header class="page-header page-header-dark bg-gradient-primary-to-secondary" style="height: 100px;">
                       
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4" style='margin-top:-5rem'>
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12">
                             <!-- Basic registration form-->
                             <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form action="controllers/fypcoordinator/register-semester.php" method="post">
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" >Semester</label>
                                                        <input type="text" name="name"  placeholder="Enter Semester" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="text-end mt-2">
                                                <button class="btn btn-primary btn-block w-100" type="submit">Submit</button>
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
  
</html>


<?php
    include('controllers/include_error.php');
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
