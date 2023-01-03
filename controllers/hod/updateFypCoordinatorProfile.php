<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    //core
    $name = $_POST['name'];
    $email = $_POST['email'];
    $handphone = $_POST['phone_number'];
    $department = $_POST['department'];
    $staff_id = $_POST['staff_id'];
    $fyp_coordinator_id = $_POST['fyp_coordinator_id'];
    

    $query = "update users set name ='".$name."' , email = '".$email."', handphone =  '".$handphone."' where id = '".$fyp_coordinator_id."'";
    $result = $conn->query($query);


    if($result) {
        $query3 = "update staffs set  staff_id ='{$staff_id}' , department ='{$department}' where user_id = '{$fyp_coordinator_id}'";
        //var_dump($query3);
        //die();
        $conn->query($query3);
    }else{
        $_SESSION['error'] = 'Invalid User Information, Please Try again!';
        header('Location: /fyp/profiles.php');
    }

    $_SESSION['success'] = 'Success Update Fyp Coordinator information';
    header('Location: /fyp/edit-fyp_coordinator.php?fyp_coordinator_id='.$fyp_coordinator_id);

    closeDbConnection($conn);
?>