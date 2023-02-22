<?php
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();

    session_start();

    $tr = null;
    $path = 'C:/xampp/htdocs';
    $index = 0;

    $students = null;
    $query = "
    select 
        users.name,
        users.handphone,
        users.email,
        students.matric_number,
        students.semester,
        students.programmes,
        students.supervisor_id,
        students.user_id,
        supervisor.name as supervisor_name
    from students 
    left join users on users.id = students.user_id
    left join users as supervisor on supervisor.id = students.supervisor_id
    where programmes='".$_SESSION['department']."'
    order by students.id desc";

    $result = $conn->query($query);
    //var_dump($_SESSION);
    //die();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $students[] = $row;
        }
    }

    //var_dump($supervisors);
    //die();

    foreach ($students as $key => $value) {

        $tr = $tr.'
        <tr>
            <td>'.($index + 1).'</td>
            <td>'.$value['name'].'</td>
            <td>'.$value['email'].'</td>
            <td>'.$value['handphone'].'</td>
            <td>'.($value['matric_number'] ?: '-').'</td>
            <td>'.($value['semester'] ?: '-') .'</td>
            <td>'.$value['supervisor_name'].'</td>
        </tr>
        ';

        $index++;
        
    }

    //var_dump($tr);
    //die();
    
  
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
        <div style="text-align: center; font-size: 18pt; display:block">Final Year Title Management</div>
    <hr>
    <h4>Assign Supervisor To Student Report</h4>
    <table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Matric Number</th>
            <th>Semester</th>
            <th>Supervisor</th>
        </tr>
    </thead>  
    <tbody>
       '.$tr.'
    </tbody>
    </table></html>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('mypdf.pdf', 'I');
?>
