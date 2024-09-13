<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");
 

    $result['complaint_notifications']=array();
    $select="SELECT * FROM `complaint_notifications`  ORDER BY `approval_time` DESC";
    $response=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($response)){
        
        $index['notification_id']=$row['1'];
        $index['warden_name']=$row['2'];
        $index['warden_message']=$row['3'];
        $index['complaint_status']=$row['4'];
        $index['student_rollno']=$row['5'];
       
        array_push($result['complaint_notifications'],$index);
    }
    
    $result["success"]="1";
    echo json_encode($result);
    mysqli_close($con);
?>