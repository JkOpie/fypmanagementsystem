<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $supervisor_id = $_POST['supervisor_id'];
    $user_id = $_POST['user_id'];

    $sql = "update students set supervisor_id='".$supervisor_id."', status='pending' where user_id = '".$user_id."'";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Supervisor Updated';
    header('location: /fyp/profiles.php');
?>