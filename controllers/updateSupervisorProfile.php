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
    $supervisor_id = $_POST['supervisor_id'];
    

    $query = "update users set name ='".$name."' , email = '".$email."', handphone =  '".$handphone."' where id = '".$supervisor_id."'";
    $result = $conn->query($query);


    if($result) {
        $query3 = "update staffs set  staff_id ='{$staff_id}' , department ='{$department}' where user_id = '{$supervisor_id}'";
        //var_dump($query3);
        //die();
        $conn->query($query3);
    }else{
        $_SESSION['error'] = 'Invalid User Information, Please Try again!';
        header('Location: /fyp/profiles.php');
    }

    $_SESSION['success'] = 'Success Update Supervisor information';
    header('Location: /fyp/edit-supervisor.php?supervisor_id='.$supervisor_id);

    closeDbConnection($conn);
?>