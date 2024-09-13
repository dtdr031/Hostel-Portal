<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");

 $complaint_number=$_POST["complaint_number"];
    $sql= "UPDATE complaint_details SET complaint_seen='seen' WHERE complaint_number='$complaint_number' ";
    $result= mysqli_query($con , $sql );
    if($result)
    {
    echo "Update Succesfull";
    }
    else{
    echo "some error occured";
    }
    
    mysqli_close($con);
?>