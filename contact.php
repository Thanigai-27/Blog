<?php

include('users/includes/config.php');
if (isset($_POST['submit']))
{
  $name=$_POST['name'];
  $email=$_POST['email'];
  $message=$_POST['message'];
  $res=mysqli_query($con,"INSERT INTO contact (name,email,content) values ('$name','$email','$message')");
}
?>

<?php include 'includes/header.php'; ?>

    <div class="wrap">

<?php include 'includes/navigation.php'; ?>
      <!-- END header -->
 
      <!-- END section -->

     <section class="site-section">
      <div class="container">
        <div class="row mb-4">
          <div class="col-md-6">
            <h1>Contact Us</h1>
          </div>
        </div>
        <div class="row blog-entries">
          <div class="col-md-12 col-lg-8 main-content">
            
            <form action="contact.php" method="post">
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="name">Name</label>
                      <input type="text" id="name" name="name" class="form-control ">
                    </div>
                    
                    <div class="col-md-12 form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" class="form-control ">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12 form-group">
                      <label for="message">Write Message</label>
                      <textarea name="message" id="message" class="form-control " name="message" cols="30" rows="8"></textarea>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6 form-group">
                      <input type="submit" value="Send Message" name="submit" class="btn btn-primary">
                    </div>
                  </div>
                </form>
            

          </div>
            <!-- END main-content -->

            <div class="col-md-12 col-lg-4 sidebar">
              <div class="sidebar-box search-form-wrap">
                
              </div>
              <!-- END sidebar-box -->

              <!-- END sidebar-box -->
              <?php include 'includes/sidebar.php'; ?>
              <!-- END sidebar-box -->
<?php include 'includes/category.php'; ?>

              <!-- END sidebar-box -->


            </div>
            <!-- END sidebar -->

          </div>
        </div>
      </section>

<?php include 'includes/footer.php'; ?>

    </div>

    <!-- loader -->
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>


    <script src="js/main.js"></script>
  </body>
</html>
