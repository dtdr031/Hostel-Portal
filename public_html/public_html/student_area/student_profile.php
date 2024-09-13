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
      

      <div class="container-fluid">
        <h1 class="mt-4 text-danger text-center">My Profile</h1><br>
        <?php
        
        $logged_in_rollno=$_SESSION['student_rollno'];
        $query="SELECT * from student_details WHERE student_rollno='$logged_in_rollno' ";
        $display_student_details_query=mysqli_query($connection,$query);
        if(!$display_student_details_query)
        die("QUERY FAILED".mysqli_error($connection));
        
        $row=mysqli_fetch_assoc($display_student_details_query);
        $student_rollno=$row['student_rollno'];
        $student_name=$row['student_name'];
        $student_gender=$row['student_gender'];
        $student_age=$row['student_age'];
        $student_contact_number=$row['student_contact_number'];
        $student_dob=$row['student_dob'];
        ?>
     
       <form action="" method="post" enctype="multipart/form-data">    
     
<!--     sending different forms of data (coz here we are sending the images also)-->
      <div class="form-group row">
         <div class="col-xs-6 col-lg-6">
         <label for="student_name" class="control-label font-weight-bold">Student Name</label>

         <input type="text" class="form-control " name="student_name" value="<?php echo $student_name; ?>" readonly>
             </div>
      </div>
     <br>
<div class="form-group row">
         <div class="col-xs-6 col-lg-6">
         <label for="student_name" class="font-weight-bold">Gender</label>
          <input type="text" class="form-control field_design" name="student_gender" 
          value="<?php echo $student_gender;?>" readonly>
      </div>
      </div>
<br>
       <div class="form-group row">
<div class="col-xs-6 col-lg-6">       <label for="student_rollno" class="font-weight-bold">Roll No</label>
         <input type="number" class="form-control field_design" name="student_rollno" value="<?php echo $student_rollno;?>" readonly>
    
      </div></div>
      
    <br>  
      
<!--    <div class="form-group row">-->
<!--        <div class="col-xs-6 col-lg-6">-->
<!--         <label for="post_image">Post Image</label>-->
<!--         <br>-->
<!--          <input type="file"  name="image">-->
<!--      </div>-->
<!--</div>-->
      <div class="form-group row">
      <div class="col-xs-6 col-lg-6">
         <label for="student_age" class="font-weight-bold">Age</label>
          <input type="number" class="form-control field_design" name="student_age" value="<?php echo $student_age;?>" readonly>
      </div>
      </div>
   <br>
     <div class="form-group row">
      <div class="col-xs-6 col-lg-6">
         <label for="age" class="font-weight-bold">Date of Birth</label>
          <input type="date" class="form-control field_design" name="student_dob" value="<?php echo $student_dob;?>" readonly>
      </div>
      </div>
<br>
</form>

     <?php
          include "includes/student_footer.php";
  ?>

    </div>
    <!-- /#page-content-wrapper -->
    

  </div>
  <!-- /#wrapper -->


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
<?php }?>