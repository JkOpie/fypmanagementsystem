
<?php
    session_start();
    include('controllers/validateAuthentication.php');
    require_once("controllers/db_connection.php");
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
                <header class="page-header page-header-dark bg-gradient-primary-to-secondary pb-5">
                    <div class="container-xl px-4">
                        <div class="page-header-content pt-4">
                            <div class="row align-items-center justify-content-between">
                                <div class="col-auto mt-4">
                                    <h1 class="page-header-title">
                                        <div class="page-header-icon"><i data-feather="activity"></i></div>
                                        <?php 
                                        if($_SESSION['roles'] != 'hod' &&  $_SESSION['roles'] != 'admin'){?>
                                            Dashboard
                                        <?php }else{?>
                                            Check Title Redundancy 
                                            <?php }
                                        ?>
                                        
                                    </h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </header>
                <div class="container-xl" style="margin-top:-3rem">
                <div class="row">
                    <div class="col-xxl-12 col-xl-12">
                        <div class="card h-100">
                            <div class="card-body h-100 p-2 pt-3">
                                <div class="row align-items-center">
                                    <div class="col-xxl-12">
                                        <div class="text-center text-xl-start text-xxl-center">
                                            <input type="text" class="form-control text-center" 
                                            style="font-size:22px" placeholder="Search Title Redundancy" name="search-proposal" onkeypress="enterKeyPressed(event)">
                                            <div class="text-end">
                                                <i><small class="text-muted">press Enter to search</small></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         <!-- Example Colored Cards for Dashboard Demo-->

         <?php
            $conn = setDbConnection();
            $total_students= null;
            $sql = 'select count(*) as total_students from students';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total_students = $row['total_students'];
                }
            }
            
        ?>

        <?php 
            $total_proposals= null;
            $sql = 'select count(*) as total_proposals from proposals';
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $total_proposals = $row['total_proposals'];
                }
            }
        ?>

        <div class="row">
            <?php 
                if($_SESSION['roles'] != 'hod' &&  $_SESSION['roles'] != 'admin'){?>

                    <div class="col-md-12 mt-5">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th style="width: 40%;">Total Student</th>
                                <th style="width: 40%;">Total Proposal</th>
                                <th style="width: 20%;"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><?php echo $total_students ?></td>
                                <td><?php echo $total_proposals ?></td>
                                <td><a class="btn btn-primary" href="/fyp/proposals.php">View Proposals</a</td>
                            </tr>
                        </tbody>
                    </table>
                    </div>
                 
           
           
            <?php   } ?> 
            
        </div>
    </div>
                    

                </main>
                <?php include('layout_admin/footer.php')?>
            </div>
        </div>
        <?php include('layout_admin/btm_scripts.php')?>
        <?php include('controllers/include_error.php')?>
    </body>
    <script>
        function enterKeyPressed(event){
            if (event.keyCode == 13) {
                $.ajax({
                    type: "POST",
                    url: '/fyp/controllers/search-proposal.php',
                    data: {
                        'title' : $('input[name=search-proposal]').val(),
                    }, // serializes the form's elements.
                    success: function(data) { 
                        if(data == 'available'){
                            alert('Title '+$('input[name=search-proposal]').val()+' is available');
                        }else{
                            alert('Title '+$('input[name=search-proposal]').val()+' not available');
                        }
                    }
                });
            }
        }
    </script>

</html>


<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
