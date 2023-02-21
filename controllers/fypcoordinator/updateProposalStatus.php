<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "update proposals set fyp_coordinator_status='".$_GET['status']."'  where id = '".$_GET['proposal_id']."'";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Proposals collected and Send to Lead Cluster';
    header('location: /fyp/proposals.php');
?>