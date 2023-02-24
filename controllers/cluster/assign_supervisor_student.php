<?php
require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

$conn = setDbConnection();
session_start();

if($_POST['supervisor_id'] != 'Please Select Supervisor'){

    $sql = "select count(*) as total_student_under_supervisor from students where supervisor_id={$_POST['supervisor_id']}";
    $result = $conn->query($sql);

    $total_student_under_supervisor = null;

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $total_student_under_supervisor = $row['total_student_under_supervisor'];
        }

    }else{
        $_SESSION['error'] = "Error!: ";
        Header('Location: /fyp/supervisor-list.php');
    }

    if(intval($total_student_under_supervisor) < 3){
        $query = "update students set supervisor_id={$_POST['supervisor_id']},status='pending' where user_id={$_POST['student_id']}";
        $conn->query($query);
    
        $_SESSION['success'] = "Success! Student Assign Under Supervisor";
        Header('Location: /fyp/supervisor-list.php');
    }else{
        $_SESSION['error'] = "Error!: Supervisor limit. Maximum 3 student per supervisor!";
        Header('Location: /fyp/supervisor-list.php');
    }

   
}else{
    $_SESSION['error'] = "Please select one supervisor";
    Header('Location: /fyp/supervisor-list.php');
}



?>