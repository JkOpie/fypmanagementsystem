<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "delete from users where id ='".$_REQUEST['cluster_id']."' ";
    $result = $conn->query($sql);

    $sql = "delete from staffs where user_id ='".$_REQUEST['cluster_id']."'";
    $result = $conn->query($sql);

    $query = "update staffs set cluster_id=null where cluster_id={$_REQUEST['cluster_id']}";
    $conn->query($query);

    $_SESSION['success'] = 'Supervisor addded';
    header('location: /fyp/cluster-listing.php');
?>