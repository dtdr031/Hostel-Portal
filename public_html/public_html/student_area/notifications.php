<?php
include "includes/student_header.php";
if(isset($_SESSION['student_rollno']) && isset($_SESSION['student_password']))
{
?>



  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
 <?php
      
      include "includes/student_sidebar.php";
      ?>
    <!-- /#sidebar-wrapper -->

    <!-- Page Content -->
    <div id="page-content-wrapper">

     <?php
        include "includes/student_navigation.php";
        ?>
      <br>
       <center><button class="btn btn-primary" id="menu-toggle">Click Here for Student Details</button></center>
      
<br><br>
      <div class="container-fluid">
      
        <h1 class="text-danger text-center m-2">Complaint Status</h1><br>
        
       <?php
          $student_rollno=$_SESSION['student_rollno'];
$query="SELECT * FROM complaint_details WHERE complaint_student_rollno=$student_rollno AND complaint_seen='seen' ORDER BY complaint_id DESC ";   //ordering according to the id in descending order
          
          $display_notification_query=mysqli_query($connection,$query);
          if(!$display_notification_query)
              die("QUERY FAILED".mysqli_error($connection));
          $count=1;
        
          while($row=mysqli_fetch_assoc($display_notification_query))
          {
              $complaint_number=$row['complaint_number'];
          
          $query1="SELECT * from complaint_notifications WHERE notification_id='$complaint_number' ";
          $get_notification_query=mysqli_query($connection,$query1);
          if(!$get_notification_query)
              die("QUERY FAILED".mysqli_error($connection));
          $row1=mysqli_fetch_assoc($get_notification_query);
          
          $get_warden_name=$row1['warden_name'];
          $get_warden_message=$row1['warden_message'];
          $get_complaint_status=$row1['complaint_status'];
          ?>
<div class="row">
          <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div>
          <div class="col-xs-10 col-sm-10 col-md-8 col-lg-8">
       <div class="card text-center ml-5">
  <div class="card-header bg-primary">
      <h3>Complaint ID:<?php echo $complaint_number;?></h3>
  </div>
  <div class="card-body" style="font-weight:bold;">
    <h5 class="card-title">Complaint Status : <?php  echo $get_complaint_status;?></h5>
    <p class="card-text">BY : <?php echo $get_warden_name;?></p>
    <p class="class-text">HIS REPLY - <?php echo $get_warden_message;?></p>
    <a href="../hostel_area/complaint_details.php?c_id=<?php echo $complaint_number;?>" class="btn btn-success">Check Complaint Details</a>
  </div>
  <div class="card-footer text-muted">
<!--      Click Here to Reply<br><br><form action="reply.php" method="post"><button type="submit" name="reply_button" class="btn btn-primary">Reply</button></form>-->
  </div>
              </div></div>
    <div class="col-xs-1 col-sm-1 col-md-2 col-lg-2"></div></div>
        <br>
         
          
      <?php
       echo "</p>";
              $count++;
          }
         ?>
         
        
      </div>

    
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  
  
  
 <?php
include "includes/student_footer.php";
?>



  <!-- Bootstrap core JavaScript -->
  <script src="../styling_folder/vendor/jquery/jquery.min.js"></script>
  <script src="../styling_folder/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Menu Toggle Script -->
  <script>
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
  </script>

</body>

</html>
<?php  }?>