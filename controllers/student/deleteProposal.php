<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "delete from proposals where id ='".$_REQUEST['proposal_id']."' ";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Proposal deleted';
    header('location: /fyp/student-dashboard.php');
?>