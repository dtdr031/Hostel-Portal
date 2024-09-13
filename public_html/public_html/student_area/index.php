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
        <p>The starting state of the menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will change.</p>
        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>. The top navbar is optional, and just for demonstration. Just create an element with the <code>#menu-toggle</code> ID which will toggle the menu when clicked.</p>
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


<?php }?>