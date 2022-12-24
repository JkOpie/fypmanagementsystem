<?php 
include('controllers/error.php');
 
 if(isset($_SESSION["error"])){
     phpAlert($_SESSION["error"]);
 }

 if(isset($_SESSION["success"])){
    phpAlert($_SESSION["success"]);
}
 
?>