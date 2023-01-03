<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "delete from users where id ='".$_REQUEST['cluster_id']."' ";
    $result = $conn->query($sql);

    $sql = "delete from staffs where user_id ='".$_REQUEST['cluster_id']."'";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Cluster deleted';
    header('location: /fyp/appoint-lead-cluster.php');
?>