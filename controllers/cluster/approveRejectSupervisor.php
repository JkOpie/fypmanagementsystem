<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "update proposals set cluster_status='".$_GET['cluster_status']."' where id='".$_GET['proposal_id']."'";
    $result = $conn->query($sql);

    $sql = 'select * from staffs where roles="fyp_coordinator"';
    $result = $conn->query($sql);

    //var_dump($_SESSION);
    $fyp_coordinatior = null;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $fyp_coordinatior[] = $row;
        }
    }

    if($_GET['cluster_status'] == 'rejected'){
        $notifications = 'Cluster '.$_SESSION['name'].' has '.$_GET['cluster_status'].' supervisor, please reapply the supervisors in the proposals!';
        $notificationSql = "insert into notifications (user_id, notification,status) values ('".$_GET['student_id']."', '".$notifications."','new')";
        $notificationResult = $conn->query($notificationSql);
    }else{
        if(isset($fyp_coordinatior)){
            foreach ($fyp_coordinatior as $key => $value) {
                $notifications = 'Cluster '.$_SESSION['name'].' has '.$_GET['cluster_status'].' supervisor, please finalize the supervisors!';
                $notificationSql = "insert into notifications (user_id, notification,status) values ('".$value['user_id']."', '".$notifications."','new')";
                $notificationResult = $conn->query($notificationSql);
            }
        }  
    }
    
    
    

    $_SESSION['success'] = 'Supervisor approved';
    header('location: /fyp/supervisor_list.php');
?>