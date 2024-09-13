<?php
session_start();
?>
<?php
$_SESSION['student_rollno']=null;
$_SESSION['student_password']=null;
$_SESSION['student_hostelname']=null;

//all sessions are cancelled
header("Location: ../index.php");
?>
