
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
                                        <form action="controllers/registeration.php" method="post">
                                            <!-- Form Row-->
                                            <div class="row gx-3">
                                                <div class="col-12">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" >Register As</label>
                                                        <input type="text" value="supervisor" name="roles" class="form-control" readonly>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row gx-3">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="small mb-1" for="inputName">Name</label>
                                                        <input class="form-control" type="text" placeholder="Enter name" name="name" required/>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3 register-roles">
                                                        <label class="small mb-1" for="inputLastName">Staff ID</label>
                                                        <input class="form-control" type="text" placeholder="Enter staff id" name="staff_id" required/>
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
                                            <div class="row gx-3 department">
                                                <div class="col-md-12">
                                                    <div class="mb-3 ">
                                                        <label class="small mb-1">Department</label>
                                                        <select name="department" class="form-select">
                                                            
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
                                </div>
                        </div>
                    </div>
                </main>
                <?php include('layout_admin/footer.php')?>
            </div>
        </div>
        <?php include('layout_admin/btm_scripts.php')?>
    </body>
    <script src="js/data.js"></script>
    <script>
        
        $departments = getDepartments();
        
        $.each($departments, (k,v) => {
            $('select[name=department]').append(
                $('<option>').val(v).text(v)
            )
        })

        $('select[name=roles]').change((e) => {
            var roles = $(e.currentTarget).val();
        
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
        });
    </script>
</html>


<?php
    include('controllers/include_error.php');
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
