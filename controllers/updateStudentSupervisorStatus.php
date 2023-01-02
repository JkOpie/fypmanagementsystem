<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();
    $status = null;
   
    if($_REQUEST['status'] == 'reject' || $_REQUEST['delete']){
        $_REQUEST['status'] = null;
    }

    $sql = "update students set status='".$_REQUEST['status']."' where id='".$_REQUEST['student_id']."'";
    $result = $conn->query($sql);

    header('location: /fyp/student_supervisor.php');
?>