<?php

use FontLib\EOT\Header;

    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();
    $query = "delete from users where id ='".$_REQUEST['hod_id']."' ";
    $conn->query($query);

    $query = "delete from staffs where user_id ='".$_REQUEST['hod_id']."' ";
    $conn->query($query);

    Header('Location: /fyp/hod-list.php');
?>