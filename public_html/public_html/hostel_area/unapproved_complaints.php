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
      

      <div class="container-fluid" id="control_display">
        <h2 class="mt-4">Welcome to KIIT Hostel Portal</h2>
     <table class="table table-bordered table-hover">
         <tr>
             <th>Complaint Id</th>
             <th>Student Name</th>
             <th>Roll No</th>
                
             <th>Details</th>
         </tr>
         
    <?php
         $hostel_names=$_SESSION['hostel_name'];
         $query="SELECT * from complaint_details WHERE complaint_hostel_name='$hostel_names' AND complaint_status='unapproved' ";
    $unapproved_complaint_list_query=mysqli_query($connection,$query);
         if(!$unapproved_complaint_list_query)
             die("QUERY FAILED".mysqli_error($connection));
         
         while($row=mysqli_fetch_assoc($unapproved_complaint_list_query))
         {
             $complaint_id=$row['complaint_number'];
        $complaint_student_name=$row['complaint_student_name'];
          $complaint_student_rollno=$row['complaint_student_rollno'];    
           
             echo "<tr>";
         ?>
        
    <td><?php echo $complaint_id;?></td>         
             <td><?php echo $complaint_student_name;?></td>
           <td><?php echo $complaint_student_rollno;?></td>
          
             <td><a href="complaint_details.php?c_id=<?php echo $complaint_id;?>">More details...</a></td>
        <?php echo "</tr>";  }?>
           
     </table>
        </div>
     <!--repeating the same code due to the screen size-->
       <div class="container-fluid" id="for_mobiles">
       
         <?php
          
           //page for the unapproved complaints
           
          $count=1;
         $hostel_names=$_SESSION['hostel_name'];
         $query="SELECT * from complaint_details WHERE complaint_hostel_name='$hostel_names' AND complaint_status='unapproved' ORDER BY complaint_id DESC ";
    $unapproved_complaint_list_query=mysqli_query($connection,$query);
         if(!$unapproved_complaint_list_query)
             die("QUERY FAILED".mysqli_error($connection));
         
         while($row=mysqli_fetch_assoc($unapproved_complaint_list_query))
         {
             $complaint_id=$row['complaint_number'];
        $complaint_student_name=$row['complaint_student_name'];
          $complaint_student_rollno=$row['complaint_student_rollno'];     
         
             
             echo $count."-  ";
          echo "<b>"."Complaint Id:  "."<b>".$complaint_id."<br>";
             echo "Student Name:  ".$complaint_student_name."<br>";
             echo "Student Roll number:  ".$complaint_student_rollno."<br>";
           
             ?>
             <a href="complaint_details.php?c_id=<?php echo $complaint_id;?>">More details...</a>
             <br><br>
             <?php
             $count++;
         }
          ?>
        
        </div>
          </div>
      </div>
    </div>
    <!-- /#page-content-wrapper -->

  </div>
  <!-- /#wrapper -->
  
  
  
  <!--footer-->
  
  <?php
include "includes/warden_footer.php";
}
?>