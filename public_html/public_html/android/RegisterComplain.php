<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");

 $complaint_subject=$_POST["complaint_subject"];
 $complaint_type=$_POST["complaint_type"];
 $complaint_student_name=$_POST["complaint_student_name"];
 $complaint_student_rollno=$_POST["complaint_student_rollno"];
 $complaint_hostel_name=$_POST["complaint_hostel_name"];
$complaint_number=uniqid($complaint_hostel_name);
 $complaint_roomno=$_POST["complaint_roomno"];
 $complaint_status='unapproved';
 $complaint_seen='unseen';
 
$sql= "INSERT INTO complaint_details(complaint_subject,complaint_type,complaint_student_name,complaint_student_rollno,complaint_hostel_name,complaint_roomno,complaint_number,complaint_seen,complaint_status) 
    VALUES ('$complaint_subject','$complaint_type','$complaint_student_name','$complaint_student_rollno','$complaint_hostel_name','$complaint_roomno','$complaint_number','$complaint_seen','$complaint_status')";
    $result= mysqli_query($con , $sql );
    if($result){
    echo     $complaint_number;


    }
    else{
    echo "some error occured";
    }
    
    mysqli_close($con);
?>