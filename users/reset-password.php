<?php
	include('includes/config.php');

	if (isset($_GET['email']) && isset($_GET['token'])) {
		

		$email = $conn->real_escape_string($_GET['email']);
		$token = $conn->real_escape_string($_GET['token']);

		$sql = $conn->query("SELECT id FROM users WHERE
			email='$email' AND token='$token' AND token<>'' 
		");

		if ($sql->num_rows > 0) {
			if(isset($_POST['reset'])){

			$password_1 = mysqli_real_escape_string($con, $_POST['password1']);
		$password_2 = mysqli_real_escape_string($con, $_POST['password2']);

		if ($password_1 == $password_2) {
		$password=md5($password_1);
		$query=mysqli_query($con,"UPDATE users SET token='', password = '$password'
				WHERE email='$email");
			
		}
		else if($password_1 != $password_2)
		{
		echo "<script>alert('Password mismatch');</script>";
		}
	}
}

			

			}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        


        <!-- App title -->
        <title>BLOG| Admin Panel</title>

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/core.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/components.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/pages.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/menu.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/responsive.css" rel="stylesheet" type="text/css" />


        <script src="assets/js/modernizr.min.js"></script>

    </head>


    <body class="bg-transparent" >

        <!-- HOME -->
        <section>
            <div class="container-alt">
                <div class="row">
                    <div class="col-sm-12">

                        <div class="wrapper-page">

                            <div class="m-t-40 account-pages">
                                <div class="text-center account-logo-box" style = "background: #6610f2;">
                                    <h2 class="text-uppercase">
                                        <a href="../index.php" class="text-success">
                                            <span><p style = "color:white;">Prabhat</p></span>
                                        </a>
                                    </h2>
                                    <!--<h4 class="text-uppercase font-bold m-b-0">Sign In</h4>-->
                                </div>
                                <div class="account-content">
                                    <form class="form-horizontal"  method="post">

                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password1" required="" placeholder="Password" autocomplete="off">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="password" name="password2" required="" placeholder="Confirm Password" autocomplete="off">
                                            </div>
                                        </div>

                                        


                     
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="reset">Reset Password</button>
                                                <p>Go Back to Login <a href="index.php">Sign in</a></p>
 
                                                    
                                            </div>
                                        </div>

                                    </form>

                                    <div class="clearfix"></div>

                                </div>
                            </div>
                            <!-- end card-box-->


                    

                        </div>
                        <!-- end wrapper -->

                    </div>
                </div>
            </div>
          </section>
          <!-- END HOME -->

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

        <!-- App js -->
        <script src="assets/js/jquery.core.js"></script>
        <script src="assets/js/jquery.app.js"></script>

    </body>
</html>
