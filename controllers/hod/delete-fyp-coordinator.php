<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "delete from users where id ='".$_REQUEST['fyp_coordinator_id']."' ";
    $result = $conn->query($sql);

    $sql = "delete from staffs where user_id ='".$_REQUEST['fyp_coordinator_id']."'";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Fyp Coordinator deleted';
    header('location: /fyp/fyp-coordinator-list.php');
?>