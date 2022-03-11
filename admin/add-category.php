<?php 
session_start();
include('includes/config.php');
error_reporting(0);
if(strlen($_SESSION['admin']['username'])==0)
  { 
header('location:index.php');
}

if(isset($_POST['submit']))
{
    $active=1;
    $category=$_POST['category'];
$query=mysqli_query($con,"insert into category(category_name,active) values('$category',$active)");
if($query)
{
$msg="Category successfully added ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}


if($_GET['action']='del')
{
$catid=intval($_GET['pd']);
$query=mysqli_query($con,"update category set active=0 where id='$catid'");
if($query)
{
$msg="Category removed ";
}
else{
$error="Something went wrong . Please try again.";    
} 
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        

        <!-- App favicon -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App title -->
        <title>Prabhat | Manage Category</title>

        <!--Morris Chart CSS -->
		<link rel="stylesheet" href="../plugins/morris/morris.css">

        <!-- jvectormap -->
        <link href="../plugins/jvectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../plugins/switchery/switchery.min.css">
         <style type="text/css">
        .pagination {
  margin-bottom: 5em;
  text-align: center !important;
  display: block; }
  .pagination li {
    margin-right: 2px;
    margin-bottom: 3px;
    display: inline-block; }
    .pagination li a {
      
      width: 40px;
      height: 40px;
      line-height: 40px;
      padding: 0;
      margin: 0;
      display: inline-block;
      text-align: center; }
      .pagination li a:focus, .pagination li a:active {
        -webkit-box-shadow: none !important;
        box-shadow: none !important; }
      .pagination li a:hover {
        background: #6610f2;
        color: #fff;
        border: 1px solid transparent; }
    .pagination li.active a {
      border: 1px solid transparent !important; }

    </style>
       

        <!-- HTML5 Shiv and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->

        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
           <?php include('includes/topheader.php');?>

            <!-- ========== Left Sidebar Start ========== -->
           <?php include('includes/leftsidebar.php');?>


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
                                    <h4 class="page-title">Manage Category </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="#">Category</a>
                                        </li>
                                        <li>
                                            <a href="dashboard.php">Admin</a>
                                        </li>
                                        <li class="active">
                                            Manage Category 
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                      <!-- end row -->
  



                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                               

                                <div class="card-box">
                         

                                    <div class="table-responsive">
<table class="table table-colored table-centered table-inverse m-0">
<thead>
<tr>
                                           

<th>Category</th>
<th>Posts Count</th>
<th>Action</th>


</tr>
</thead>
<tbody>

<?php

$active=1;
$sql = "SELECT * FROM category where active=$active";
$query=mysqli_query($con,$sql);
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
    $cat=$row['category_name'];
    $result=mysqli_query($con,"SELECT * from posts where category='$cat' and published=1");
$count=mysqli_num_rows($result);
?>
 <tr>

<td><?php echo htmlentities($row['category_name'])?></td>
<td><?php echo htmlentities($count);?></td>



<td>
<a href="add-category.php?pd=<?php echo htmlentities($row['id']);?>&&action=del" onclick="return confirm('Do you really want to delete ?')"> <p class="fa fa-trash-o" style="color: #f05050">Remove</p></a> </td>
 </tr>
<?php } }?>
                                               
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
<form name="addpost" method="post">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Add Category</label>
<input type="text" class="form-control" id="posttitle" name="category" placeholder="Enter Category">

</div>

<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Add</button>
</div>
</div>
</div>
</div>            </div> <!-- container -->

                </div> <!-- content -->

       <?php include('includes/footer.php');?>

            </div>


            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->


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

        <!-- CounterUp  -->
        <script src="../plugins/waypoints/jquery.waypoints.min.js"></script>
        <script src="../plugins/counterup/jquery.counterup.min.js"></script>

        <!--Morris Chart-->
		<script src="../plugins/morris/morris.min.js"></script>
		<script src="../plugins/raphael/raphael-min.js"></script>

        <!-- Load page level scripts-->
        <script src="../plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
        <script src="../plugins/jvectormap/gdp-data.js"></script>
        <script src="../plugins/jvectormap/jquery-jvectormap-us-aea-en.js"></script>


        <!-- Dashboard Init js -->
		<script src="assets/pages/jquery.blog-dashboard.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
