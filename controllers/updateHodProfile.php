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
    $department = $_POST['department'];
    $staff_id = $_POST['staff_id'];
    $hod_id = $_POST['hod_id'];
    

    $query = "update users set name ='".$name."' , email = '".$email."', handphone =  '".$handphone."' where id = '".$hod_id."'";
    $result = $conn->query($query);


    if($result) {
        $query3 = "update staffs set  staff_id ='{$staff_id}' , department ='{$department}' where user_id = '{$hod_id}'";
        //var_dump($query3);
        //die();
        $conn->query($query3);
    }else{
        $_SESSION['error'] = 'Invalid User Information, Please Try again!';
        header('Location: /fyp/profiles.php');
    }

    $_SESSION['success'] = 'Success Update HOD information';
    header('Location: /fyp/edit-hod.php?hod_id='.$hod_id);

    closeDbConnection($conn);
?>