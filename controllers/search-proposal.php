<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();
    $sql = "select * from proposals where title='{$_POST['title']}'";
    //var_dump($sql);
    $result = $conn->query($sql);

    if($result->num_rows > 0){
        echo 'notAvailable';
    }
    echo 'available';
   
   
?>