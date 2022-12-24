<?php

function setDbConnection(){
    $mysqli = new mysqli("127.0.0.1:3306","root","","laravelfyp");

    // Check connection
    if ($mysqli->connect_errno) {
      echo "Failed to connect to MySQL: " . $mysqli->connect_error;
      exit();
    }

    return $mysqli;
}

function closeDbConnection($mysqli){
    $mysqli->close();
}

?>