<?php
include "db.php";
include "../functionality/functions.php";
?>
<?php
 session_start();
//once logged in start the session
?>




<?php
if(isset($_POST['login_warden']))
{
    $hostel_id=escape($_POST['hostel_id']);
    $hostel_password=escape($_POST['hostel_password']);
    if(!empty($hostel_id)&&!empty($hostel_password))
    {
    
$query="SELECT * from warden_login WHERE hostel_id='$hostel_id' AND hostel_password='$hostel_password'";
    $login_hostel_query=mysqli_query($connection,$query);
    if(!$login_hostel_query)
        die("QUERY FAILED".mysqli_error($connection));

while($row=mysqli_fetch_assoc($login_hostel_query))
{
    $db_hostel_id=$row['hostel_id'];
    $db_hostel_password=$row['hostel_password'];
    
}

if($db_hostel_id===$hostel_id && $db_hostel_password===$hostel_password)
{
$logged_in_hostel=$db_hostel_id;
$query="SELECT * from warden_login WHERE hostel_id='$logged_in_hostel'";
$hostel_query=mysqli_query($connection,$query);
if(!$hostel_query)
die("QUERY FAILED".mysqli_error($connection));
$row=mysqli_fetch_assoc($hostel_query);
$hostel_name=$row['hostel_name'];

 //setting up the sessions
 $_SESSION['hostel_name']=$hostel_name;
    $_SESSION['hostel_id']=$db_hostel_id;
    $_SESSION['hostel_password']=$db_hostel_password;
    header("Location:../hostel_area/index.php");
}
else
{
        echo "<script>alert('Incorrect warden id or password.Please login again with correct credentials');</script>";
    header("Location:../pages/warden_login_page.php");

    //redirected
}
}

else
{
    //if the field is empty then redirect to the older page
        echo "<script>alert('Field is empty.Please enter your warden id and password');</script>";
    header("Location:../pages/warden_login_page.php");

//redirected
    
}
}

?>