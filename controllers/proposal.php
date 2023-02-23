<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();

    if(isset($_POST['type'])){
        $type = $_POST['type'];
        if($type == 'search'){
            return search($_POST['title'], $_POST['status']);
        }

        if($type == 'delete'){
            return delete($_POST['proposal_id']);
        }

        if($type == 'update'){
            return update($_POST['title'], $_POST['submission_date'], $_POST['supervisor_id'], $_FILES['attachment'], $_POST['proposal_id']);
        }

        if($type == 'create'){
            return create($_POST['title'], $_POST['submission_date'], $_FILES['attachment']);
        }

        if($type == 'assignSupervisor'){
            return updateSupervisor($_POST['supervisor_id'],$_POST['proposal_id']);
        }

        if($type == 'update_status'){
            return updateStatus($_POST['status'], $_POST['reason'],$_POST['proposal_id']);
        }

        if($type == 'deleteAttachment'){
            return deleteAttachment($_POST['proposal_id']);
        }
    }

    
    function index(){
        
        global $conn;
        $sql = "select proposals.*, student.id as student_id, student.name as student_name, supervisor.name as supervisor_name from proposals
        left join users as student on proposals.user_id = student.id 
        left join users as supervisor on supervisor.id = proposals.supervisor_id";

        if($_SESSION['roles'] == 'student'){
            $sql .= " where student.id = ".$_SESSION['id'];
        }

        if(isset($_SESSION['cluster_status'])){
            if($_SESSION['cluster_status'] == 'lead_cluster'){
                $sql .= " where proposals.fyp_coordinator_status='approved'";
            }
        }

        // if($_SESSION['roles'] == 'supervisor'){
        //     $sql .= "where supervisor_id = ".$_SESSION['id'];
        // }

        if(isset($_REQUEST['title'])){
            if($_REQUEST['title'] != ''){
                if(strpos($sql, 'where') !== false){
                    $sql = $sql." and proposals.title = '".$_REQUEST['title']."'";
                }else{
                    $sql = $sql." where proposals.title = '".$_REQUEST['title']."'";
                }
            }
        }

        if(isset($_REQUEST['status'])){
            if($_REQUEST['status'] != ''){
                if(strpos($sql, 'where') !== false){
                    $sql = $sql." and proposals.status = '".$_REQUEST['status']."'";
                }else{
                    $sql = $sql." where proposals.status = '".$_REQUEST['status']."'";
                }
            }
        }

        $sql = $sql." order by id desc";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proposals[] = [
                    'id' => $row['id'],
                    "title" => $row['title'] ?? null, 
                    'submission_date' => $row['submission_date'] ?? null, 
                    'status' => $row['status'] ?? null, 
                    'student_id' => $row['student_id'] ?? null,
                    'student' => $row['student_name'] ?? null,
                    'attachment' => $row['attachment'] ?? null,
                    'attachment_name' => $row['attachment_name'] ?? null,
                    'fyp_coordinator_status' => $row['fyp_coordinator_status'] ?? null,
                    'supervisor_status' => $row['supervisor_status'] ?? null,
                    'reason' => $row['reason'] ?? null,
                    'supervisor' => $row['supervisor_name'] ?? null,
                ];
            }
            

            return  $proposals;
        }
    }

    function TotalProposalsStudent(){
        global $conn;
        if($_SESSION['roles'] == 'student'){
            $query = "select count(id) as total_student_proposal from proposals where user_id = '".$_SESSION['id']."'";
            $result = $conn->query($query);

            if($result->num_rows > 0){
                return $result->fetch_assoc();
            }
        }
        return false;
    }

    function deleteAttachment($proposal_id){
        global $conn;
        $sql = "update proposals set attachment=null,attachment_name=null where id='".$proposal_id."' ";
        $result = $conn->query($sql);

        if(!$result){
            echo 'query problem!';
            die();
        }
    }

    function search($title, $status){
        global $conn;
        $search_status = null;

        if($status != ''){
            $search_status = " and status = '".$status."'";
        }
    
        $sql = "select proposals.*, supervisor.name as supervisor_name ,  student.name as student_name from proposals 
        left join users as supervisor on proposals.supervisor_id = supervisor.id
        left join users as student on proposals.user_id = student.id  where proposals.title like '%".$title."%' ".$search_status." order by id desc";
        $result = $conn->query($sql);
    
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proposals[] = [
                    'id' => $row['id'],
                    "title" => $row['title'] ?? null, 
                    'submission_date' => $row['submission_date'] ?? null, 
                    'status' => $row['status'] ?? null, 
                    'supervisor' => $row['supervisor_name'] ?? null,
                    'student' => $row['student_name'] ?? null,
                    'attachment' => $row['attachment'] ?? null,
                    'attachment_name' => $row['attachment_name'] ?? null
                ];
            }

            echo(json_encode($proposals));
        }
    }

    function create($title, $submission_date ,$attachment ){
        global $conn;
        $target_dir = "C:/xampp/htdocs/fyp/assets/proposals/";

        session_start();

        $validateTitleQuery = "select * from proposals where title='".$title."'";
        $validateResult = $conn->query($validateTitleQuery);

        
        if($validateResult){
            if ($validateResult->num_rows > 0) {
                $_SESSION['error'] = 'Proposal Title '.$title.' already taken, Please enter again!';
                var_dump( $_SESSION['error']);
                header('Location: /fyp/add-proposal.php');
            }else{
                if($attachment['name'] != ''){
                    $target_file = $target_dir . basename($attachment["name"]);
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                    $unixTime = time();
                    if (!move_uploaded_file($attachment["tmp_name"], $target_dir.$unixTime.'.'.$imageFileType)) {
                        $_SESSION['error'] = 'Cant Move Attachment, Error!';
                        header('Location: /fyp/student-dashboard.php');
                    }
                }
            
                //var_dump($title, $start_date, $end_date);
                $formatedSubmissionDate = new DateTime($submission_date);
              
            
                $query = "insert into proposals (title,submission_date,status, supervisor_status ,fyp_coordinator_status, cluster_status,user_id) values('".$title."','".$formatedSubmissionDate->format('Y-m-d H:i:s')."','pending', 'pending' ,'pending','pending' ,'".$_SESSION['id']."')";
            
                if($attachment['name'] != ''){
                    $query = "insert into proposals (title,submission_date,status, supervisor_status, fyp_coordinator_status,cluster_status,user_id,attachment,attachment_name) values('".$title."','".$formatedSubmissionDate->format('Y-m-d H:i:s')."','pending','pending' ,'pending', 'pending','".$_SESSION['id']."','".($unixTime.'.'.$imageFileType)."','".($attachment['name'])."')";
                }
            
                $result = $conn->query($query);
                $_SESSION['success'] = 'Proposal Created!.';

                $getSupervisorSql = "select users.* from users left join staffs on staffs.user_id = users.id 
                where staffs.roles in ('supervisor','fyp_coordinator') and users.roles = 'staff'";
                $supervisorResult = $conn->query($getSupervisorSql);

                if ($supervisorResult->num_rows > 0) {
                    while ($row = $supervisorResult->fetch_assoc()) {
                        $notifications = 'Student '.$_SESSION['name'].' has created fyp proposals, please review the proposals!';
                        $notificationSql = "insert into notifications (user_id, notification,status) values ('".$row['id']."', '".$notifications."','new')";
                        $notificationResult = $conn->query($notificationSql);

                        if(!$notificationResult){
                            echo 'Notification Query Wrong';
                            die();
                        }                        
                    }
                }
            
                header('Location: /fyp/student-dashboard.php');
            }
        }else{
            $_SESSION['error'] = 'validate query problem';
            header('Location: /fyp/add-proposal.php');
        }

        
    }

    function update($title, $submission_date, $supervisor_id,  $attachment, $proposal_id){
        global $conn;
        $target_dir = "C:/xampp/htdocs/fyp/assets/proposals/";

        session_start();


        if($attachment['name'] != ''){
            $target_file = $target_dir . basename($attachment["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $unixTime = time();
            if (!move_uploaded_file($attachment["tmp_name"], $target_dir.$unixTime.'.'.$imageFileType)) {
                $_SESSION['error'] = 'Cant Move Attachment, Error!';
                header('Location: /fyp/student-dashboard.php');
            }
        }
    
        //var_dump($title, $start_date, $end_date);
        $formatedSubmissionDate = new DateTime($submission_date);
    
        $query = "update proposals set title='".$title."',submission_date='".$formatedSubmissionDate->format('Y-m-d H:i:s')."',status='pending', user_id='".$_SESSION['id']."', supervisor_id = '".$supervisor_id."', supervisor_status = 'pending' ";
    
        if($attachment['name'] != ''){
            $query = $query.",attachment='".($unixTime.'.'.$imageFileType)."',attachment_name='".($attachment['name'])."'";
        }

        $query = $query."where id = '".$proposal_id."'";
        $result = $conn->query($query);
       
        if($result){
            $_SESSION['success'] = 'Proposal Updated!';
            header('Location: /fyp/student-dashboard.php');
        }else{
            echo 'Query Wrong';
            die();
        }
       
    }
    

    function updateStatus($status, $reason, $proposal_id){
        global $conn;
        session_start();

        if($_SESSION['roles'] == 'supervisor'){
            $query = "update proposals set supervisor_status = '".$status."', reason = '".$reason."' where id = '".$proposal_id."'";
        }

        if($_SESSION['roles'] == 'fyp_coordinator'){
            $query = "update proposals set fyp_coordinator_status = '".$status."', reason = '".$reason."' where id = '".$proposal_id."'";
        }

        if($_SESSION['roles'] == 'cluster'){
            $query = "update proposals set status = '".$status."' , reason = '".$reason."' where id = '".$proposal_id."'";
        }

        $result = $conn->query($query);

        $userQuery = "select * from proposals where id='".$proposal_id."'";
        $result2 = $conn->query($userQuery);

        while ($row = $result2->fetch_assoc()) {
            $notification = $_SESSION['name']." ".$status." proposal ".$row['title'];
            $query2 = "insert into notifications (user_id,status,notification,created_at) values ('".$row['user_id']."','new' ,'".$notification."', '".date('Y-m-d H:i:s')."')";
            $result3 = $conn->query($query2);
        }

        $_SESSION['success'] = 'Proposal Approved';
        $_SESSION['success'] = 'Proposal '.$status.'!';
        header('Location: /fyp/proposals.php');
           
       
    }

    function edit($proposal_id){
        global $conn;
        $query =  "select proposals.*, supervisor.name as supervisor_name from proposals left join users as supervisor on proposals.supervisor_id = supervisor.id where proposals.id = '".$proposal_id."'";
        $result = $conn->query($query);
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proposals = [
                    'id' => $row['id'],
                    "title" => $row['title'] ?? null, 
                    'submission_date' => $row['submission_date'], 
                    'status' => $row['status'] ?? null, 
                    'supervisor_id' => $row['supervisor_id'] ?? null ,
                    'supervisor' => $row['supervisor_name'] ?? null,
                    'student' => $row['student_name'] ?? null,
                    'attachment' => $row['attachment'] ?? null,
                    'attachment_name' => $row['attachment_name'] ?? null
                ];
            }

            return  $proposals;
        }

    }

    function delete($proposal_id){
        global $conn;

        $query = "delete from proposals where id = '".$proposal_id."'";
        $result = $conn->query($query);
        
        if($result) {
            return 'success';
        }
    }

    function updateSupervisor($supervisor_id, $proposal_id){
        global $conn;
        $query = "update proposals set supervisor_id='".$supervisor_id."' where proposals.id = '".$proposal_id."'";
        $result = $conn->query($query);

        if($result) {
            header('Location: /fyp/add-proposal.php?type=edit&proposal='.$proposal_id);
        }
    }

    function getAllSupervisor(){
        global $conn;
        $query = "select users.id as supervisor_id , users.name as supervisor_name from users left join staffs on staffs.user_id = users.id where staffs.roles = 'supervisor' and staffs.cluster_status = 'allocated'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $supervisors[] = [
                    'supervisor_id' => $row['supervisor_id'],
                    'supervisor_name' => $row['supervisor_name'] ?? null,
                ];
            }
            
            return $supervisors;
        }
    }

    //($conn);

    

    
?>