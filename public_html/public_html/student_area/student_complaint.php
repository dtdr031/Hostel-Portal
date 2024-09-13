<?php
include "includes/student_header.php";
if(isset($_SESSION['student_rollno']) && isset($_SESSION['student_password']))
{

    ?>

<?php
// session_start();
?>

<?php
if(isset($_POST['complaint_submit']))
{
 $complaint_type=$_POST['complaint_type'];
     $complaint_details=$_POST['complaint_details'];
     $complaint_student_name=$_POST['complaint_student_name'];
    $complaint_student_rollno=$_POST['complaint_student_rollno'];
    $complaint_hostelname=$_POST['complaint_hostel_name'];
    $complaint_roomno=$_POST['complaint_room_no'];
    
    //uploading the image for the complaint
 $post_image        = $_FILES['image']['name'];
            $post_image_temp   = $_FILES['image']['tmp_name'];
            
            
    $complaint_number=uniqid($complaint_hostelname);
    $query="INSERT INTO complaint_details(complaint_subject,complaint_type,complaint_student_name, complaint_student_rollno, complaint_hostel_name, complaint_roomno,complaint_number) VALUES ('$complaint_details','$complaint_type','$complaint_student_name','$complaint_student_rollno','$complaint_hostelname','$complaint_roomno','$complaint_number') ";
    
    
     move_uploaded_file($post_image_temp, "../images/$post_image" );
    
    
    $insert_compliant_query=mysqli_query($connection,$query);
    if(!$insert_compliant_query)
    die("QUERY FAILED".mysqli_error($connection));
}

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
        <h2 class="mt-4">Welcome to KIIT Hostel Portal</h2>
        <?php
        
    //     $logged_in_rollno=$_SESSION['student_rollno'];
    //     $query="SELECT * from student_hostel WHERE student_rollno='$logged_in_rollno' ";
    //     $display_student_hostel_details_query=mysqli_query($connection,$query);
    //     if(!$display_student_hostel_details_query)
    //     die("QUERY FAILED".mysqli_error($connection));
        
    //  $row=mysqli_fetch_assoc($display_student_hostel_details_query);
    //  $student_name=$row['student_name'];
    //  $student_roomno=$row['student_roomno'];
    //  $student_hostelname=$row['student_hostelname'];
    //     $student_contact=$row['student_contact'];
        ?>
      <!--  <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>-->
      <!--  <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>-->
      <!--</div>-->
     
       <form action="" method="post" enctype="multipart/form-data">    
     
<!--     sending different forms of data (coz here we are sending the images also)-->


  <div class="form-group row">
         <div class="col-xs-6 col-lg-6">
         <label for="student_name" class=" font-weight-bold">Complaint Type</label>
         <select name="complaint_type" id="" class="form-control">
             <option value="1">Mess Food Unhygienic</option>
             <option value="2">Room regarding problems</option>
             <option value="3">Electronics related problem</option>
             <option value="4">Any kind of dispute</option>
             <option value="5">Warden related problem</option>
             <option value="6">Other:</option>
          <!--<input type="text" class="form-control" name="complaint_type" value="<?php echo $student_name; ?>">-->
     </select>
      </div>
      </div>
      
       <div class="form-group row">
              <div class="col-xs-6 col-lg-6">
      <label for="complaint_image" class=" font-weight-bold">Upload an image:</label><br>
      <input type="file" name="image">
      </div>
      </div>
      <br>
      <div class="form-group row">
              <div class="col-xs-6 col-lg-6">
                  <label for="complaint_details" class=" font-weight-bold">Complaint Details</label>
    <textarea class="form-control" rows="10" cols="20" name="complaint_details" placeholder="Enter your complaint here..."></textarea>
      </div> </div>
      
<div class="form-group row">
         <div class="col-xs-6 col-lg-6">
         <label for="student_name" class=" font-weight-bold">Student Name</label>
         <?php
         $student_rollno=$_SESSION['student_rollno'];
         $query="SELECT * from student_details WHERE student_rollno=$student_rollno ";
         $details_query=mysqli_query($connection,$query);
         if(!$details_query)
         die("QUERY FAILED".mysqli_error($connection));
         $row=mysqli_fetch_assoc($details_query);
         $student_name=$row['student_name'];
         ?>
         <input type="text" class="form-control" name="complaint_student_name" value="<?php echo $student_name;?>" readonly/>
         </div>
         </div>
         <div class="form-group row">
         <div class="col-xs-6 col-lg-6">
         <label for="student_name" class=" font-weight-bold">Student Roll No</label>
         <input type="number" class="form-control" name="complaint_student_rollno" value="<?php echo $_SESSION['student_rollno'];?>" readonly/>
         </div></div>
    
      
<!--<div class="form-group row">-->
<!--              <div class="col-xs-6 col-lg-6">-->
<!--                  <label for="complaint_hostel_name">Hostel Name</label>-->
 <!--<input type="text" class="form-control" name="complaint_hostel_name" value="<?php //echo //$_SESSION['student_hostelname']; ?>" readonly/>-->
<!--      </div> </div>-->

<div class="form-group row">
              <div class="col-6 col-sm-5 col-lg-3">
                  <label for="complaint_hostel_name" class=" font-weight-bold">Hostel Name</label>
 <input type="text" class="form-control" name="complaint_hostel_name" value="<?php echo $_SESSION['student_hostelname']; ?>" readonly/>
      </div>
      <div class="col-6 col-sm-5 col-lg-3">
          <?php
          $hostel_name=$_SESSION['student_hostelname'];
          $query="SELECT * from student_hostel WHERE student_hostelname='$hostel_name'";
          $room_query=mysqli_query($connection,$query);
          $row=mysqli_fetch_assoc($room_query);
          $room_no=$row['student_roomno'];
          
          ?>
                  <label for="complaint_hostel_name" class=" font-weight-bold">Room No</label>
 <input type="text" class="form-control" name="complaint_room_no" value="<?php echo $room_no;?>" readonly/>
      </div>
      </div>

       <div class="form-group row d-flex justify-content-around">
          
           <div class="col-xs-6 mx-auto">
              
         <button class="btn btn-primary" type="submit" name="complaint_submit">SUBMIT</button>
    
      </div>
      </div>


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