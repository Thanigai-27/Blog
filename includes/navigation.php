<header role="banner">
        <div class="top-bar">
          <div class="container">
            <div class="row">
              <div class="col-9 social">
                
                <a><span class="fa fa-facebook"></span></a>
                <a><span class="fa fa-instagram"></span></a>
                <a><span class="fa fa-linkedin"></span></a>
                <a><span class="fa fa-youtube-play"></span></a>
              </div>
              <div class="col-3 search-top">
                <!-- <a href="#"><span class="fa fa-search"></span></a> -->
                <form action="search.php" class="search-top-form"  method="post">
                  <span class="icon fa fa-search"></span>
                  <input type="text" id="s" name="search" placeholder="Type keyword to search...">
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="container logo-wrap">
          <div class="row pt-5">
            <div class="col-12 text-center">
              <a class="absolute-toggle d-block d-md-none" data-toggle="collapse" href="#navbarMenu" role="button" aria-expanded="false" aria-controls="navbarMenu"><span class="burger-lines"></span></a>
              <h1 class="site-logo"><a href="index.php">BLOG</a></h1>
            </div>
          </div>
        </div>
        
        <nav class="navbar navbar-expand-md  navbar-light bg-light">
          <div class="container">
            
           
            <div class="collapse navbar-collapse" id="navbarMenu">
              <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                  <a class="nav-link active" href="index.php"><center>Home</center></a>
                </li>
                
                

                </li>

                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="category.html" id="dropdown05" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                  <div class="dropdown-menu" aria-labelledby="dropdown05">
                    <?php $query=mysqli_query($con,"SELECT * from category where active=1");
    while($row=mysqli_fetch_array($query))
    {
        ?>
                    <a class="dropdown-item" href="category-single.php?cid=<?php echo htmlentities($row['category_name']);?>"><?php echo htmlentities($row['category_name']);?></a>
                  <?php }?>
                   
                  </div>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">About Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link"  href="contact.php">Contact</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link"  href="http://learninggroup.club/">Services</a>
                </li>
                
               
       </ul>

                  
                                
             
                   <p><a href="users/index.php" class="btn btn-primary btn-sm rounded">CREATE YOUR OWN BLOG</a></p>
               



              
            </div>
          </div>
        </nav>
      </header>