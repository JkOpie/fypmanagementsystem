<?php
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();

    $tr = null;
    $path = 'C:/xampp/htdocs';
    $index = 0;

    $query = "select 
        proposals.id,
        proposals.title,
        users.name,
        users.email ,
        users.handphone,
        students.matric_number, 
        students.semester, 
        students.programmes, 
        students.supervisor_id, 
        proposals.supervisor_status, 
        supervisor.name as supervisor_name 
    from proposals 
    left join students on students.user_id = proposals.user_id
    left join users on users.id = proposals.user_id
    left join users as supervisor on supervisor.id = proposals.supervisor_id
    where proposals.cluster_status = 'approved'
    order by supervisor.name desc";

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $image = null;
            if(isset($_SESSION['image'])){
                $image =  '/fyp/assets/profile/'.$row['image'];
            }else{
                $image = '/fyp/assets/img/illustrations/profiles/profile-1.png';
            }
            $tr = $tr.'
            <tr>
                <td>'.($index + 1).'</td>
                <td>'.$row['title'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['handphone'].'</td>
                <td>'.($row['semester'] ?: '-').'</td>
                <td>'.($row['supervisor_name'] ?: '-') .'</td>
                <td>'.($row['supervisor_status'] ?: '-') .'</td>
            </tr>
            ';

            $index++;
        }
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
    <h4>Finalize Supervisors Reports</h4>
    <table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Proposal Tittle</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
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
