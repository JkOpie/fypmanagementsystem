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
    }else{
        $department = $_POST['department'];
        $staff_id = $_POST['staff_id'];
    }

    if($password != $confirm_password ){
        $_SESSION["password_error"] = 'Invalid password or confirm password. Please try again!';
        header('Location: /fyp/register.php');
    }

    $query = "insert into users (name,email,roles,password,handphone) values ('".$name."','".$email."', '".$roles."','".$password."','".$handphone."')";
    $result = $conn->query($query);

    $query2 = "select id from users where email = '".$email."'";
    $result2 = $conn->query($query2);

    if($roles == 'student'){
        
        if($result){
            while($row = $result2->fetch_assoc()) {
                $query3 = "insert into students (user_id,matric_number,programmes) values ('".$row['id']."','".$matric_number."', '".$programmes."')";
                $conn->query($query3);
            }
        }else{
            $_SESSION['error'] = 'Invalid User Information, Please Try again!';
            header('Location: /fyp/register.php');
        }
    }else{
        if($result){
            while($row = $result2->fetch_assoc()) {
                $query3 = "insert into staffs (user_id,roles,staff_id,department) values ('".$row['id']."','".$roles."', '".$staff_id."', '".$department."')";
                $conn->query($query3);
            }
        }else{
            $_SESSION['error'] = 'Invalid User Information, Please Try again!';
            // var_dump(str_replace("_", "", $roles));
            // die();
            header('Location: /fyp/register-'.str_replace("_", "", $roles).'.php');
        }
    }

    // var_dump(str_replace("_", "", $roles));
    // die();

    $_SESSION['success'] = str_replace("_", "", $roles).' Successfully Created';

    header('Location: /fyp/register-'.str_replace("_", "", $roles).'.php');
?>