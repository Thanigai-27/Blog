<?php
    require 'includes/PHPMailer.php';
    require 'includes/SMTP.php';
    require 'includes/Exception.php';
    include('includes/config.php');
     use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
if (isset($_POST['reset'])) {

  $email = mysqli_real_escape_string($con, $_POST['email']);

  // ensure that the user exists on our system
   $sql =mysqli_query($con,"SELECT id FROM users WHERE email='$email'");
        if ($sql->num_rows > 0) {

        $token = openssl_random_pseudo_bytes(16);
        $token = bin2hex($token);
        $token=substr($token,0,10);
    

        $query=mysqli_query($con,"UPDATE users SET token='$token', 
                      token_time=DATE_ADD(NOW(), INTERVAL 5 MINUTE)
                      WHERE email='$email'
            ");

    
    $mail = new PHPMailer(true);
//Set mailer to use smtp
    $mail->isSMTP();
//Define smtp host
    $mail->Host = "smtp.gmail.com";
//Enable smtp authentication
    $mail->SMTPAuth = true;
//Set smtp encryption type (ssl/tls)
    $mail->SMTPSecure = "tls";
//Port to connect smtp
    $mail->Port = "587";
//Set gmail username
    $mail->Username = "infoprabhatorg@gmail.com";
//Set gmail password
    $mail->Password = "Thanigai_7";
//Email subject
    $mail->Subject = "Reset Password";
//Set sender email
    $mail->setFrom('infoprabhatorg@gmail.com');
//Enable HTML
    $mail->isHTML(true);

//Email body
    $mail->Body = "
                Hi,<br><br>
                
                In order to reset your password, please click on the link below:<br>
                <a href='
                prabhat.epizy.com/users/reset-password.php?email=$email&token=$token
                '>prabhat.epizy.com/users/reset-password.php?email=$email&token=$token</a><br><br>
                
                Kind Regards,<br>
                Prabhat
            ";
//Add recipient
    $mail->addAddress($email);
    if ( $mail->send() ) {
         echo "<script>alert('Mail sent');</script>";

    }else{
         echo "<script>alert('Error');</script>";
    }
//Closing smtp connection
    $mail->smtpClose();
        }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        


        <!-- App title -->
        <title>Prabhat| Admin Panel</title>

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

                                        <div class="form-group ">
                                            <div class="col-xs-12">
                                                <input class="form-control" type="text" required="" name="email" placeholder="Email" autocomplete="off">
                                            </div>
                                        </div>

                                        


                     
                                        <div class="form-group account-btn text-center m-t-10">
                                            <div class="col-xs-12">
                                                <button class="btn w-md btn-bordered btn-danger waves-effect waves-light" type="submit" name="reset">Reset Password</button>
                                                
                                                    
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