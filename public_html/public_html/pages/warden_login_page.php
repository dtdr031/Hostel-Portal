<?php
include "includes/header.php";
?>
  
       <?php
include "includes/navigation.php";
?>
      

<section id="cover" class="min-vh-100">
  <div id="cover-caption">
      <div class="container">
          <div class="row text-white">
              <div class="col-xl-5 col-lg-6 col-md-8 col-sm-10 mx-auto text-center form p-4">
                  <!-- <h1 class="display-4 py-2 text-truncate">Center my form.</h1> -->
                  <div class="px-2">
                      <form action="../includes/warden_hostel_login.php" class="justify-content-center" method="post">
                     
                          <h1 class="text-center">KIIT</h1>
                          <h2 class="text-center">HOSTEL PORTAL</h2>
                          <br>
                          <div class="form-group">
                              <input type="text" name="hostel_id" placeholder="Enter hostel id" class="form-control">
                          </div>
                          
                          <div class="form-group">
                              <input type="password" name="hostel_password" placeholder="Enter password" class="form-control">
                          </div>
                          <button type="submit" value="SUBMIT" name="login_warden" class="btn btn-primary">SUBMIT</button>
                          <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="../index.php"><button type="button" value="GO BACK" class="btn btn-danger">GO BACK</button></a></span>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</section>





<!-- Footer -->
<?php
include "includes/footer.php";
?>

