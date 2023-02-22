<?php
require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

$conn = setDbConnection();
session_start();

if($_POST['supervisor_id'] != 'Please Select Supervisor'){
    $query = "update students set supervisor_id={$_POST['supervisor_id']} where user_id={$_POST['student_id']}";

    $conn->query($query);

    $_SESSION['success'] = "Student Assign Under Supervisor";
    Header('Location: /fyp/supervisor_list.php');
}

$_SESSION['error'] = "Please select one supervisor";
Header('Location: /fyp/supervisor_list.php');

?>