<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");

 $notification_id=$_POST["notification_id"];
 $warden_name=$_POST["warden_name"];
 $warden_message=$_POST["warden_message"];
 $complaint_status=$_POST["complaint_status"];
 $student_rollno=$_POST["student_rollno"];
$sql= "INSERT INTO complaint_notifications(notification_id,warden_name,warden_message,complaint_status,student_rollno) 
    VALUES ('$notification_id','$warden_name','$warden_message','$complaint_status','$student_rollno')";
    $result= mysqli_query($con , $sql );
    if($result){
    echo "Insertion Succesfull";

    }
    else{
    echo "some error occured";
    }
    
    mysqli_close($con);
?>