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
                            <div class="col-lg-5">
                                <!-- Basic login form-->
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header justify-content-center"><h3 class="fw-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <!-- Login form-->
                                        <form action="controllers/verify_login.php" method="post">
                                            <!-- Form Group (email address)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputEmailAddress">Email</label>
                                                <input class="form-control" type="email" name="email" placeholder="Enter email address" required
                                                    <?php 
                                                        if(isset($_SESSION["login_error"])){
                                                            echo 'value='.$_SESSION['email'];
                                                        }
                                                    ?>
                                                />
                                            </div>
                                            <!-- Form Group (password)-->
                                            <div class="mb-3">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control" type="password" name="password" placeholder="Enter password" required/>
                                            </div>

                                            <?php 
                                                if(isset($_SESSION["login_error"])){
                                                    echo '<div class="mb-3 text-center"><label class="text-danger small mb-1">Invalid email or password, Please try again!.</label></div>';
                                                }
                                            ?>
                                            <!-- Form Group (login box)-->
                                            <div class="mt-4 mb-0">
                                                <button class="btn btn-primary w-100" type="submit">Login</a>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center">
                                        <div class="small"><a href="/fyp/register.php">Need an account? Sign up!</a></div>
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
    </body>
</html>

<?php
   session_unset();
?>
