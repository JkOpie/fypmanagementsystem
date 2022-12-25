<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php include('layouts/header.php')?>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                <div class="container-xl px-4">
                        <div class="row justify-content-center">
                        <div class="col-12 text-center">
                                <img src="/fyp/assets/img/download-removebg-preview.png" alt="">
                            </div>
                            <div class="col-lg-7">
                                <!-- Basic registration form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <!-- Registration form-->
                                        <form action="controllers/registeration.php" method="post">
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" >Register As</label>
                                                        <select name="roles" class="form-select">
                                                            <option value="student" selected>Student</option>
                                                            <option value="hod">HOD</option>
                                                            <option value="fyp_coordinator">FYP Coordinator</option>
                                                            <option value="cluster">Cluster</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gx-3">
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
                                                <div class="col-md-12">
                                                    <div class="mb-3 ">
                                                        <label class="small mb-1">Programmes</label>
                                                        <select name="programmes" class="form-select">
                                                            
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
                                                        " type="password" placeholder="Enter password" name="password"/>
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
                                                        " id="inputConfirmPassword" type="password" placeholder="Confirm password" name="confirm_password"/>
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
                                        <div class="small"><a href="/fyp/login.php">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            <?php include('layouts/footer.php')?>      
        </div>
        <?php include('controllers/include_error.php')?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="js/data.js"></script>
    </body>
    <script>
        $programmes = getProgrammes();
        $departments = getDepartments();
        
        $.each($programmes, (k,v) => {
            $('select[name=programmes]').append(
                $('<option>').val(v).text(v)
            )
        })
          
        $('select[name=roles]').change((e) => {
            var roles = $(e.currentTarget).val();
            
            if(roles != 'student' ){
               $('.register-roles').empty().append(
                    $('<lable>').addClass('small mb-1').text('Staff ID'),
                    $('<input>').attr({'name': 'staff_id', 'type' : 'text', 'placeholder' : 'Enter Staff ID'}).prop('required', 'true').addClass('form-control')
               );
               
               $('.programmes').empty().append(
                    $('<div>').addClass('col-md-12').append(
                        $('<div>').addClass('mb-3').append(
                            $('<lable>').addClass('small mb-1').text('Department'),
                            $('<select>').attr('name', 'department').addClass('form-select')
                        )
                    )
                )

                $.each($departments, (k,v) => {
                    $('select[name=department]').append(
                        $('<option>').val(v).text(v)
                    )
                })

               
            }else{
                $('.register-roles').empty().append(
                    $('<lable>').addClass('small mb-1').text('Matric Number'),
                    $('<input>').attr({'name': 'matric_number', 'type' : 'text', 'placeholder' : 'Enter Matric Number'}).prop('required', 'true').addClass('form-control')
                );

                $('.programmes').empty().append(
                    $('<div>').addClass('col-md-12').append(
                        $('<div>').addClass('mb-3').append(
                            $('<lable>').addClass('small mb-1').text('Programmes'),
                            $('<select>').attr('name', 'programmes').addClass('form-select')
                        )
                    )
                )

                $.each($programmes, (k,v) => {
                    $('select[name=programmes]').append(
                        $('<option>').val(v).text(v)
                    )
                })
            }

        });
    </script>
</html>


<?php
   session_unset();
?>
