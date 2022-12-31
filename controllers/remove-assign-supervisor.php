<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();

    $sql = 'update staffs set cluster_id=null where id='.$_POST['staff_id'];
    $result = $conn->query($sql);

    echo $result;
?>