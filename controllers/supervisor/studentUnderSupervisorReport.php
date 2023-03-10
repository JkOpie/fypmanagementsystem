<?php
    require_once('C:/xampp/htdocs/fyp/vendor/autoload.php');
    require_once("C:/xampp/htdocs/fyp/controllers/db_connection.php");

    $conn = setDbConnection();
    session_start();

    $tr = null;
    $path = 'C:/xampp/htdocs';
    $index = 0;

    $query = "select students.*, users.name, users.email, users.handphone 
    from students 
    left join users on users.id = students.user_id 
    where students.supervisor_id = '".$_SESSION['id']."'";

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
                <td>'.$row['name'].'</td>
                <td>'.$row['matric_number'].'</td>
                <td>'.$row['email'].'</td>
                <td>'.$row['handphone'].'</td>
                <td>'.($row['programmes'] ?: '-') .'</td>
               
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
    <h4>Student Under Supervisor Reports</h4>
    <table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th></th>
            <th>Name</th>
            <th>Matric Number</th>
            <th>Email</th>
            <th>Phone Number</th>
            <th>Programmes</th>
        </tr>
    </thead>  
    <tbody>
       '.$tr.'
    </tbody>
    </table></html>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('mypdf.pdf', 'I');
?>
