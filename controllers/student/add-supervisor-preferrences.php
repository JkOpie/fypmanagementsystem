<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $sql = "select * from student_supervisor_preferrences where user_id='".$_SESSION['id']."'";
    $result = $conn->query($sql);

    if ($result->num_rows < 3) {
        $sql = "insert into student_supervisor_preferrences (user_id,supervisor_id) values ('".$_SESSION['id']."','".$_POST['supervisor_id']."')";
        ///var_dump($sql);
        $result = $conn->query($sql);

        $_SESSION['success'] = 'Supervisor preferences added';
        header('location: /fyp/supervisor_preferences.php');
    }

    $_SESSION['error'] = 'Maximum 3 supervisor preferences!';
    header('location: /fyp/supervisor_preferences.php');
?>