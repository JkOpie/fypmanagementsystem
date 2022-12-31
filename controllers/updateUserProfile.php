<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");
    require("{$base_dir}controllers{$ds}error.php");

    $conn = setDbConnection();
    session_start();

    //core
    $name = $_POST['name'];
    $email = $_POST['email'];
    $handphone = $_POST['phone_number'];
 

    if($_SESSION['roles'] == 'student'){
        $matric_number = $_POST['matric_number'];
        $programmes = $_POST['programmes'];
    }else{
        $department = $_POST['department'];
        $staff_id = $_POST['staff_id'];
    }

    $query = "update users set name ='".$name."' , email = '".$email."', handphone =  '".$handphone."' where id = '".$_SESSION['id']."'";
    $result = $conn->query($query);

    if($_SESSION['roles'] == 'student'){
        
        if($result){
            $query3 = "update students set matric_number = '".$matric_number."', programmes = '".$programmes."'";
            if(isset($_POST['supervisor_id'])){
                $query3 .= ", supervisor_id='".$_POST['supervisor_id']."', status='pending'";
            }
            $query3 .=  " where user_id = '".$_SESSION['id']."'";
            //var_dump($query3);
            //die();
            $conn->query($query3);
        }else{
            $_SESSION['error'] = 'Invalid User Information, Please Try again!';
            header('Location: /fyp/profiles.php');
        }
        
    }else{

        if($result) {
            $query3 = "update staffs set staff_id = '".$staff_id."', department = '".$department."' where user_id = '".$_SESSION['id']."'";
            $conn->query($query3);
        }else{
            $_SESSION['error'] = 'Invalid User Information, Please Try again!';
            header('Location: /fyp/profiles.php');
        }
    }

    $_SESSION['name'] = $name ;
    $_SESSION['email'] = $email ;

    header('Location: /fyp/profiles.php');

    closeDbConnection($conn);
?>