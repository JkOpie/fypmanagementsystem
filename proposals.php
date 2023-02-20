
<?php
    session_start();
    include('controllers/validateAuthentication.php');
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
                                            Titles
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
                                                    style="font-size:22px" placeholder="Search Title" name="search-proposal" onkeypress="enterKeyPressed(event)">
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
                        include_once('controllers/proposal.php');
                        $proposals = index();
                    ?>

                    <div class="container-xl px-4">
                        <div class="row">
                            <div class="col-xxl-12 mb-5">
                                <div class="d-flex justify-content-end align-items-center">
                                    <select name="filter_status" class="form-select me-2" style="width: 18%;" onchange="enterKeyChange(event)">
                                        <option value="">Select Status</option>
                                        <option value="pending">Pending</option>
                                        <option value="rejected">Rejected</option>
                                        <option value="approved">Approved</option>
                                    </select>

                                    <button class="btn btn-info me-2" onclick="window.location.replace('/fyp/dashboard.php')">Reset Search</button>
                                    <?php 
                                        
                                        if($_SESSION['roles'] == 'hod' || $_SESSION['roles'] == 'fyp_coordinator'){
                                            echo "<a class='btn btn-primary me-2' href='/fyp/controllers/report.php'>Generate Proposal Report</a>";
                                        }
                                    ?>
                                    
                                </div>
                                <table class="table table-hover table-stripped" id="proposal">
                                    <thead>
                                        <tr>
                                            <th>Title</th>
                                            <th>Submission Date</th>
                                            <th>Student</th>
                                          
                                            <th>Attachment</th>
                                            <th>Status</th>

                                            <?php if($_SESSION['roles'] != 'cluster'){ ?>
                                                <th>Comments</th>
                                            <?php } ?>
                                            
                                          
                                            <th>Action</th>
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        if( isset($proposals)){
                                            foreach ($proposals as $key => $proposal) {
                                                $updateApproveStatus = null; 
                                                $updateRejectStatus = null;
                                                $updateSupervisor = null;
                                                $editProposal = null;
                                                $deleteProposal = null;
                                                $comment = null;

                                                if($proposal['fyp_coordinator_status'] == 'pending' || $proposal['fyp_coordinator_status'] == null ){
                                                    if($_SESSION['roles'] == 'supervisor'){
                                                        $updateApproveStatus = "<button class='btn btn-success btn-sm mb-1' data-status=approved data-bs-toggle='modal'  data-bs-target='#approveProposal' onclick='updateProposalStatus(".$proposal['id'].",this)'>Approve</button>";
                                                        $updateRejectStatus = '<button class="btn btn-danger btn-sm mb-1" data-status=rejected data-bs-toggle="modal"  data-bs-target="#approveProposal" onclick="updateProposalStatus('.$proposal['id'].',this)">Reject</button>';
                                                    }
                                                }
                                                //var_dump($proposal['fyp_coordinator_status'] );

                                                if($proposal['status'] == 'pending' || $proposal['status'] == null){
                                                    // if($_SESSION['roles'] == 'cluster'){
                                                    //     $updateApproveStatus = "<button class='btn btn-success btn-sm mb-1' data-status=approved onclick='updateProposalStatus(".$proposal['id'].",this)'>Approve</button>";
                                                    //     $updateRejectStatus = '<button class="btn btn-danger btn-sm mb-1" data-status=rejected onclick="updateProposalStatus('.$proposal['id'].',this)">Reject</button>';
                                                    // }
                                                }
                                                if($_SESSION['roles'] != 'cluster'){
                                                    $comment = ' <td>'.($proposal['reason'] ?? '-') .'</td>';
                                                 }
                                            
                                               echo '
                                                        <tr>
                                                            <td>'.$proposal['title'].'</td>
                                                            <td>'.$proposal['submission_date'].'</td>
                                                            <td>'.( $proposal['student'] ?? '-') .'</td>
                                                         
                                                            <td>'.( $proposal['attachment_name'] ? '<a href="assets/proposals/'.$proposal['attachment'].'" target=blank>'.$proposal["attachment_name"].'</a>' : '-').'</td>
                                                            <td>'.$proposal['fyp_coordinator_status'].'</td>
                                                           '.$comment.'
                                                            <td>
                                                                '.$editProposal.' 
                                                                '.$updateApproveStatus.'
                                                                '.$updateRejectStatus.'
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
        <?php include('layout_admin/btm_scripts.php')?>
        <?php include('controllers/include_error.php')?>
    </body>

    <!-- Modal -->
    <div class="modal fade" id="approveProposal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" id="updateProposals">

                    <div class="form-group mb-3">
                        <lable class="small mb-1">Reasons</lable>
                        <input type="hidden" value="" name="proposal_id">
                        <input type="hidden" value="" name="type">
                        <input type="hidden" value="" name="status">
                        <textarea name="reason" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                    

                    <div class="text-end">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
               
            </div>
          
            </div>
        </div>
    </div>

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
            if (event.keyCode == 13 && $('input[name=search-proposal]').val() != '' ) {
                window.location.replace('/fyp/proposals.php?type=search&title='+
                $('input[name=search-proposal]').val()+
                '&status='+$('select[name=filter_status]').val());    
                return true;
            }
        }

        function enterKeyChange(event){
            window.location.replace('/fyp/proposals.php?type=search&title='+
            $('input[name=search-proposal]').val()+
            '&status='+$('select[name=filter_status]').val());    
            return true;
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

            if($(element).attr('data-status') == 'approved'){
                $('#exampleModalLabel').text('Approve Proposal');
            }else{
                $('#exampleModalLabel').text('Reject Proposal');
            }
           
            $('form#updateProposals').attr('action', '/fyp/controllers/proposal.php');
            $('form#updateProposals input[name=proposal_id]').val(id);
            $('form#updateProposals input[name=type]').val('update_status');
            $('form#updateProposals input[name=status]').val($(element).attr('data-status'));

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
