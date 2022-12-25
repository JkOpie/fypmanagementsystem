<?php
session_start();
include_once('controllers/validateAuthentication.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('layout_admin/header.php') ?>
    <?php include_once('controllers/include_error.php')?>
</head>

<body class="nav-fixed">
    <?php include_once('layout_admin/navbar.php') ?>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <?php include_once('layout_admin/sidenav.php') ?>
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

                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-12">
                            <!-- Account details card-->
                            <div class="card mb-4">
                                <div class="card-header">Account Details</div>
                                <div class="card-body">

                                    <form action="controllers/users.php" method="post" >
                                        
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputUsername">Name</label>
                                                <input class="form-control" type="text" placeholder="Enter your username" value="" name="name" />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1">Staff ID</label>
                                                <input class="form-control" type="text" placeholder="Enter Staff ID"  name=staff_id required/>
                                            </div>
                                        </div>
                                        <input type="hidden" value="createSupervisor" name="type">
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputLastName">Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Enter email" value="" required />
                                            </div>
                                            <div class="col-md-6">
                                                <label class="small mb-1" for="inputOrgName">Phone Number</label>
                                                <input class="form-control" type="text" placeholder="Enter phone number" value="" name="phone_number" required/>
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-6">
                                                <label class="small mb-1">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Enter Password" value="" required />
                                            </div>
                                            <div class="col-md-6">
                                            <label class="small mb-1">Confirm Password</label>
                                                <input class="form-control" type="password" name="confirm_password" placeholder="Enter Confirm Password" value="" required />
                                            </div>
                                        </div>
                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12 programmes">
                                                <label class="small mb-1">Department</label>
                                                <select name=department class=form-select required></select>
                                            </div>
                                        </div>

                                        <div class="row gx-3 mb-3">
                                            <div class="col-md-12">
                                                <label class="small mb-1" for="inputLastName">Roles</label>
                                                <input class="form-control" type="text" name="roles" value="SUPERVISOR" disabled />
                                                <input type="hidden" name="roles" value="SUPERVISOR" />
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
            <?php include_once('layout_admin/footer.php') ?>
        </div>
    </div>
    <?php include_once('layout_admin/btm_scripts.php') ?>
    <?php include_once('controllers/include_error.php')?>
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