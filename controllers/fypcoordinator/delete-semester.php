<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "delete from semesters where id='".$_REQUEST['id']."'";
    $result = $conn->query($sql);
   
    $_SESSION['success'] = 'Semester Edited!';
    header('location: /fyp/semester.php');
?>