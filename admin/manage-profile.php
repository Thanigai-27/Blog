<?php 
session_start();
include('includes/config.php');
error_reporting(0);
$errors=array();
if(strlen($_SESSION['user']['username'])==0)
  { 
header('location:index.php');
}
else{
    if(isset($_POST['change']))
    {

        header("Location:change-password.php");
    }
if(isset($_POST['update']))
{

$name=$_POST['name'];
$username=$_POST['username'];
$email=$_POST['email'];
$contact=$_POST['contact'];
$userid=$_SESSION['user']['id'];


if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
             array_push($errors, "Invalid email id");
              echo "<script>alert('Invalid Email ID');</script>";
        }
        //Validate name
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            array_push($errors, "Invalid name");
              echo "<script>alert('Only letters and white space allowed in Name');</script>";
            }

        //Validate contact number
            if(!preg_match('/^[0-9]{10}+$/',$contact))
            {
                array_push($errors, "Invalid contact number");
              echo "<script>alert('Invalid Contact Number');</script>";

            }
if (count($errors) == 0) {

$query=mysqli_query($con,"UPDATE users set name='$name',username='$username',email='$email',contact='$contact' where id='$userid'");
if($query)
{
$msg="Profile updated ";
}
else{
$error="Something went wrong . Please try again.";    
} 

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
        <title>Prabhat | Manage Profile</title>

        <!-- Summernote css -->
        <link href="../plugins/summernote/summernote.css" rel="stylesheet" />

        <!-- Select2 -->
        <link href="../plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />

        <!-- Jquery filer css -->
        <link href="../plugins/jquery.filer/css/jquery.filer.css" rel="stylesheet" />
        <link href="../plugins/jquery.filer/css/themes/jquery.filer-dragdropbox-theme.css" rel="stylesheet" />

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
           <?php include('includes/topheader.php');?>
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
                                    <h4 class="page-title">Manage Profile </h4>
                                    <ol class="breadcrumb p-0 m-0">
                                        <li>
                                            <a href="dashboard.php">Admin</a>
                                        </li>
                                    
                                        <li class="active">
                                            Manage Profile
                                        </li>
                                    </ol>
                                    <div class="clearfix"></div>
                                </div>
							</div>
						</div>
                        <!-- end row -->

<div class="row">
<div class="col-sm-6">  
<!---Success Message--->  
<?php if($msg){ ?>
<div class="alert alert-success" role="alert">
<strong>Well done!</strong> <?php echo htmlentities($msg);?>
</div>
<?php } ?>

<!---Error Message--->
<?php if($error){ ?>
<div class="alert alert-danger" role="alert">
<strong>Oh snap!</strong> <?php echo htmlentities($error);?></div>
<?php } ?>


</div>
</div>

<?php
$userid=$_SESSION['user']['id'];
$sql = "SELECT * FROM users WHERE id=$userid";
$query=mysqli_query($con,$sql);
while($row=mysqli_fetch_array($query))
{
?>
                        <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <div class="p-6">
                                    <div class="">
                                        <form name="addpost" method="post">
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Name</label>
<input type="text" class="form-control" id="name" value="<?php echo htmlentities($row['name']);?>" name="name" placeholder="Enter name" required>
</div>

<div class="form-group m-b-20">
<label for="exampleInputEmail1">Username</label>
<input type="text" class="form-control" id="username" value="<?php echo htmlentities($row['username']);?>" name="username" placeholder="Enter username" required>
</div>

    
 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Email ID</label>
<input type="text" class="form-control" id="email" value="<?php echo htmlentities($row['email']);?>" name="email" placeholder="Enter email id" required>
</div>

 <div class="form-group m-b-20">
<label for="exampleInputEmail1">Contact Number</label>
<input type="text" class="form-control" id="contact" value="<?php echo htmlentities($row['contact_no']);?>" name="contact" placeholder="Enter contact number" required>
</div>
         



<button type="submit" name="change" class="btn btn-success waves-effect waves-light">Change Password </button>

<?php } ?>

<button type="submit" name="update" class="btn btn-success waves-effect waves-light">Update </button>

                                    </div>
                                </div> <!-- end p-20 -->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->



                    </div> <!-- container -->

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

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>
        <!-- Select 2 -->
        <script src="../plugins/select2/js/select2.min.js"></script>
        <!-- Jquery filer js -->
        <script src="../plugins/jquery.filer/js/jquery.filer.min.js"></script>

        <!-- page specific js -->
        <script src="assets/pages/jquery.blog-add.init.js"></script>

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

        <script>

            jQuery(document).ready(function(){

                $('.summernote').summernote({
                    height: 240,                 // set editor height
                    minHeight: null,             // set minimum height of editor
                    maxHeight: null,             // set maximum height of editor
                    focus: false                 // set focus to editable area after initializing summernote
                });
                // Select2
                $(".select2").select2();

                $(".select2-limiting").select2({
                    maximumSelectionLength: 2
                });
            });
        </script>
  <script src="../plugins/switchery/switchery.min.js"></script>

        <!--Summernote js-->
        <script src="../plugins/summernote/summernote.min.js"></script>



    </body>
</html>
<?php } ?>