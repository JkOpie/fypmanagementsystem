
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

                </main>
                <?php include('layout_admin/footer.php')?>
            </div>
        </div>
        <?php include('layout_admin/btm_scripts.php')?>
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
