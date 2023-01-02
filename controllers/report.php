<?php
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');

    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");
    $conn = setDbConnection();

    $tr = null;
    $path = 'C:/xampp/htdocs';

    $query = 'select proposals.*, users.name, users.email, users.handphone from proposals
    left join users on users.id = proposals.user_id order by id desc';

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
                <td><img class="user-img" src="'.$image.'"></td>
                <td>'.$row['name'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['handphone'].'</td>
                <td>'.$row['title'].'</td>
                <td>'.ucfirst($row['status']).'</td>
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
            <th>Image</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Proposal Title</th>
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
