<?php
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');

    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");
    $conn = setDbConnection();

    $tr = null;
    $path = 'C:/xampp/htdocs';

    $query = 'select proposals.*, users.name, users.email, users.handphone, supervisor.name as supervisor_name
    from proposals
    left join users on users.id = proposals.user_id 
    left join users as supervisor on supervisor.id = proposals.supervisor_id
    order by id desc';

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            
            $tr = $tr.'
            <tr>
                <td>'.$row['title'].'</td>
                <td>'.$row['submission_date'].'</td>
                <td>'.$row['name'].'</td>
                <td>'.$row['supervisor_name'].'</td>
                <td>'.$row['fyp_coordinator_status'].'</td>
                <td>'.$row['reason'].'</td>
            </tr>
            ';
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
    <h4>Proposals Reports</h4>
    <table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>Proposal Tittle</th>
            <th>Submission Date</th>
            <th>Student Name</th>
            <th>Supervisor Name</th>
            <th>Status</th>
            <th>Reason</th>
        </tr>
    </thead>  
    <tbody>
       '.$tr.'
    </tbody>
    </table></html>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('mypdf.pdf', 'I');
?>
