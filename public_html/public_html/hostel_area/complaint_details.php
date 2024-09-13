<?php
include "includes/warden_header.php";
if(isset($_SESSION['hostel_id']) && isset($_SESSION['hostel_password']))
{
?>


  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
<?php
      include "includes/warden_sidebar.php";
      ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

<?php
include "includes/warden_navigation.php";
?>
      <br>
       <center><button class="btn btn-primary" id="menu-toggle">Click Here for Details</button></center>
      

      <div class="container-fluid">
        <h2 class="mt-4">Welcome to KIIT Hostel Portal</h2>
     <?php
          
          if(isset($_GET['c_id']))
          {
              $complaint_unique_id=$_GET['c_id'];
            
          $query="SELECT * from complaint_details WHERE complaint_number='$complaint_unique_id' ";
              $complaint_display_query=mysqli_query($connection,$query);
              if(!$complaint_display_query)
                  die("QUERY FAILED".mysqli_error($connection));
              $row=mysqli_fetch_assoc($complaint_display_query);
              $complaint_number=$row['complaint_number'];
              $complaint_student_name=$row['complaint_student_name'];
              $complaint_student_rollno=$row['complaint_student_rollno'];
              $complaint_hostel_name=$row['complaint_hostel_name'];
              $complaint_roomno=$row['complaint_roomno'];
              $complaint_type=$row['complaint_type'];
              $complaint_subject=$row['complaint_subject'];
          
          ?>
     
     <br>
      <form action="" method="post">
        
         <div class="form-group">
             <b><label for="hostel_complaint_id">Complaint ID</label></b>
           <input type="text" class="form-control" name="hostel_complaint_id" value="<?php echo $complaint_number;?>">
       </div>
        <div class="form-group">
           <b><label for="student_name">Student Name</label></b>
            <input type="text" class="form-control" name="student_name" value="<?php echo $complaint_student_name;?>">
        </div>
          <div class="form-group">
             <b><label for="complaint_type">Complaint Type</label></b>
              <input type="text" class="form-control" name="complaint_type" value="<?php echo $complaint_type;?>">
          </div>
          <div class="form-group">
             <b><label for="compliant_subject">Complaint Subject</label></b>
              <textarea name="compliant_subject" id="complaint" cols="30" rows="10" class="form-control">
                  <?php echo $complaint_subject;?>
              </textarea>
          </div>
          <div class="form-group">
             <b><label for="student_rollno">Student RollNo</label></b>
              <input type="number" class="form-control" name="student_rollno" value="<?php echo $complaint_student_rollno;?>">
          </div>
          <div class="form-group">
             <b><label for="student_hostel_name">Student Hostel Name</label></b>
              <input type="text" class="form-control" name="student_hostel_name" value="<?php echo $complaint_hostel_name;?>">
          </div>
          <div class="form-group">
             <b><label for="student_room_no">Student Room Number</label></b>
              <input type="text" class="form-control" name="student_room_no" value="<?php echo $complaint_roomno;?>">
          </div>
          
          <div class="form-group">
                        <textarea name="warden_message" id="warden_message" cols="30" rows="10" class="form-control" placeholder="Type your message here...."></textarea>
                    </div>
                    <div class="form-group">
                       <label for="warden_name">Your Name</label>
                        <input type="text" name="warden_name" class="form-control">
                        
                    </div>
          <div class="form-group text-center">
              <button type="submit" class="btn btn-primary" name="approve_complaint">Approve</button>
              &nbsp;&nbsp;
<button type="submit" class="btn btn-danger" name="unapprove_complaint">Unapprove</button>
                    </div>
                    
      </form>   
 
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  
  
  
  <!--footer-->
  
<?php
include "includes/warden_footer.php";
              
          
?>

<?php 
    
    //to approve the complaint
    $warden_name=$_POST['warden_name'];
    $warden_message=$_POST['warden_message'];
    $date=date('d-m-y');
    if(isset($_POST['approve_complaint']))
    {
    $query="UPDATE complaint_details SET complaint_status='approved',complaint_seen='seen' WHERE complaint_number='$complaint_number' ";
        
        $query1="INSERT INTO complaint_notifications(notification_id,warden_name,warden_message,complaint_status,student_rollno,approval_time) "; 
        $query1.="VALUES('$complaint_number','$warden_name','$warden_message','approved',$complaint_student_rollno,'$date') ";
        $approved_complaint_query=mysqli_query($connection,$query);
        $notify_student_query=mysqli_query($connection,$query1);
        if(!$approved_complaint_query)
            die("QUERY FAILED".mysqli_error($connection));
        if(!$notify_student_query)
        die("QUERY FAILED".mysqli_error($connection));
        
        header("Location:complaint_details.php?c_id=$complaint_number");
        
        
    }
    
    ?>
    
   <?php
    
    //to unapprove the complaint
    
        if(isset($_POST['unapprove_complaint']))
    {
        $query="UPDATE complaint_details SET complaint_status='unapproved',complaint_seen='seen' WHERE complaint_number='$complaint_number' ";
            
              $query1="INSERT into complaint_notifications(notification_id,warden_name,warden_message,complaint_status,student_rollno,approval_time) VALUES('$complaint_number','$warden_name','$warden_message','unapproved',$complaint_student_rollno,'$date') ";
        $unapproved_complaint_query=mysqli_query($connection,$query);
             $notify_student_query=mysqli_query($connection,$query1);
        if(!$unapproved_complaint_query)
            die("QUERY FAILED".mysqli_error($connection));
        if(!$notify_student_query)
            die("QUERY FAILED".mysqli_error($connection));
        header("Location:complaint_details.php?c_id=$complaint_number");
           
    }
          }
}
    ?>
