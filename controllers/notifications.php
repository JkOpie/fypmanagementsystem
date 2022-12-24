<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();

    if(isset($_POST['type'])){
        $type = $_POST['type'];

        if($type == 'updateNotificationStatus'){
            updateNotificationStatus($_POST['notification_id']);
        }
    }

    function  updateNotificationStatus($notification_id){
        global $conn;
        $sql = "update notifications set status = 'read' where id = '".$notification_id."'";
        $result = $conn->query($sql);

        if(!$result){
            echo 'Error Query';
        }
    }

    
    function getNotifications(){
        global $conn;
        $sql = "select notifications.*, users.name from notifications
        left join users on users.id = notifications.user_id
        where notifications.user_id = '".$_SESSION['id']."'
        order by id desc";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $proposals[] = $row;
            }
            return  $proposals;
        }
    }
    
?>