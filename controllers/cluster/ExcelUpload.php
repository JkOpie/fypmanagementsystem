<?php
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');

    $target_dir = "C:/xampp/htdocs/fyp/assets/excel/";
    $target_file = $target_dir . basename($_FILES["excel"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $conn = setDbConnection();
    session_start();

    // Check file size
    if ($_FILES["excel"]["size"] > 500000) {
        $_SESSION['error'] = "Sorry, your file is too large.";
        header("Location: /fyp/profiles.php");
    }
    
    $unixTime = time();
    $fileName = $unixTime.'.'.$imageFileType;

    $files = glob($target_dir.'*'); //get all file names
    foreach($files as $file){
        if(is_file($file))
        unlink($file); //delete file
    }
    
    if (move_uploaded_file($_FILES["excel"]["tmp_name"], $target_dir.$fileName )) {
        if ( $xlsx = \Shuchkin\SimpleXLSX::parse($target_dir.$fileName) ) {
            foreach( $xlsx->rows() as $key =>  $r ) {
                if($key > 0){
                    $sql = 'insert into users (name,email,handphone,roles,password) values ("'.$r[0].'","'.$r[1].'","'.$r[2].'","staff","Abc123!")';
                    $result = $conn->query($sql);
                    if($result){
                        $sql = 'insert into staffs (user_id,roles,staff_id,department) values ("'.$conn->insert_id.'","supervisor","'.$r[3].'","'.$r[4].'")';
                        $result = $conn->query($sql);
                    }
                }
            }
        } else {
            echo \Shuchkin\SimpleXLSX::parseError();
            die();
        }
        
        $_SESSION['success'] = "Supervisor Registered";
        header("Location: /fyp/dashboard.php");
       
    } else {
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        header("Location: /fyp/register-student.php");
    }