<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "delete from users where id ='".$_REQUEST['student_id']."' ";
    $result = $conn->query($sql);

    $sql = "delete from students where user_id ='".$_REQUEST['student_id']."'";
    $result = $conn->query($sql);

    $query = "delete from proposals where user_id={$_REQUEST['student_id']}";
    $conn->query($query);

    $_SESSION['success'] = 'Student deleted';
    header('location: /fyp/finalize_supervisor.php');
?>