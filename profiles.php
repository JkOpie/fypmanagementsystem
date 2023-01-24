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

                    //var_dump($data[1]);
                ?>

                
                <?php
                    //var_dump($_SESSION);
                    $conn = setDbConnection();
                    $supervisors = null;
                    
                    if($_SESSION['roles'] == 'student'){
                        $sql = "select staffs.*, users.name from staffs left join users on users.id = staffs.user_id where staffs.roles='supervisor'and staffs.department = '".$data[1]['programmes']."'";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                $supervisors[] = $row;
                            }
                        }
                    } ?>

                <div class="container-xl px-4 mt-4">
                    <div class="row">
                        <div class="col-xl-4">
                            <!-- Profile picture card-->
                            <form action="controllers/updateUserPhoto.php" method="post" enctype="multipart/form-data">
                                <div class="card mb-4">
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
                                        <?php 
                                                //var_dump($_SESSION['roles'] );
                                                if($_SESSION['roles'] != 'admin'){
                                                    echo '<div class="col-md-6">';
                                                }else{ echo '<div class="col-md-12">'; }?>

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
                                                        if(isset($data[1]['staff_id'])){
                                                            echo '
                                                                <label class="small mb-1">Staff ID</label>
                                                                <input class="form-control" type="text" placeholder="Enter Staff ID" value="' . $data[1]['staff_id'] . '" name=staff_id required/>
                                                            ';
                                                        }
                                                       
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
                                     
                                                <?php

                                                    if (isset($data)) {
                                                        if ($data[0]['roles'] == 'student') { ?>
                                                           <div class="row gx-3 mb-3">
                                                            <div class="col-md-6 ">
                                                            <label class="small mb-1">Programmes</label>
                                                            <select name=programmes class=form-select>
                                                                <option value="multimedia" <?php if($data[1]['programmes'] == 'multimedia'){echo 'selected';}?>>Multimedia</option>
                                                                <option value="information_system" <?php if($data[1]['programmes'] == 'information_system'){echo 'selected';}?> >Information System</option>
                                                                <option value="computer_science" <?php if($data[1]['programmes'] == 'computer_science'){echo 'selected';}?>>Computer Science</option>
                                                            </select>
                                                            </div>
                                                            <div class="col-md-6 ">
                                                            <label class="small mb-1">Semester</label>
                                                            <select name="semester" class=form-select>
                                                                <option value="1" <?php if($data[1]['semester'] == '1'){echo 'selected';}?>>1</option>
                                                                <option value="2" <?php if($data[1]['semester'] == '2'){echo 'selected';}?> >2</option>
                                                                <option value="3" <?php if($data[1]['semester'] == '3'){echo 'selected';}?>>3</option>
                                                                <option value="4" <?php if($data[1]['semester'] == '4'){echo 'selected';}?>>4</option>
                                                                <option value="5" <?php if($data[1]['semester'] == '5'){echo 'selected';}?> >5</option>
                                                                <option value="6" <?php if($data[1]['semester'] == '6'){echo 'selected';}?>>6</option>
                                                                <option value="7" <?php if($data[1]['semester'] == '7'){echo 'selected';}?>>7</option>
                                                                <option value="8" <?php if($data[1]['semester'] == '8'){echo 'selected';}?> >8</option>
                                                            </select>
                                                            </div>
                                                           </div>
                                                        <?php
                                                        } else { 

                                                            if($_SESSION['roles'] != 'admin'){
                                                            ?>
                                                            <div class="row gx-3 mb-3">
                                                            <div class="col-md-12 ">
                                                            <label class="small mb-2">Department</label>
                                                            <select name=department class=form-select>
                                                                <option value="multimedia" <?php if($data[1]['department'] == 'multimedia'){echo 'selected';}?>>Multimedia</option>
                                                                <option value="information_system" <?php if($data[1]['department'] == 'information_system'){echo 'selected';}?> >Information System</option>
                                                                <option value="computer_science" <?php if($data[1]['department'] == 'computer_science'){echo 'selected';}?>>Computer Science</option>
                                                            </select>
                                                            </div>
                                                            </div>
                                                        
                                                        <?php }}
                                                    }
                                                ?>
                                            

                                            
                                        <?php 
                                            
                                            if(isset($data[1]['cluster_name'])){
                                                echo '
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-12 ">
                                                        <label class="small mb-1">Cluster</label>
                                                        <input type="text" class="form-control" disabled readonly value="'.$data[1]['cluster_name'].'"> 
                                                    </div>
                                                 </div>
                                                ';
                                            }
                                       
                                            ?>

                                        

                                       

                                     
                                        

                                        <?php 
                                        
                                        if($_SESSION['roles'] != 'admin'){
                                            echo ' <div class="row gx-3 mb-3">';
                                        }else{
                                            echo ' <div class="row gx-3 mb-3">';
                                        }?>
                                       
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
                            <?php 
                                if($_SESSION['roles'] == 'student'){?>
                                <form action="controllers/student/updateStudentSupervisor.php" method="post">
                                <div class="card mb-4 mb-xl-0">
                                        <div class="card-header">Supervisor</div>
                                        <div class="card-body">
                                        <?php   if(isset($data)){ 
                                            ?>
                                           
                                              <div class="row gx-3 mb-3">
                                                    <div class="col-md-12 mb-2">
                                                        <label class="small mb-1">Supervisor</label>
                                                        <select name="supervisor_id" class="form-control">
                                                            <option>Select Supervisor</option>
                                                            <?php
                                                                if(isset($supervisors)){
                                                                    foreach ($supervisors as $key => $value) { ?>
                                                                        <?php
                                                                            if(isset($data[1]['supervisor_name'])){?>
                                                                            <option value="<?php echo $value['user_id'];?>"  <?php if($data[1]['supervisor_name'] == $value['name']){ echo 'selected' ; } ?> > <?php echo $value['name'] ?></option>
                                                                        <?php }else{?>
                                                                            <option value="<?php echo $value['user_id'];?>" ><?php echo $value['name'] ?></option>
                                                                        <?php  }
                                                                        ?>
                                                                <?php }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>

                                                    <?php if(isset($data[1]['supervisor_name'])){?>
                                                        <div class="col-md-12 mb-3">
                                                            <label for="" class="small">Status</label>
                                                            <input type="text" value="<?php echo $data[1]['status']?>"  class="form-control" disabled>
                                                        </div>  

                                                    <?php } ?>

                                                    <div>
                                                        <input type="hidden" name="user_id" value="<?php echo $_SESSION['id'];?>">
                                                    </div>

                                                    <div class="col-md-12 text-end">
                                                        <button class="btn btn-primary" type="submit">Update Supervisor</button>
                                                    </div>
                                            
                                              </div>
                                             
                                          <?php 
                                        } ?>
                                        </div>
                                </div>
                            </form>
                            <?php }?>

                        
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
    //var programmes = getProgrammes();
    //var departments = getDepartments();
    

    // $.each(programmes, (k, v) => {

    //     console.log(v);

    //     if (v == Userprogrammes) {
    //         $('select[name=programmes]').append(
    //             $('<option>').val(v).text(v).attr('selected', 'selected')
    //         )
    //     } else {
    //         $('select[name=programmes]').append(
    //             $('<option>').val(v).text(v)
    //         )
    //     }

    // })

    // $.each(departments, (k, v) => {
    //     if (v == Userdepartment) {
    //         $('select[name=department]').append(
    //             $('<option>').val(v).text(v).attr('selected', 'selected')
    //         )
    //     } else {
    //         $('select[name=department]').append(
    //             $('<option>').val(v).text(v)
    //         )
    //     }
    // })

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