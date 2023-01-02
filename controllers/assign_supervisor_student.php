<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}controllers{$ds}db_connection.php");

$conn = setDbConnection();
$query = 'update students set supervisor_id = "'.$_POST['supervisor_id'].'" , status="pending", where id = '.$_POST['student_id'];
$conn->query($query);

Header('Location: /fyp/supervisor_list.php');
?>