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
                                        <?php 
                                            if(isset($_REQUEST['type'])){
                                                if($_REQUEST['type']  == 'edit'){
                                                    echo 'Update';

                                                    include('controllers/proposal.php');
                                                    $proposals = edit($_REQUEST['proposal']);
                                                    $supervisors = getAllSupervisor();
                                                }
                                            }else{
                                                echo 'Add';
                                            }
                                        ?>
                                        Proposal
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
                                <div class="card-header">Proposal Details</div>
                                <div class="card-body">
                                    <form action="/fyp/controllers/proposal.php" method="post" enctype="multipart/form-data" >
                                        <div class="row gx-3">
                                            <div class="col-md-12 mb-3">
                                                <label class="small mb-1">Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Title" name="title" required
                                                <?php
                                                    if(isset($proposals['title'])){
                                                        echo "value="."'".$proposals['title']."'";
                                                    }

                                                    if($_SESSION['roles'] == 'cluster'){
                                                        echo 'disabled=true';
                                                    }
                                                ?>
                                                >

                                                <input type="hidden" name="type"
                                                    <?php 
                                                        if($_SESSION['roles'] == 'cluster'){
                                                            echo 'value=assignSupervisor';
                                                        }else if(isset($_REQUEST['type'])){
                                                            if($_REQUEST['type'] == 'edit'){
                                                                echo 'value=update';
                                                            }

                                                        }
                                                        else if(isset($proposals) || $_SESSION['roles'] == 'student'){
                                                            echo 'value=create';
                                                        }
                                                    ?>
                                                >


                                            </div>

                                            <?php
                                                if($_SESSION['roles'] == 'cluster'){
                                                    if(isset($supervisors)){
                                                        $supervisorOption = null;

                                                        foreach ($supervisors as $key => $supervisor) {
                                                            $supervisorOption =  $supervisorOption.'<option value='.$supervisor['supervisor_id'].' '.($supervisor['supervisor_name'] == $proposals['supervisor'] ? 'selected' : null).' >'.$supervisor['supervisor_name'].'</option>';
                                                        }

                                                        echo
                                                        '<div class="col-md-12 mb-3">
                                                            <label class="small mb-1">Supervisor</label>
                                                            <select name=supervisor_id class=form-select required>
                                                                <option value="">Select Supervisor</option>
                                                                '.$supervisorOption.'
                                                            </select>
                                                        </div>';
                                                    }
                                                }
                                            ?>

                                            <?php 
                                                if(isset($proposals)){
                                                    echo '<input type=hidden name=proposal_id value='.$_SESSION['id'].'>';
                                                }
                                            ?>

                                            <div class="col-md-6 mb-3">
                                                <label class="small mb-1">Start Date</label>
                                                <input type="date" class="form-control" name="start_date" required 
                                                <?php
                                                    if(isset($proposals['start_date'])){
                                                        echo "value=".$proposals['start_date']."";
                                                    }

                                                    if($_SESSION['roles'] == 'cluster'){
                                                        echo 'disabled=true';
                                                    }
                                                ?>
                                                >
                                            </div>

                                            <div class="col-md-6 mb-3">
                                                <label class="small mb-1">End Date</label>
                                                <input type="date" class="form-control" name="end_date" required
                                                <?php
                                                    if(isset($proposals['end_date'])){
                                                        echo "value=".$proposals['end_date']."";
                                                    }

                                                    if($_SESSION['roles'] == 'cluster'){
                                                        echo 'disabled=true';
                                                    }
                                                ?>
                                                >
                                            </div>
                                        </div>
                                        <hr>

                                        <?php 
                                            if(isset($proposals['attachment'])){
                                                $attchment = null;
                                                if($_SESSION['roles'] == 'student'){
                                                    $attchment =  '<input type="file" class="form-control" name="attachment">';
                                                }
                                                echo '
                                                <div class="row gx-3 mb-3">
                                                    <div class="col-md-12 mb-3">
                                                        <label class="small mb-1">Attachment</label>
                                                        '.$attchment.'
                                                    </div>
                                                </div>
                                                ';
                                            }else{
                                                if($_SESSION['roles'] == 'student'){
                                                    $attchment =  '<input type="file" class="form-control" name="attachment">';
                                                }
                                                echo '<div class="row gx-3 mb-3">
                                                        <div class="col-md-12 mb-3">
                                                            <label class="small mb-1">Attachment</label>
                                                            '.$attchment.'
                                                        </div>
                                                    </div>
                                                    ';
                                            }
                                        ?>

                                        <div class="row gx-3 mb-3 attachment">
                                            <div class="col-md-12">
                                                <?php 
                                                    if(isset($proposals['attachment_name'])){
                                                        echo '<ul class="list-group">
                                                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                                               '.$proposals['attachment_name'].'
                                                            <span class="badge bg-danger" data-id='.$proposals['id'].' onclick=deleteAttachment(this)>Delete</span>
                                                        </ul>';
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <button class="btn btn-primary" type="submit">Save changes</button>
                                        </div>
                                    </form>
                                </div>
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
    function deleteAttachment(element){
        var proposal_id = $(element).attr('data-id');

        if(confirm('Are your sure want to delete this attachment ?')){
            $.ajax({
                type: "POST",
                url: '/fyp/controllers/proposal.php',
                data: {
                    'type' : 'deleteAttachment',
                    'proposal_id' : proposal_id,
                },
                success: function(data) { 
                    location.reload();
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