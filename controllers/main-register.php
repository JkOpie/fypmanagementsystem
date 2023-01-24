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
    $semester = $_POST['semester'];
    $confirm_password = $_POST['confirm_password'];

    if($roles == 'student'){
        $matric_number = $_POST['matric_number'];
        $programmes = $_POST['programmes'];
    }

    if($password != $confirm_password ){
        $_SESSION["password_error"] = 'Invalid password or confirm password. Please try again!';
        header('Location: /fyp/admin-register.php');
    }

    $userRole = null;

    // if($roles == 'supervisor' || $roles == 'hod'|| $roles == 'fyp_coordinator' || $roles == 'cluster'){
    //     $userRole = 'staffs';
    // }

    $query = "insert into users (name,email,roles,password,handphone) values ('".$name."','".$email."', '".$userRole."','".$password."','".$handphone."')";
    $result = $conn->query($query);

    if($roles == 'student'){
        $query3 = "insert into students (user_id,matric_number,programmes,semester) values ('".$conn->insert_id."','".$matric_number."', '".$programmes."','".$semester."')";
        $conn->query($query3);
    }
   
    $_SESSION['success'] = strtoupper($roles).' Successfully Created';
    header('Location: /fyp/admin-login.php?type='.$roles);
?>