<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    if($_POST['supervisor_id'] != "Select Supervisor"){
        $sql = "select * from student_supervisor_preferrences where user_id='".$_SESSION['id']."'";
        $result = $conn->query($sql);
    
        if ($result->num_rows < 3) {
    
            $sql = "select * from student_supervisor_preferrences where user_id='".$_SESSION['id']."' and supervisor_id='".$_POST['supervisor_id']."'";
            $result = $conn->query($sql);
    
            if ($result->num_rows == 0) {
                $sql = "insert into student_supervisor_preferrences (user_id,supervisor_id) values ('".$_SESSION['id']."','".$_POST['supervisor_id']."')";
                $result = $conn->query($sql);
    
                $_SESSION['success'] = 'Supervisor preferences added';
                header('location: /fyp/supervisor_preferences.php');
            }else{
                $_SESSION['error'] = 'Error : Preference Supervisor already exists!';
                header('location: /fyp/supervisor_preferences.php');
            }
    
          
        }else{
            $_SESSION['error'] = 'Maximum 3 supervisor preferences!';
            header('location: /fyp/supervisor_preferences.php');
        }
    }else{
        $_SESSION['error'] = 'Erro : Please select one supervisor!';
        header('location: /fyp/supervisor_preferences.php');
    }

    


?>