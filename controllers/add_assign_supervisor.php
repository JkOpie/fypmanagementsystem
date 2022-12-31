<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();

    $sql = "update staffs set cluster_id='".$_POST['cluster_id']."' where id='".$_POST['staff_id']."'";
    $result = $conn->query($sql);

    header('location: /fyp/assign_supervisor.php?cluster_id='.$_POST['cluster_id']);
?>