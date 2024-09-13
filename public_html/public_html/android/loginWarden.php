<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");

    $hostel_id=$_POST["hostel_id"];
    $hostel_password=$_POST["hostel_password"];
    
   
    $sql= "SELECT * from warden_login WHERE hostel_id='$hostel_id' AND hostel_password='$hostel_password'";

    $result= mysqli_query($con , $sql );
    if($result->num_rows>0)
    echo "logged in successfully";
    else
    echo "false";
    
     
    
?>