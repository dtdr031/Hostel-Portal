<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");
 
//  if(!$con)
//  echo "connection not";
//  else
//  echo "yes";
    $student_roll=$_POST["student_rollno"];
    $student_password=$_POST["student_password"];
    
   
    $sql= "SELECT * from student_login WHERE student_rollno='$student_roll' AND student_password='$student_password'";

    $result= mysqli_query($con , $sql );
    if($result->num_rows>0)
    echo "logged in successfully";
    else
    echo "false";
    
     
    
?>