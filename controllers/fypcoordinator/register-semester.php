<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "insert into semesters (name) values ('".$_POST['name']."') ";
    $result = $conn->query($sql);
   
    $_SESSION['success'] = 'Semester Added!';
    header('location: /fyp/semester.php');
?>