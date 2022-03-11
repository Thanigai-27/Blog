<?php
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['admin']['username'])==0)
  { 
header('location:index.php');
}
else{
    ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- App title -->
        <title>BLOG | Dashboard</title>
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="index.html" class="logo"><span>BLOG<span>Admin</span></span><i class="mdi mdi-layers"></i></a>
                    <!-- Image logo -->
                    <!--<a href="index.html" class="logo">-->
                        <!--<span>-->
                            <!--<img src="assets/images/logo.png" alt="" height="30">-->
                        <!--</span>-->
                        <!--<i>-->
                            <!--<img src="assets/images/logo_sm.png" alt="" height="28">-->
                        <!--</i>-->
                    <!--</a>-->
                </div>

                <!-- Button mobile view to collapse sidebar menu -->
            <?php include('includes/topheader.php');?>
            </div>
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
    <?php include('includes/leftsidebar.php');?>
            <!-- Left Sidebar End -->



            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">
                        <div class="row">
							<div class="col-xs-12">
								<div class="page-title-box">
                                    <h4 class="page-title">Dashboard</h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">BLOG</a>
                                        </li>
                                        <li>
                                            <a href="#">Admin</a>
                                        </li>
                                        <li class="active">
                                            Dashboard
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

                        <div class="row">
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total users</p>
<?php $query=mysqli_query($con,"SELECT * from users where active=1");
$countusers=mysqli_num_rows($query);
?>
                                        <h2><?php echo htmlentities($countusers);?> <small></small></h2>
                              
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="Statistics">Total Posts Published</p>
<?php $query=mysqli_query($con,"SELECT * from posts where published=1");
$countposts=mysqli_num_rows($query);
?>

                                        <h2><?php echo htmlentities($countposts);?> <small></small></h2>
                                    
                                    </div>
                                </div>
                            </div><!-- end col -->

                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total Posts Unpublished</p>
<?php $query=mysqli_query($con,"SELECT * from posts where published=0");
$countsubcat=mysqli_num_rows($query);
?>
                                        <h2><?php echo htmlentities($countsubcat);?> <small></small></h2>
                              
                                    </div>
                                </div>
                            </div><!-- end col -->


                           
       <!-- end col -->

                
                  
                        </div>
                        <!-- end row -->
   
   <div class="row">
                    
       <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total comments</p>
<?php $query=mysqli_query($con,"SELECT * from comments");
$countcomments=mysqli_num_rows($query);
?>
                                        <h2><?php echo htmlentities($countcomments);?> <small></small></h2>
                              
                                    </div>
                                </div>
                            </div>
                             <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total views</p>
<?php $result = mysqli_query($con,"SELECT SUM(views) AS value_sum FROM posts"); 
$row = mysqli_fetch_assoc($result); 
$sum = $row['value_sum'];

?>
                                        <h2><?php echo htmlentities($sum);?> <small></small></h2>
                              
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="card-box widget-box-one">
                                    <i class="mdi mdi-layers widget-one-icon"></i>
                                    <div class="wigdet-one-content">
                                        <p class="m-0 text-uppercase font-600 font-secondary text-overflow" title="User This Month">Total categories</p>
<?php $result = mysqli_query($con,"SELECT *  FROM category where active=1"); 
$row = mysqli_num_rows($result);

?>
                                        <h2><?php echo htmlentities($row);?> <small></small></h2>
                              
                                    </div>
                                </div>
                            </div>
                           
                           
</div>
  <div class="col-md-12 col-lg-4 sidebar">
      <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           
<th>Username</th>
<th>Total Posts</th>

</tr>
</thead>
<tbody>
    <?php


$query =mysqli_query($con,"SELECT count(id) as count_post,username FROM `posts` where published=1 group by username ORDER BY count_post DESC LIMIT 5");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
<tr>

<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['username']);?></b></td>
<td><?php echo htmlentities($row['count_post'])?></td>
</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>

 <div class="col-md-12 col-lg-4 sidebar">
      <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           
<th>Username</th>
<th>Total Views</th>

</tr>
</thead>
<tbody>
    <?php


$query =mysqli_query($con,"SELECT SUM(views) as count_views,username FROM `posts` where published=1 group by username ORDER BY count_views DESC LIMIT 5");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
<tr>

<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['username']);?></b></td>
<td><?php echo htmlentities($row['count_views'])?></td>
</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>
<div class="col-md-12 col-lg-4 sidebar">
      <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           
<th>Post Title</th>
<th>Total views</th>

</tr>
</thead>
<tbody>
    <?php


$query =mysqli_query($con,"SELECT SUM(views) as count_post_views,title FROM `posts` where published=1 group by title ORDER BY count_post_views DESC LIMIT 5");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
<tr>

<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['title']);?></b></td>
<td><?php echo htmlentities($row['count_post_views'])?></td>
</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>


<div class="col-md-12 col-lg-4 sidebar">
      <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           
<th>Username</th>
<th>Average Views</th>

</tr>
</thead>
<tbody>
    <?php


$query =mysqli_query($con,"SELECT avg_views,username FROM `users`  ORDER BY avg_views DESC LIMIT 5");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
<tr>

<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['username']);?></b></td>
<td><?php echo htmlentities($row['avg_views'])?></td>
</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>



<div class="col-md-12 col-lg-4 sidebar">
      <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           
<th>Post Title</th>
<th>Likes</th>

</tr>
</thead>
<tbody>
    <?php


$query =mysqli_query($con,"SELECT title,likes FROM `posts`  ORDER BY likes DESC LIMIT 5");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
<tr>

<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['title']);?></b></td>
<td><?php echo htmlentities($row['likes'])?></td>
</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>



<div class="col-md-12 col-lg-4 sidebar">
      <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           
<th>Username</th>
<th>Rank</th>

</tr>
</thead>
<tbody>
    <?php


$query =mysqli_query($con,"SELECT rank,username FROM `users`  ORDER BY rank DESC LIMIT 5");
$rowcount=mysqli_num_rows($query);
if($rowcount==0)
{
?>
<tr>

<td colspan="4" align="center"><h3 style="color:red">No record found</h3></td>
<tr>

<?php 
} else {
while($row=mysqli_fetch_array($query))
{
?>
 <tr>
<td><b><?php echo htmlentities($row['username']);?></b></td>
<td><?php echo htmlentities($row['rank'])?></td>
</tr>
<?php } }?>
</tbody>
</table>
</div>
</div>




                    </div> <!-- container -->

                </div> <!-- content -->
<?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


            <!-- Right Sidebar -->
            <div class="side-bar right-bar">
                <a href="javascript:void(0);" class="right-bar-toggle">
                    <i class="mdi mdi-close-circle-outline"></i>
                </a>
                <h4 class="">Settings</h4>
                <div class="setting-list nicescroll">
                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Notifications</h5>
                            <p class="text-muted m-b-0"><small>Do you need them?</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">API Access</h5>
                            <p class="m-b-0 text-muted"><small>Enable/Disable access</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Auto Updates</h5>
                            <p class="m-b-0 text-muted"><small>Keep up to date</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>

                    <div class="row m-t-20">
                        <div class="col-xs-8">
                            <h5 class="m-0">Online Status</h5>
                            <p class="m-b-0 text-muted"><small>Show your status to all</small></p>
                        </div>
                        <div class="col-xs-4 text-right">
                            <input type="checkbox" checked data-plugin="switchery" data-color="#7fc1fc" data-size="small"/>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->



        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>
        <script src="../plugins/switchery/switchery.min.js"></script>

        <!-- Counter js  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Dashboard init -->
        <script src="assets/pages/jquery.dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
<?php } ?>