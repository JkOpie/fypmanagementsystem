<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "delete from student_supervisor_preferrences where id ='".$_GET['student_supervisor_preferrences_id']."' ";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Supervisor Preferrences deleted';
    header('location: /fyp/supervisor_preferences.php');
?>