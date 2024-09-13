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
        <h2 class="mt-4">Welcome to KIIT Hostel Portal</h2>
        <?php
        
        $logged_in_rollno=$_SESSION['student_rollno'];
        $query="SELECT * from student_hostel WHERE student_rollno='$logged_in_rollno' ";
        $display_student_hostel_details_query=mysqli_query($connection,$query);
        if(!$display_student_hostel_details_query)
        die("QUERY FAILED".mysqli_error($connection));
        
     $row=mysqli_fetch_assoc($display_student_hostel_details_query);
     $student_name=$row['student_name'];
     $student_roomno=$row['student_roomno'];
     $student_hostelname=$row['student_hostelname'];
        $student_contact=$row['student_contact'];
        ?>
      <!--  <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>-->
      <!--  <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>-->
      <!--</div>-->
     
       <form action="" method="post" enctype="multipart/form-data">    
     
<!--     sending different forms of data (coz here we are sending the images also)-->
      <div class="form-group row">
         <div class="col-xs-6 col-lg-6">
         <label for="student_name">Student Name</label>
          <input type="text" class="form-control" name="student_name" value="<?php echo $student_name; ?>" readonly>
      </div>
      </div>

         <div class="form-group row">
              <div class="col-xs-6 col-lg-6">
                  <label for="student_hostelname">Student Hostel Name</label>
      <input type="text" class="form-control" name="student_hostelname" value="<?php echo $student_hostelname;?>" readonly>
      </div> </div>


       <div class="form-group row">
<div class="col-xs-6 col-lg-6">       <label for="student_rollno">Student Room No</label>
         <input type="text" class="form-control" name="student_roomno" value="<?php echo $student_roomno;?>" readonly>
    
      </div></div>
      
      
      
<!--    <div class="form-group row">-->
<!--        <div class="col-xs-6 col-lg-6">-->
<!--         <label for="post_image">Post Image</label>-->
<!--         <br>-->
<!--          <input type="file"  name="image">-->
<!--      </div>-->
<!--</div>-->
      <div class="form-group row">
      <div class="col-xs-6 col-lg-6">
         <label for="student_contact">Student Contact</label>
          <input type="number" class="form-control" name="student_contact" value="<?php echo $student_contact;?>" readonly>
      </div>
      </div>
      <caption class="text-primary text-center">WARDEN DETAILS</caption>
      <table class="table table-bordered table-hover" id="warden_layout1">
          
    <tr class="bg-dark text-white">
        <th>S.No</th>
        <th>Warden Name</th>
        <th>Hostel Name</th>
        <th>Contact No</th>
    </tr>    
    <?php
    
    $loggedin_student_hostel=$_SESSION['student_hostelname'];
     $query="SELECT * from warden_list WHERE warden_hostel_name='$loggedin_student_hostel' ";
     $warden_list_query=mysqli_query($connection,$query);
     if(!$warden_list_query)
     die("QUERY FAILED".mysqli_error($connection));
     $i=1;
     while($row=mysqli_fetch_assoc($warden_list_query))
     {
         $warden_name=$row['warden_name'];
         $warden_hostel=$row['warden_hostel_name'];
         $warden_contact_no=$row['warden_contact_no'];
         echo "<tr>";
        
        echo "<td>$i</td>";  
    echo "<td>$warden_name</td>";
    echo "<td>$warden_hostel</td>";
    echo "<td>$warden_contact_no</td>";
          echo "</tr>";
     $i++;
         
     }
          ?>
      </table>
      
      <div id="warden_layout2">
         <?php
           $loggedin_student_hostel=$_SESSION['student_hostelname'];
     $query="SELECT * from warden_list WHERE warden_hostel_name='$loggedin_student_hostel' ";
     $warden_list_query=mysqli_query($connection,$query);
     if(!$warden_list_query)
     die("QUERY FAILED".mysqli_error($connection));
          $j=1;
             while($row=mysqli_fetch_assoc($warden_list_query))
     {
         $warden_name=$row['warden_name'];
         $warden_hostel=$row['warden_hostel_name'];
         $warden_contact_no=$row['warden_contact_no'];
                 
          ?>
    <p><?php echo $j;?>-&nbsp;</p>
         <p class="field_style"><?php echo "WARDEN NAME:  ".$warden_name;?></p>
         <p class="field_style"><?php echo "WARDEN HOSTEL:  ".$warden_hostel;?></p>
         <p class="field_style"><?php echo "WARDEN CONTACT NUMBER:  ".$warden_contact_no;?></p>      
          <br><br>
          
          <?php $j++; }?>
      </div>
      <!--<div class="form-group row">-->
      <!--   <div class="col-xs-6">-->
      <!--   <label for="post_content">Post Content</label>-->
      <!--   <textarea class="form-control "name="post_content" id="body" cols="30" rows="10">-->
      <!--   </textarea>-->
      <!--</div>-->
      <!--</div>-->

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