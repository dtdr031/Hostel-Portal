<?php
    $con=mysqli_connect("localhost","id12394803_devdemons","devdemons","id12394803_hostel_portal");
 
    //$result=array();
    $result['messmenu']=array();
    $select="SELECT *FROM messmenu";
    $response=mysqli_query($con,$select);
    while($row=mysqli_fetch_array($response)){
        
        $index['hostel']=$row['0'];
	    $index['mon']=$row['1'];
        $index['tue']=$row['2'];
        $index['wed']=$row['3'];
        $index['thurs']=$row['4'];
    	$index['fri']=$row['5'];
        $index['sat']=$row['6'];
	    $index['sun']=$row['7'];
        
        array_push($result['messmenu'],$index);
    }
    
 
    $result["success"]="1";
    echo json_encode($result);
    mysqli_close($con);
?>