<?php
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();

    session_start();

    $tr = null;
    $path = 'C:/xampp/htdocs';
    $index = 0;

    $supervisors = null;
    $query = "select users.* , staffs.id as cluster_id,  staffs.roles as staff_role ,staffs.staff_id, staffs.department, staffs.cluster_status, staffs.user_id from users 
    left join staffs on staffs.user_id = users.id
    where staffs.roles = 'supervisor' and cluster_id ='".$_SESSION['id']."'  order by users.id desc";

    $result = $conn->query($query);
    //var_dump($_SESSION);
    //die();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $supervisors[] = $row;
        }
    }

    foreach ($supervisors as $key => $value) {

        $students = [];

        if(isset($value['user_id'])){
            $sql = "select students.*, users.name from students left join users on users.id = students.user_id where students.supervisor_id='".$value['user_id']."'"; 
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $students[] = $row['name'];
                }
            }
        }

        $tr = $tr.'
        <tr>
            <td>'.($index + 1).'</td>
            <td>'.$value['name'].'</td>
            <td>'.$value['staff_role'].'</td>
            <td>'.$value['email'].'</td>
            <td>'.$value['handphone'].'</td>
            <td>'.($value['staff_id'] ?: '-').'</td>
            <td>'.($value['department'] ?: '-') .'</td>
            <td>'.(isset($students) ? implode(',<br>', $students) : '-').'</td>
        </tr>
        ';

        $index++;
        
    }
      
  
    // echo htmlspecialchars($path.'/fyp/assets/img/illustrations/profiles/profile-1.png');
    // die();
  
    $mpdf = new \Mpdf\Mpdf();

    $html = '
    <html>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
      }
      
      th, td {
        text-align: left;
        padding: 8px;
      }
      
      tr:nth-child(even){background-color: #f2f2f2}
      
      th {
        background-color: #04AA6D;
        color: white;
      }
      .user-img { 
        width: 50px;
        height: 50px;
    }
    </style>
    <hr>
        <div style="text-align: center; font-size: 18pt; display:block">Final Year title Management</div>
    <hr>
    <h4>Assign Supervisor To Student Report</h4>
    <table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Position</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Staff ID</th>
            <th>Department</th>
            <th>Student</th>
        </tr>
    </thead>  
    <tbody>
       '.$tr.'
    </tbody>
    </table></html>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('mypdf.pdf', 'I');
?>
