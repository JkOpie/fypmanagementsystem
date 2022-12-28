<?php

use FontLib\EOT\Header;

    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();
    $query = 'update staffs set cluster_status = "lead_cluster" where id = '.$_POST['cluster_id'];
    $conn->query($query);

    Header('Location: /fyp/appoint-lead-cluster.php');
?>