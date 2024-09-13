<?php
include "db.php";
include "../functionality/functions.php";
?>
<?php
 session_start();
//once logged in start the session
?>




<?php
if(isset($_POST['login_student']))
{
    $student_rollno=escape($_POST['student_rollno']);
    $student_password=escape($_POST['student_password']);
    if(!empty($student_rollno)&&!empty($student_password))
    {
$query="SELECT * from student_login WHERE student_rollno=$student_rollno AND student_password='$student_password' ";
    $login_student_query=mysqli_query($connection,$query);
    if(!$login_student_query)
        die("QUERY FAILED".mysqli_error($connection));

while($row=mysqli_fetch_assoc($login_student_query))
{
    $db_student_rollno=$row['student_rollno'];
    $db_student_password=$row['student_password'];
    
}

if($db_student_rollno===$student_rollno && $db_student_password===$student_password)
{
   

$logged_in_rollno=$db_student_rollno;
$query="SELECT * from student_hostel WHERE student_rollno=$logged_in_rollno ";
$find_hostel_query=mysqli_query($connection,$query);
if(!$find_hostel_query)
die("QUERY FAILED".mysqli_error($connection));
$row=mysqli_fetch_assoc($find_hostel_query);
$student_hostel_name=$row['student_hostelname'];

 //setting up the sessions
 $_SESSION['student_hostelname']=$student_hostel_name;
    $_SESSION['student_rollno']=$db_student_rollno;
    $_SESSION['student_password']=$db_student_password;
    header("Location:../student_area/index.php");
}
else
{
    header("Location:../pages/student_login_page.php");
    echo "<script>alert('Incorrect warden id or password.Please login again with correct credentials');</script>";
    //redirected
}
}
else
{
    //if the field is empty then redirect to the older page
    echo "<script>alert('Field is empty.Please enter your warden id and password');</script>";
    header("Location:../pages/student_login_page.php");
//redirected
    
}
//else
//{
//    //if the field is empty then redirect to the older page
// if(strlen(student_password)<5)
// {
//     echo "<b>Short Password entered.Enter a password of more than 5 characters</b>";
//     header("Location:student_hostel_login.php");
//     
// }
//    else
//    header("Location:index.php");
////redirected
//    
//}
}

?>