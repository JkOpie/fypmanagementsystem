<?php
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();

    session_start();

    $tr = null;
    $path = 'C:/xampp/htdocs';
    $index = 0;

    $supervisors = null;
    $query = "select 
        proposals.id,
        proposals.title,
        proposals.user_id,
        users.name,
        users.email ,
        users.handphone,
        students.matric_number, 
        students.semester, 
        students.programmes, 
        students.supervisor_id, 
        proposals.cluster_status, 
        supervisor.name as supervisor_name
    from proposals 
    left join students on students.user_id = proposals.user_id
    left join users on users.id = proposals.user_id
    left join users as supervisor on supervisor.id = proposals.supervisor_id
    left join staffs on staffs.user_id = proposals.supervisor_id
    where staffs.cluster_id ='".$_SESSION['id']."'
    order by supervisor.name desc";

    $result = $conn->query($query);
    //var_dump($_SESSION);
    //die();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $supervisors[] = $row;
        }
    }

    //var_dump($supervisors);
    //die();

    foreach ($supervisors as $key => $value) {

        $tr = $tr.'
        <tr>
            <td>'.($index + 1).'</td>
            <td>'.$value['title'].'</td>
            <td>'.$value['name'].'</td>
            <td>'.$value['email'].'</td>
            <td>'.$value['handphone'].'</td>
            <td>'.($value['matric_number'] ?: '-').'</td>
            <td>'.($value['semester'] ?: '-') .'</td>
            <td>'.$value['supervisor_name'].'</td>
            <td>'.$value['cluster_status'].'</td>
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
            <th>Proposal Tittle</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Matric Number</th>
            <th>Semester</th>
            <th>Supervisor</th>
            <th>Status</th>
        </tr>
    </thead>  
    <tbody>
       '.$tr.'
    </tbody>
    </table></html>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('mypdf.pdf', 'I');
?>
