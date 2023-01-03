<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}controllers{$ds}db_connection.php");

$conn = setDbConnection();
$query = "update students set supervisor_id={$_POST['supervisor_id']} , status='pending' where id={$_POST['student_id']}";
//var_dump($query);
//die();
$conn->query($query);

Header('Location: /fyp/assign_supervisor_student.php?supervisor_id='.$_POST['supervisor_id']);
?>