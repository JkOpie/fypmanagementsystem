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
    $roles = $_POST['roles'];
    $handphone = $_POST['phone_number'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    if($roles == 'student'){
        $matric_number = $_POST['matric_number'];
        $programmes = $_POST['programmes'];
    }else if($roles == 'supervisor' || $roles == 'hod'|| $roles == 'fyp_coordinator' || $roles == 'cluster'){
        $department = $_POST['department'];
        $staff_id = $_POST['staff_id'];
    }

    if($password != $confirm_password ){
        $_SESSION["password_error"] = 'Invalid password or confirm password. Please try again!';
        header('Location: /fyp/register.php');
    }
    $userRole = null;

    if($roles == 'supervisor' || $roles == 'hod'|| $roles == 'fyp_coordinator' || $roles == 'cluster'){
        $userRole = 'staff';
    }

    $query = "insert into users (name,email,roles,password,handphone) values ('".$name."','".$email."', '".$userRole."','".$password."','".$handphone."')";
    $result = $conn->query($query);

    if($roles == 'student'){
        $query3 = "insert into students (user_id,matric_number,programmes) values ('".$conn->insert_id."','".$matric_number."', '".$programmes."')";
        $conn->query($query3);
    }else if($roles == 'admin'){

    }
    else{
        if($roles == 'cluster'){
            $query3 = "insert into staffs (user_id,roles,staff_id,department,cluster_status) values ('".$conn->insert_id."','".$roles."', '".$staff_id."', '".$department."', 'cluster')";
        }else{
            $query3 = "insert into staffs (user_id,roles,staff_id,department) values ('".$conn->insert_id."','".$roles."', '".$staff_id."', '".$department."')";
        }
       
        $conn->query($query3);
    }

   
    $_SESSION['success'] = str_replace("_", "", $roles).' Successfully Created';
    if($roles == 'fyp_coordinator'){
        header('Location: /fyp/fyp-coordinator-list.php');
        die();
    }elseif($roles == 'cluster'){
        header('Location: /fyp/appoint-lead-cluster.php');
        die();
    }elseif($roles == 'supervisor'){
        header('Location: /fyp/supervisor_list.php');
        die();
    }elseif($roles == 'hod'){
        header('Location: /fyp/hod-list.php');
        die();
    }
    header('Location: /fyp/register-'.str_replace("_", "", $roles).'.php');
?>