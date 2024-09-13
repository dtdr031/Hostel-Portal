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
                 <th>Current Status</th>
                 <th>Seen Status</th>
             <th>Details</th>
         </tr>
         
    <?php
         $hostel_names=$_SESSION['hostel_name'];
         $query="SELECT * from complaint_details WHERE complaint_hostel_name='$hostel_names' ";
    $complaint_list_query=mysqli_query($connection,$query);
         if(!$complaint_list_query)
             die("QUERY FAILED".mysqli_error($connection));
         
         while($row=mysqli_fetch_assoc($complaint_list_query))
         {
             $complaint_id=$row['complaint_number'];
        $complaint_student_name=$row['complaint_student_name'];
          $complaint_student_rollno=$row['complaint_student_rollno'];    
             $complaint_status=$row['complaint_status'];
         $complaint_seen=$row['complaint_seen'];
             echo "<tr>";
         ?>
        
    <td><?php echo $complaint_id;?></td>         
             <td><?php echo $complaint_student_name;?></td>
           <td><?php echo $complaint_student_rollno;?></td>
            <td><?php 
           echo $complaint_status;
             ?></td>
             <td><?php echo $complaint_seen;?></td>
             <td><a href="complaint_details.php?c_id=<?php echo $complaint_id;?>">More details...</a></td>
        <?php echo "</tr>";  }?>
           
     </table>
        </div>
     <!--repeating the same code due to the screen size-->
       <div class="container-fluid" id="for_mobiles">
       
         <?php
          
          $count=1;
         $hostel_names=$_SESSION['hostel_name'];
         $query="SELECT * from complaint_details WHERE complaint_hostel_name='$hostel_names' ORDER BY complaint_id DESC ";
    $complaint_list_query=mysqli_query($connection,$query);
         if(!$complaint_list_query)
             die("QUERY FAILED".mysqli_error($connection));
         
         while($row=mysqli_fetch_assoc($complaint_list_query))
         {
             $complaint_id=$row['complaint_number'];
        $complaint_student_name=$row['complaint_student_name'];
          $complaint_student_rollno=$row['complaint_student_rollno'];     
          $complaint_status=$row['complaint_status'];
         $complaint_seen=$row['complaint_seen'];
             
             echo $count."-  ";
          echo "<b>"."Complaint Id:  "."<b>".$complaint_id."<br>";
             echo "Student Name:  ".$complaint_student_name."<br>";
             echo "Student Roll number:  ".$complaint_student_rollno."<br>";
             echo "Complaint Status:  ".$complaint_status."<br>";
             echo "Seen Status:  ".$complaint_seen."<br>";
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