<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    $conn = setDbConnection();

    if(isset($_POST['type'])){
        $type = $_POST['type'];

        if($type == 'updateFypStatus'){
            updateFypStatus($_POST['user_id'],$_POST['allocated']);
        }

        if($type == 'updateClusterStatus'){
            updateClusterStatus($_POST['user_id'],$_POST['allocated']);;
        }

        if($type == 'updateStatus'){
            updateStatus($_POST['user_id'],$_POST['allocated']);;
        }

        if($type == 'createSupervisor'){
           
            createSupervisor(
                $_POST['name'], 
                $_POST['email'],
                $_POST['handphone'],
                $_POST['department'],
                $_POST['staff_id'],
                $_POST['password'],
                $_POST['confirm_password']
            );

        }

        if($type == 'assignSupervisor'){
            assignSupervisor($_POST['supervisor_id'], $_POST['student_id']);
        }

        if($type == 'updateSupervisorStatus'){
            updateSupervisorStatus($_POST['student_id'], $_POST['status']);
        }
    }

    function updateSupervisorStatus($student_id, $status){
        global $conn;
        session_start();
        $query = "update students set status='".$status."' where id = '".$student_id."'";
        $result = $conn->query($query);

        if($result){

            $query = "select users.id, users.name as student_name, supervisor.name as supervisor_name from students
            left join users on students.user_id = users.id
            left join users as supervisor on supervisor.id = students.supervisor_id
            where students.id = '".$student_id."'";
            $userResult = $conn->query($query);

            if ($userResult->num_rows > 0) {

                while ($row = $userResult->fetch_assoc()) {
                    $notification = $_SESSION['name']." ".$status." ".$row['supervisor_name'].' as your supervisor';
                    $query2 = "insert into notifications (user_id,status,notification,created_at) values ('".$row['id']."','new' ,'".$notification."', '".date('Y-m-d H:i:s')."')";
                    $conn->query($query2);
                }
               
            }

            
        }else{
            $_SESSION['error'] = 'Update Error, Please check query!';
            //header('Location: /fyp/finalize_supervisor.php');
        }


    }

    function updateFypStatus($user_id, $allocated){
        global $conn;
        $allocatedQuery = null;
        if($allocated == 'true'){
            $allocatedQuery = "fypcoordinator_status='allocated'";
        }else{
            $allocatedQuery = "fypcoordinator_status=null";
        }
        $query = "update staffs set ".$allocatedQuery." where user_id = '".$user_id."'";
        $result = $conn->query($query);
        
        if(!$result){
            $_SESSION['error'] = 'Update Error, Please check query!';
            header('Location: /fyp/allocate_supervisor.php');
        }
    }

    
    function updateClusterStatus($user_id, $allocated){
        global $conn;
        $allocatedQuery = null;
        if($allocated == 'true'){
            $allocatedQuery = "cluster_status='allocated'";
        }else{
            $allocatedQuery = "cluster_status=null";
        }
        $query = "update staffs set ".$allocatedQuery." where user_id = '".$user_id."'";
        $result = $conn->query($query);
        
        if(!$result){
            $_SESSION['error'] = 'Update Error, Please check query!';
            header('Location: /fyp/allocate_supervisor.php');
        }
    }

    function updateUserStatus($user_id, $allocated){
        global $conn;
        $allocatedQuery = null;
        if($allocated == 'true'){
            $allocatedQuery = "status='allocated'";
        }else{
            $allocatedQuery = "status=null";
        }
        $query = "update staffs set ".$allocatedQuery." where user_id = '".$user_id."'";
        $result = $conn->query($query);
        
        if(!$result){
            $_SESSION['error'] = 'Update Error, Please check query!';
            header('Location: /fyp/allocate_supervisor.php');
        }
    }

    function getSupervisor(){
        global $conn;
        $query = "select users.* , staffs.staff_id as staff_id, staffs.department as staff_department, staffs.roles as staff_role, staffs.fypcoordinator_status, staffs.cluster_status  from users left join staffs on staffs.user_id = users.id where staffs.roles = 'supervisor' and staffs.status = 'allocated'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $supervisors[] = $row;
            }
            return $supervisors;
        }
    }

  
    function getSupervisorCluster(){
        global $conn;
        $query = "select users.* , staffs.staff_id as staff_id, staffs.department as staff_department, staffs.roles as staff_role, staffs.fypcoordinator_status, staffs.cluster_status  from users left join staffs on staffs.user_id = users.id where staffs.roles = 'supervisor' and staffs.cluster_status = 'allocated'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $supervisors[] = $row;
            }
            return $supervisors;
        }
    }

    function getUserSupervisor(){
        global $conn;
        $query = "select users.* , staffs.staff_id as staff_id, staffs.department as staff_department, staffs.roles as staff_role, staffs.fypcoordinator_status, staffs.cluster_status  from users left join staffs on staffs.user_id = users.id where staffs.roles = 'supervisor'";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $supervisors[] = $row;
            }
            return $supervisors;
        }
    }

    function createSupervisor($name, $email,$handphone,$department,$staff_id,$password,$confirm_password){
        global $conn;
        session_start();
    
        if($password != $confirm_password ){
            $_SESSION["password_error"] = 'Invalid password or confirm password. Please try again!';
            header('Location: /fyp/add_supervisor.php');
        }
    
        $query = "insert into users (name,email,roles,password,handphone) values ('".$name."','".$email."', 'staff','".$password."','".$handphone."')";
        $result = $conn->query($query);
    
        $query2 = "select id from users where email = '".$email."'";
        $result2 = $conn->query($query2);
    
    
        if($result2){
            while($row = $result2->fetch_assoc()) {
                $query3 = "insert into staffs (user_id,roles,staff_id,department) values ('".$row['id']."','supervisor', '".$staff_id."', '".$department."')";
                $conn->query($query3);
            }
        }else{
            $_SESSION['error'] = 'Invalid User Information, Please Try again!';
            header('Location: /fyp/register.php');
        }
        
        $_SESSION['success'] = 'Supervisor Created!';
    
        header('Location: /fyp/add_supervisor.php');
    }

    function getAllStudent(){
        global $conn;
        $query = "select users.* , students.id as student_id, students.matric_number, students.programmes, students.supervisor_id, students.status, supervisor.name as supervisor_name from users 
        left join students on students.user_id = users.id
        left join users as supervisor on supervisor.id = students.supervisor_id
        where users.roles = 'student' order by users.id desc";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
            return $students;
        }
    }

    function getStudentSupervisorPending(){
        global $conn;
        $query = "select users.* , students.id as student_id, students.matric_number, students.semester, students.programmes, students.supervisor_id, students.status, supervisor.name as supervisor_name from users 
        left join students on students.user_id = users.id
        left join users as supervisor on supervisor.id = students.supervisor_id
        where users.roles = 'student' order by users.id desc";
        $result = $conn->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $students[] = $row;
            }
            return $students;
        }
    }

    function assignSupervisor($supervisor_id, $student_id){
        global $conn;
        $query = "update students set supervisor_id = '".$supervisor_id."', status = 'pending' where id = '".$student_id."'";
        $result = $conn->query($query);

        if ($result) {
            header('Location: /fyp/assign_supervisor.php');
        }
    }

    

?>