<?php
$ds = DIRECTORY_SEPARATOR;
$base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
require_once("{$base_dir}controllers{$ds}db_connection.php");

$target_dir = "C:/xampp/htdocs/fyp/assets/profile/";
$target_file = $target_dir . basename($_FILES["user_picture"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
$conn = setDbConnection();
session_start();

// Check if image file is a actual image or fake image
if(isset($_FILES["user_picture"])) {
  $check = getimagesize($_FILES["user_picture"]["tmp_name"]);
  if($check !== false) {
  } else {
    $_SESSION['error'] = "File is not an image.";
    header("Location: /fyp/profiles.php");
  }
}

// Check file size
if ($_FILES["user_picture"]["size"] > 500000) {
    $_SESSION['error'] = "Sorry, your file is too large.";
    header("Location: /fyp/profiles.php");
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    $_SESSION['error'] = "Sorry, only JPG, JPEG, PNG files are allowed.";
    header("Location: /fyp/profiles.php");
}

$unixTime = time();

if (move_uploaded_file($_FILES["user_picture"]["tmp_name"], $target_dir.$unixTime.'.'.$imageFileType)) {
    $query = "update users set image = '".$unixTime.'.'.$imageFileType."' where id = '".$_SESSION['id']."'";
    if(!$conn->query($query)){
        $_SESSION['error'] = 'Insert query problem';
    }
    $_SESSION['image'] = $unixTime.'.'.$imageFileType;
    header("Location: /fyp/profiles.php");
   
} else {
    $_SESSION['error'] = "Sorry, there was an error uploading your file.";
}

?>