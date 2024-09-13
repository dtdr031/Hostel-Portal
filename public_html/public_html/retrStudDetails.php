<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");
 
    //$result=array();
    $result['student_details']=array();
    $select="SELECT *FROM student_details";
    $response=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($response)){
        
        $index['student_rollno']=$row['0'];
        $index['student_name']=$row['1'];
        $index['student_gender']=$row['2'];
        $index['student_age']=$row['3'];
        $index['student_contact_number']=$row['4'];
        $index['student_dob']=$row['5'];
        
        array_push($result['student_details'],$index);
    }
    
 
    $result["success"]="1";
    echo json_encode($result);
    mysqli_close($con);
?>