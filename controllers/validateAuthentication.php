<?php
if(!isset($_SESSION['id'])){
    $_SESSION['error'] = 'Session Expired, Please Login Again!';
    header('Location: /fyp/admin-login.php?type=student');
}
?>