<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");
 
    //$result=array();
    $result['hostel_details']=array();
    $select="SELECT *FROM hostel_details";
    $response=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($response)){
        
        $index['student_rollno']=$row['0'];
        $index['student_roomno']=$row['1'];
        $index['student_hostelname']=$row['2'];
        $index['student_name']=$row['3'];
        $index['student_contact']=$row['4'];
    
        
        array_push($result['hostel_details'],$index);
    }
    
 
    $result["success"]="1";
    echo json_encode($result);
    mysqli_close($con);
?>