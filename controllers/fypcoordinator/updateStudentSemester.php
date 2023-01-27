<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $student_id = $_POST['student_id'];
    $semester = $_POST['semester'];

    $sql = "update students set semester='".$semester."'  where id = '".$student_id."'";
    $result = $conn->query($sql);

    $_SESSION['success'] = 'Student Semester Updated';
    header('location: /fyp/finalize_supervisor.php');
?>