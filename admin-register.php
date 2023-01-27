
<?php
    session_start();
    //include('controllers/validateAuthentication.php');
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
                             <!-- Basic registration form-->
                             <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form action="controllers/main-register.php" method="post">
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" >Register As</label>
                                                        <select name="roles" class="form-select">
                                                            <option value="student" selected>Student</option>
                                                            <!-- <option value="hod">HOD</option> -->
                                                            <!-- <option value="fyp_coordinator">FYP Coordinator</option> -->
                                                            <!-- <option value="cluster">Cluster</option> -->
                                                            <option value="admin">Administrator</option>
                                                        </select>
                                                    </div>
                                                </div>
                                               
                                            </div>

                                            <div class="row gx-3 student">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputName">Student Name</label>
                                                        <input class="form-control" type="text" placeholder="Enter name" name="name" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 register-roles">
                                                        <label class="small mb-1" for="inputLastName">Matric Number</label>
                                                        <input class="form-control" type="text" placeholder="Enter matric number" name="matric_number" required/>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                    <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                    <input class="form-control" type="email" aria-describedby="emailHelp" placeholder="Enter email address" name="email" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="small mb-1">Phone Number</label>
                                                        <input class="form-control" type="number" placeholder="EX : 010888888" name="phone_number" required/>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Form Row    -->
                                            <div class="row gx-3 programmes">
                                                <div class="col-md-6">
                                                    <div class="mb-3 ">
                                                        <label class="small mb-1">Programmes</label>
                                                        <select name="programmes" class="form-select">
                                                            <option value="multimedia">Multimedia</option>
                                                            <option value="information_system">Information System</option>
                                                            <option value="computer_science">Computer Science</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label for="" class="form-label">Semester</label>
                                                        <select name="semester" class="form-select">
                                                            <option value="12234">12234</option>
                                                            <option value="22234">22234</option>
                                                            <option value="32234">32234</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <!-- Form Group (password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputPassword">Password</label>
                                                        <input class="form-control
                                                        <?php 
                                                            if(isset($_SESSION['password_error'])){ 
                                                                echo 'border border-danger';
                                                            }
                                                        ?>
                                                        " type="password" placeholder="Enter password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).+$" title="Please Include at least one digit, one uppercase letter, one lowercase letter, and one symbol"/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <!-- Form Group (confirm password)-->
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputConfirmPassword">Confirm Password</label>
                                                        <input class="form-control 
                                                        <?php 
                                                            if(isset($_SESSION['password_error'])){ 
                                                                echo 'border border-danger';
                                                            }
                                                        ?>
                                                        " id="inputConfirmPassword" type="password" placeholder="Confirm password" name="confirm_password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z\d]).+$" title="Please Include at least one digit, one uppercase letter, one lowercase letter, and one symbol"/>
                                                    </div>
                                                </div>

                                                <?php 
                                                    if(isset($_SESSION['password_error'])){
                                                        echo '<div class="col-12 text-center"><small class="text-danger small">'.$_SESSION['password_error'].'</small></div>';
                                                    }
                                                ?>

                                            </div>
                                            <!-- Form Group (create account submit)-->
                                            <div class="text-end mt-2">
                                                <button class="btn btn-primary btn-block w-100" type="submit">Create Account</button>
                                            </div>
                                            
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small "><a href="/fyp/admin-login.php?type=student" class="have-account">Have an account? Go to login</a></div>
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

<script>
    $('select[name=roles]').change((e)=>{
        //console.log($(e.currentTarget).val());
        if($(e.currentTarget).val() == 'admin'){
            $('.student').empty();
            $('.programmes').empty();
        }else{
            $('.student').append(
                $('<div>').addClass('col-md-6').append(
                    $('<div>').addClass('mb-3').append(
                        $('<label>').addClass('small mb-1').text('Student Name'),
                        $('<input>').attr({'class': 'form-control', 'type':'text','placeholder':'Enter Name','name':'name'}).prop('required', true)
                    ),
                ),
                $('<div>').addClass('col-md-6').append(
                    $('<div>').addClass('mb-3').append(
                        $('<label>').addClass('small mb-1').text('Matric Number'),
                        $('<input>').attr({'class': 'form-control', 'type':'text','placeholder':'Enter matric number','name':'matric_number'}).prop('required', true)
                    )
                ),
            )

            $('.programmes').append(
                $('<div>').addClass('col-md-6').append(
                    $('<div>').addClass('mb-3').append( 
                        $('<label>').addClass('small mb-1').text('Programmes'),
                        $('<select>').addClass('form-select').attr('name','programmes').append(
                            $('<option>').val('multimedia').text('Multimedia'),
                            $('<option>').val('information_system').text('Information System'),
                            $('<option>').val('computer_science').text('Computer Science')
                        ),
                    )
                ),

                $('<div>').addClass('col-md-6').append(
                    $('<div>').addClass('mb-3').append( 
                        $('<label>').addClass('small mb-1').text('Semester'),
                        $('<select>').addClass('form-select').attr('name', 'semester').append(
                            $('<option>').val('1').text('1'),
                            $('<option>').val('2').text('2'),
                            $('<option>').val('3').text('3'),
                            $('<option>').val('4').text('4'),
                            $('<option>').val('5').text('5'),
                            $('<option>').val('6').text('6'),
                            $('<option>').val('7').text('7'),
                            $('<option>').val('8').text('8')
                        ),
                    )
                )
            )
        }

    
    });
</script>


<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
