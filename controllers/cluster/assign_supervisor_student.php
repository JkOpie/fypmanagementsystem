<?php
require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

$conn = setDbConnection();
$query = "update students set supervisor_id={$_POST['supervisor_id']} where user_id={$_POST['student_id']}";

$conn->query($query);

Header('Location: /fyp/supervisor_list.php');
?>