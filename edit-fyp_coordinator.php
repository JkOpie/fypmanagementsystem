<?php
session_start();
include('controllers/validateAuthentication.php');
require_once("controllers/db_connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('layout_admin/header.php') ?>
    
</head>

<body class="nav-fixed">
    <?php include('layout_admin/navbar.php') ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include('layout_admin/sidenav.php') ?>
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
                                        Edit Supervisor
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->

                <?php

                    $conn = setDbConnection();
                    $sql = "select users.* , staffs.* from users left join staffs on staffs.user_id = users.id where users.id = '".$_REQUEST['fyp_coordinator_id']."'";
                    $result = $conn->query($sql);
                    $hod = null;

                    //var_dump($result);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            //var_dump($row);
                            $hod = $row;
                        }
                    }
            
                    //var_dump($hod);
                ?>

                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <form action="controllers/hod/updateFypCoordinatorPhoto.php" method="post" enctype="multipart/form-data">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body">
                                        <!-- Profile picture image-->
                                        <div class="text-center">
                                            <img class="img-account-profile rounded-circle mb-2 upload-image" 
                                            src="<?php 
                                                if (isset($hod['image'])) {
                                                    echo '/fyp/assets/profile/'.$hod['image'];
                                                } else {
                                                    echo '/fyp/assets/img/illustrations/profiles/profile-1.png';
                                                } ?>" alt="" />
                                        </div>
                                        <!-- Profile picture upload button-->
                                        <div class="my-3">
                                            <input class="form-control upload" type="file" name="user_picture">
                                            <input type="hidden" value="<?php echo $_REQUEST['fyp_coordinator_id'] ?>" name="fyp_coordinator_id" >
                                        </div>
                                        <div class="my-3">
                                            <button class="btn btn-primary w-100" type="submit">Save Photo</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-xl-8">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">

                                    <form action="controllers/hod/updateFypCoordinatorProfile.php" method="post" >
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Name</label>
                                                <input class="form-control" type="text" placeholder="Enter your username" value="<?php echo $hod['name'] ?>" name="name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1">Staff ID</label>
                                                <input class="form-control" type="text" placeholder="Enter Staff ID" value="<?php echo $hod['staff_id'] ?>" name=staff_id required/>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Enter email" value="<?php echo $hod['email'] ?>" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Phone Number</label>
                                                <input class="form-control" type="text" placeholder="Enter phone number" value="<?php echo $hod['handphone'] ?>" name="phone_number" />
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                            <label class="small mb-2">Department</label>
                                                <select name=department class=form-select>
                                                    <option value="multimedia" <?php if($hod['department'] == 'multimedia'){echo 'selected';}?>>Multimedia</option>
                                                    <option value="information_system" <?php if($hod['department'] == 'information_system'){echo 'selected';}?> >Information System</option>
                                                    <option value="computer_science" <?php if($hod['department'] == 'computer_science'){echo 'selected';}?>>Computer Science</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName">Roles</label>
                                                <input class="form-control" type="text" name="roles" value="<?php echo strtoupper($hod['roles']) ?>" disabled />
                                            </div>
                                        </div>

                                        <div class="text-end">
                                            <input type="hidden" value="<?php echo $_REQUEST['fyp_coordinator_id'] ?>" name="fyp_coordinator_id" >
                                            <button class="btn btn-primary" type="submit">Save changes</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </main>
            <?php include('layout_admin/footer.php') ?>
        </div>
    </div>
    <?php include('layout_admin/btm_scripts.php') ?>
    <?php include('controllers/include_error.php')?>
</body>
<!-- <script src="js/data.js"></script> -->
<script>
    $('.upload').change(function() {
        var input = this;
        var url = $(this).val();
        var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();

        if (input.files && input.files[0] && (ext == "gif" || ext == "png" || ext == "jpeg" || ext == "jpg")) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('.upload-image').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        } else {
            $('.upload-image').attr('src', '/fyp/assets/img/illustrations/profiles/profile-1.png');
        }
    });
</script>

</html>

<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>