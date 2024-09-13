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
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
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