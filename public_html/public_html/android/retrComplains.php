<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");
 
    //$result=array();
    $result['complaint_details']=array();
    $select="SELECT * FROM `complaint_details` ORDER BY `complaint_seen` DESC";
    $response=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($response)){
        
        $index['complaint_subject']=$row['1'];
        $index['complain_type']=$row['2'];
        $index['complaint_student_name']=$row['3'];
        $index['complain_student_rollno']=$row['4'];
        $index['complaint_roomno']=$row['6'];
        $index['complaint_number']=$row['7'];
        $index['complain_status']=$row['8'];
         $index['complaint_seen']=$row['9'];
       
    
        
        array_push($result['complaint_details'],$index);
    }
    
    $result["success"]="1";
    echo json_encode($result);
    mysqli_close($con);
?>