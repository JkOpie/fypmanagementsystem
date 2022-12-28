<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();
    session_start();


    if($_POST['password'] != $_POST['confirm_password']){
        $_SESSION["forgot_error"] = 'Invalid password or confirm password. Please try again!';
        header('Location: /fyp/forgot-password.php?type='.$_POST['type']);
    }

    if($_POST['type'] == 'student'){
        $sql = "select users.* from users left join students on students.user_id = users.id where users.email = '".$_POST['email']."' and students.matric_number = '".$_POST['matric_number']."'";
    }else{
        $sql = "select users.* from users left join staffs on staffs.user_id = users.id where users.email = '".$_POST['email']."' and staffs.staff_id = '".$_POST['staff_id']."'";
    }
    
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
            $sql2 = "update users set password = '".$_POST['password']."' where id = '".$row['id']."'";
            $result2 = $conn->query($sql2);

            if($result){
                $_SESSION["success"] = 'Password Updated!. Please Login.';
                header('Location: /fyp/admin-login.php?type'.$_POST['typpe']);
            }else{
                $_SESSION["forgot_error"] = 'SQL error!';
                header('Location: /fyp/forgot-password.php?type'.$_POST['typpe']);
            }
        
        }
       
    }else{
        $_SESSION["forgot_error"] = 'Invalid information. Please try again!';
        header('Location: /fyp/forgot-password.php?type='.$_POST['type']);
    }

    closeDbConnection($conn);
?>