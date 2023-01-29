<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "update semesters set name='".$_POST['name']."' where id='".$_POST['id']."'";
    $result = $conn->query($sql);
   
    $_SESSION['success'] = 'Semester Edited!';
    header('location: /fyp/semester.php');
?>