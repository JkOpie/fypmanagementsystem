
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
                                            Welcome to Final Year Title Management System!
                                        </h1>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </header>
                    <!-- Main page content-->
                    <div class="container-xl px-4" style='margin-top:-3rem'>
                        <div class="row">
                            <div class="col-xxl-12 col-xl-12 mb-3">
                                <div class="card h-100">
                                    <div class="card-body h-100 ">
                                        <div class="row align-items-center">
                                            <div class="col-xl-12 col-xxl-12">
                                                <div class="text-center text-xl-start text-xxl-center">
                                                    <input type="text" class="form-control text-center" 
                                                    style="font-size:22px" placeholder="Check Title Redundancy" name="search-proposal" onkeypress="enterKeyPressed(event)">
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
                    </div>

                    <?php
                      $conn = setDbConnection();
                      $sql = "select proposals.*, users.name as supervisor_name from proposals 
                      left join users on users.id = proposals.supervisor_id
                      where user_id = '".$_SESSION['id']."'";
                      $result = $conn->query($sql);
                      $proposals = null;

                      if ($result->num_rows > 0) {
                          while ($row = $result->fetch_assoc()) {
                              $proposals[] = $row;
                          }
                      }
                    ?>

                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-xxl-12 mb-5">
                                <div class="d-flex justify-content-end align-items-center">
                                  

                                    <button class="btn btn-info me-2" onclick="window.location.replace('/fyp/student-dashboard.php')">Reset Search</button>
                                    <?php 

                                        //var_dump(TotalProposalsStudent());

                                        $query = "select count(id) as total_student_proposal from proposals where user_id = '".$_SESSION['id']."'";
                                        $result = $conn->query($query);
                                        $totalProposals = 0;

                                        if ($result->num_rows > 0) {
                                            while ($row = $result->fetch_assoc()) {
                                                $totalProposals = $row['total_student_proposal'];
                                            }
                                        }

                                        //var_dump($totalProposals);
                                        
                                        if($_SESSION['roles'] == 'student' && $totalProposals < 3){
                                            echo "<button class='btn btn-primary me-2' onclick=window.location.replace('/fyp/add-proposal.php')>Add Proposal</button>";
                                        }
                                    ?>
                                    
                                </div>
                                <table class="table table-hover table-stripped" id="proposal">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Submission Date</th>
                                            <th>Attachment</th>
                                            <th>Status</th>
                                            <th>Comments</th>
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if( isset($proposals)){
                                            foreach ($proposals as $key => $proposal) {
                                                //var_dump();
                                                $updateApproveStatus = null; 
                                                $updateRejectStatus = null;
                                                $updateSupervisor = null;
                                                $editProposal = null;
                                                $deleteProposal = null;

                                                if($proposal['fyp_coordinator_status'] == 'pending'){
                                                    $editProposal = "<a class='btn btn-primary btn-sm mb-1' data-status=approved ' href='/fyp/add-proposal.php?type=edit&proposal=".$proposal['id']."'>Edit</a>";
                                                    $deleteProposal = "<a class='btn btn-danger btn-sm mb-1' data-status=approved ' href='/fyp/controllers/student/deleteProposal.php?proposal_id=".$proposal['id']."'>Delete</a>";
                                                }
                                                //var_dump($proposal['fyp_coordinator_status'] );
                                            
                                               echo '
                                                        <tr>
                                                            <td>'.$proposal['title'].'</td>
                                                            <td>'.$proposal['submission_date'].'</td>
                                                            <td>'.( $proposal['attachment_name'] ? '<a href="assets/proposals/'.$proposal['attachment'].'" target=blank>'.$proposal["attachment_name"].'</a>' : '-').'</td>
                                                            <td>'.$proposal['fyp_coordinator_status'].'</td>
                                                            <td>'.$proposal['reason'].'</td>
                                                            <td>
                                                                '.$editProposal.' 
                                                                '.$deleteProposal.'
                                                            </td>
                                                        </tr>
                                                ';
                                            }
                                        }else{
                                            echo '<tr><td colspan=7>No Proposals!</td></tr>';
                                        }
                                            
                                        ?>
                                    </tbody>
                                </table>    
                            </div>
                        </div>
                    </div>

                </main>
                <?php include('layout_admin/footer.php')?>
            </div>
        </div>
        <?php include('layout_admin/btm_scripts.php');  include('controllers/include_error.php');?>
        
    </body>

    <script>

        var url = new URL(window.location.href);
        var title = url.searchParams.get("title");
        var status = url.searchParams.get("status");
        
        console.log(title,status);
        
        if(title != null && title != ''){
            console.log($('input[name=search-proposal]'));
            $('input[name=search-proposal]').val(title);
        }

        if(status != 'null' && status != ''){
            $('select[name=filter_status]').val(status);
        }

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

      
        function deleteProposal(id, element){

            if(confirm('Are you want to delete this proposal ? ')){

                $.ajax({
                    type: "POST",
                    url: '/fyp/controllers/proposal.php',
                    data: {
                        'type' : 'delete',
                        'proposal_id' : id,
                    }, // serializes the form's elements.
                    success: function(data) { 
                        location.reload();
                    }
                });
             
            }
        }

        function updateProposalStatus(id, element){

            $.ajax({
                type: "POST",
                url: '/fyp/controllers/proposal.php',
                data: {
                    'type' : 'update_status',
                    'proposal_id' : id,
                    'status': $(element).attr('data-status'),
                }, // serializes the form's elements.
                success: function(data) { 
                    document.location.reload(true)
                }
            });

        }

        function editProposal(id){
            window.location.replace('/fyp/add-proposal.php?type=edit&proposal='+id);
        }

      
    </script>
</html>


<?php
    unset($_SESSION['error']);
    unset($_SESSION['success']);
?>
