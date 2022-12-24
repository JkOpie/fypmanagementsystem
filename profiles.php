<?php
session_start();
include('controllers/validateAuthentication.php');
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
                                        Profiles
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <!-- Main page content-->

                <?php
                    include('controllers/getUserProfile.php');
                    $data = getUserProfile();
                ?>

                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <form action="controllers/updateUserPhoto.php" method="post" enctype="multipart/form-data">
                                <div class="card mb-4 mb-xl-0">
                                    <div class="card-header">Profile Picture</div>
                                    <div class="card-body">
                                        <!-- Profile picture image-->
                                        <div class="text-center">
                                            <img class="img-account-profile rounded-circle mb-2 upload-image" 
                                            src="<?php 
                                                if (isset($data[0]['image'])) {
                                                    echo '/fyp/assets/profile/'.$data[0]['image'];
                                                } else {
                                                    echo '/fyp/assets/img/illustrations/profiles/profile-1.png';
                                                } ?>" alt="" />
                                        </div>
                                        <!-- Profile picture upload button-->
                                        <div class="my-3">
                                            <input class="form-control upload" type="file" name="user_picture">
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

                                    <form action="controllers/updateUserProfile.php" method="post" >
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Name</label>
                                                <input class="form-control" type="text" placeholder="Enter your username" value="<?php echo $data[0]['name'] ?>" name="name" />
                                            </div>
                                            <div class="col-md-6">
                                                <?php
                                                if (isset($data)) {
                                                    if ($data[0]['roles'] == 'student') {
                                                        echo '
                                                                    <label class="small mb-1">Matric Number</label>
                                                                    <input class="form-control" type="text" placeholder="Enter Matic Number" value="' . $data[1]['matric_number'] . '" name=matric_number required />
                                                                ';
                                                    } else {
                                                        echo '
                                                                    <label class="small mb-1">Staff ID</label>
                                                                    <input class="form-control" type="text" placeholder="Enter Staff ID" value="' . $data[1]['staff_id'] . '" name=staff_id required/>
                                                                ';
                                                    }
                                                } else {
                                                }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Enter email" value="<?php if (isset($data)) {echo $data[0]['email'];} ?>" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Phone Number</label>
                                                <input class="form-control" type="text" placeholder="Enter phone number" value="<?php if (isset($data)) {echo $data[0]['handphone'];} ?>" name="phone_number" />
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12 programmes">
                                                <?php
                                                if (isset($data)) {
                                                    if ($data[0]['roles'] == 'student') {
                                                        echo '
                                                                <label class="small mb-1">Programmes</label>
                                                                <select name=programmes class=form-select></select>
                                                            ';
                                                    } else {
                                                        echo '
                                                                <label class="small mb-1">Department</label>
                                                                <select name=department class=form-select></select>
                                                            ';
                                                    }
                                                }
                                                ?>
                                            </div>
                                        </div>

                                        <?php if(isset($data)){
                                             if ( isset($data[1]['supervisor_name']) && $data[1]['status'] == 'approved') {
                                                echo '
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-12 programmes">
                                                        <label class="small mb-1">Supervisor</label>
                                                        <input type=text disabled class=form-control value='.$data[1]['supervisor_name'].'>
                                                    </div>
                                                </div>';
                                             }
                                        } ?>

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName">Roles</label>
                                                <input class="form-control" type="text" name="roles" value="<?php echo strtoupper($_SESSION['roles']) ?>" disabled />
                                            </div>
                                        </div>
                                        <div class="text-end">
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
<script src="js/data.js"></script>
<script>
    var programmes = getProgrammes();
    var departments = getDepartments();
    var Userprogrammes = '<?php if (isset($data[1]['programmes'])) {
                                echo $data[1]['programmes'];
                            } ?>';
    var Userdepartment = '<?php if (isset($data[1]['department'])) {
                                echo $data[1]['department'];
                            } ?>';

    $.each(programmes, (k, v) => {

        console.log(v);

        if (v == Userprogrammes) {
            $('select[name=programmes]').append(
                $('<option>').val(v).text(v).attr('selected', 'selected')
            )
        } else {
            $('select[name=programmes]').append(
                $('<option>').val(v).text(v)
            )
        }

    })

    $.each(departments, (k, v) => {
        if (v == Userdepartment) {
            $('select[name=department]').append(
                $('<option>').val(v).text(v).attr('selected', 'selected')
            )
        } else {
            $('select[name=department]').append(
                $('<option>').val(v).text(v)
            )
        }
    })

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