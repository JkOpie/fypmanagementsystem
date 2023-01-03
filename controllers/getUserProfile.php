<?php
    $ds = DIRECTORY_SEPARATOR;
    $base_dir = realpath(dirname(__FILE__)  . $ds . '..') . $ds;
    require_once("{$base_dir}controllers{$ds}db_connection.php");

    function getUserProfile(){

        $conn = setDbConnection();
        $sql = "select * from users where id = '".$_SESSION['id']."'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {

                $user = ['name' => $row['name'], 'email' => $row['email'], 'handphone' => $row['handphone'], 'roles' => $row['roles'], 'image' => $row['image']];

                if( $row["roles"] == 'student'){
                    $sql2 = "select students.*, users.name as supervisor_name  from students left join users on students.supervisor_id = users.id where user_id = '".$row['id']."'";
                    $result2 = $conn->query($sql2);

                    while($row = $result2->fetch_assoc()) {
                        $student = ['matric_number' => $row['matric_number'], 
                        'programmes' => $row['programmes'] , 
                        'supervisor_name' => $row['supervisor_name'] , 
                        'status' => $row['status']];
                    }

                    return [$user, $student];

                }else{
                    $staff = null;
                    
                    $sql2 = "select staffs.*, users.name from staffs left join users on users.id = staffs.cluster_id where user_id = '".$_SESSION['id']."'";
                    $result2 = $conn->query($sql2);

                    while($row = $result2->fetch_assoc()) {
                        //var_dump($row);
                        $staff = ['staff_id' => $row['staff_id'], 
                        'department' => $row['department'],
                        'cluster_name' => $row['name']
                    ];
                    }

                    return [$user, $staff];
                }

            }
        
        }else{
            return 'error';
        }

        closeDbConnection($conn);
    }

    

   
?>