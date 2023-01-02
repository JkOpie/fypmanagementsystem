<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "update staffs set cluster_id='".$_POST['cluster_id']."' where id='".$_POST['staff_id']."'";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Supervisor addded';
    header('location: /fyp/add_assign_supervisor.php?cluster_id='.$_POST['cluster_id']);
?>