            <div class="topbar">

                <!-- LOGO -->
                <div class="topbar-left">
                    <a href="../index.php" class="logo"><span>BLOG</span></span><i class="mdi mdi-layers"></i></a>
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
                <div class="navbar navbar-default" role="navigation">
                    <div class="container">

                        <!-- Navbar-left -->
                        <ul class="nav navbar-nav navbar-left">
                            <li>
                                <button class="button-menu-mobile open-left waves-effect">
                                    <i class="mdi mdi-menu"></i>
                                </button>
                            </li>
                     
                    
                        </ul>

                        <!-- Right(Notification) -->
                        <ul class="nav navbar-nav navbar-right">
                          
                            <?php if(strlen($_SESSION['login'])!=0)?>
                            <?php 
                            $userid=$_SESSION['user']['id'];
                            $sql = "SELECT * FROM users WHERE id=$userid";
                            $query=mysqli_query($con,$sql);
                            while($row=mysqli_fetch_array($query))
{
?>
                            <li class="dropdown user-box">
                                
                                    <a href="" class="dropdown-toggle waves-effect user-link" data-toggle="dropdown" aria-expanded="true">
                                    <?php if($row['image']==NULL)
{
    ?>
    <img src="assets/images/users/avatar-1.png" alt="user-img" class="img-circle user-img" />
<?php } else {?>

<img src="profile_images/<?php echo htmlentities($row['image']);?>" class="img-circle user-img"/>
<?php } ?>
                                   
                                
                                </a>

                                

                            
                            <?php } ?>

                                <ul class="dropdown-menu dropdown-menu-right arrow-dropdown-menu arrow-menu-right user-list notify-list">
                                    <li>
                                        <h2>Hi
                                        <?php echo $_SESSION['user']['username'];?>

                                         

                                    
                                    </h2>
                                    </li>

                                    
                                    
                                    
                              
                                    
                           
                                    <li><a href="logout.php"><i class="ti-power-off m-r-5"></i> Logout</a></li>
                                </ul>
                            </li>

                        </ul> <!-- end navbar-right -->

                    </div><!-- end container -->
                </div><!-- end navbar -->
            </div>