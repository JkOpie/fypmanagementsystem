<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();
    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "select * from users where email = '".$email."' and password = '".$password."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $_SESSION["id"]  = $row['id'];
            $_SESSION["name"] = $row["name"];
            $_SESSION["email"] = $row["email"];
            $_SESSION['image'] = $row['image'];

            if( $row["roles"] == 'staff'){
                $sql2 = "select * from staffs where user_id = '".$row['id']."'";
                $result2 = $conn->query($sql2);

                while($row2 = $result2->fetch_assoc()) {
                    $_SESSION["roles"] =  $row2["roles"];
                }

            }else{
                $_SESSION["roles"] =  $row["roles"];
            }

            //echo $_SESSION["roles"];
            header('Location: /fyp/dashboard.php');
        }
       
    }else{
        $_SESSION["login_error"] = 'Invalid email or password. Please try again!';
        $_SESSION["email"] =  $_POST['email'];
        header('Location: /fyp/login.php');
    }

    closeDbConnection($conn);
?>