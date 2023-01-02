<?php
require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

$conn = setDbConnection();
session_start();

$query = "update staffs set cluster_id=null where user_id={$_REQUEST['supervisor_id']}";
$conn->query($query);

$_SESSION['success'] = 'Supervisor deleted';
Header('Location: /fyp/add_assign_supervisor.php?cluster_id='.$_REQUEST['cluster_id']);
?>