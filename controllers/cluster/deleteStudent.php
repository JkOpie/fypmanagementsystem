<?php
require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

$conn = setDbConnection();
session_start();

//var_dump($_REQUEST);
//die();

$query = "update students set supervisor_id=null where id={$_REQUEST['student_id']}";
$conn->query($query);

$_SESSION['success'] = 'Student Remove Successfully';

Header('Location: /fyp/assign_supervisor_student.php?supervisor_id='.$_REQUEST['supervisor_id']);

?>