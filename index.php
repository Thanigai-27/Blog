<?php

include('users/includes/config.php');
if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}
$no_of_records_per_page = 6;
$offset = ($pageno-1) * $no_of_records_per_page; 
$total_pages_sql = "SELECT COUNT(*) FROM posts where published=1";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

?>

<?php include 'includes/header.php'; ?>

    <div class="wrap">

<?php include 'includes/navigation.php'; ?>
      <!-- END header -->
 <section class="site-section pt-5 pb-5">
        <div class="container">
          <div class="row">
            <div class="col-md-12">

              <div class="owl-carousel owl-theme home-slider">
              <?php
              $query=mysqli_query($con," SELECT * FROM posts WHERE published=1 ORDER BY views DESC LIMIT 4"); 
               while($post=mysqli_fetch_array($query))
{
?>
                <div>
                  <a href="blog-single.php?pid=<?php echo htmlentities($post['id']);?>" class="a-block d-flex align-items-center height-lg" style="background-image: url('users/postimages/<?php echo htmlentities($post['image']);?>'); ">
                    <div class="text half-to-full">
                      <span class="category mb-5"><?php echo htmlentities($post['category']);?></span>
                      <div class="post-meta">
                       <?php
                       $id=$post['user_id'];
                       $sql=mysqli_query($con,"SELECT image from users where id=$id"); 
                       while($img=mysqli_fetch_array($sql))
                       {
                        ?>
                        <?php if($img['image']==NULL)
                        {
                          ?>
                           <span class="author mr-2"><img src="users/assets/images/users/avatar-1.png"> <?php echo htmlentities(strtolower($post['username']));?></span>&bullet;
                       <?php } else {?>

                        <span class="author mr-2"><img src="users/profile_images/<?php echo htmlentities($img['image']);?>"> <?php echo htmlentities(strtolower($post['username']));?></span>&bullet;
                        <?php }} ?>
                        <span class="mr-2"><?php echo date('F j, Y',strtotime($post['published_date'])); ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span><?php echo htmlentities($post['views']);?> </span>
                        
                      </div>
                      <h3><?php echo htmlentities($post['title']);?></h3>
                      <p><?php echo html_entity_decode(substr($post['content'],0,150) . '...');?></p>
                    </div>
                  </a>
                </div>
                 <?php } ?>
               
              </div>
              
            </div>
          </div>
          
        </div>


      </section>

      <!-- END section -->

      <section class="site-section py-sm">
        <div class="container">
          <div class="row">
            <div class="col-md-6">
              <h2 class="mb-4">Latest Posts</h2>
            </div>
          </div>
          <div class="row blog-entries">
            <div class="col-md-12 col-lg-8 main-content">
              <div class="row">
                <?php include 'includes/posts.php'; ?>
              </div>
              <ul class="pagination">
        <li><a href="?pageno=1">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        </li>
        <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    </ul>

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
