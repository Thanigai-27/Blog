 <div class="sidebar-box">
                <h3 class="heading">Popular Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                     <?php

                      
                       
                       $sql=mysqli_query($con,"SELECT * from posts where published=1 ORDER BY views DESC LIMIT 3"); 
                       while($post=mysqli_fetch_array($sql))
                       {
                        ?>
                    <li>
                      <a href="blog-single.php?pid=<?php echo htmlentities($post['id']);?>">
                        <img src="users/postimages/<?php echo htmlentities($post['image']);?>"alt="Image placeholder"  width="500" height="75"class="mr-4">
                        <div class="text">
                          <h4><?php echo htmlentities($post['title']);?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?php echo date('F j, Y',strtotime($post['published_date'])); ?> </span>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                    
                    
                  </ul>
                </div>
              </div>