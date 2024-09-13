<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");
 
    //$result=array();
    $result['student_hostel']=array();
    $select="SELECT *FROM student_hostel";
    $response=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($response)){
        
        $index['student_hostelname']=$row['1'];
        $index['student_roomno']=$row['2'];
        $index['student_contact']=$row['3'];
        $index['student_rollno']=$row['4'];
        $index['student_name']=$row['5'];
    
        
        array_push($result['student_hostel'],$index);
    }
    
 
    $result["success"]="1";
    echo json_encode($result);
    mysqli_close($con);
?>