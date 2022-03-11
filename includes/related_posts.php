 <div class="sidebar-box">
                <h3 class="heading">Related Posts</h3>
                <div class="post-entry-sidebar">
                  <ul>
                      <?php
                       
                       $sql=mysqli_query($con,"SELECT * from posts where id='$postid'"); 
                       $post=mysqli_fetch_assoc($sql);
                        
                      ?>
                      
                      <?php
                        $cat=$post['category'];
                        $query=mysqli_query($con,"SELECT * from posts where category='$cat' and published=1 LIMIT 3" );
                        while($title=mysqli_fetch_array($query))
                       {
                        ?>
                        
                    <li>
                      <a href="blog-single.php?pid=<?php echo htmlentities($title['id']);?>">
                        <img src="users/postimages/<?php echo htmlentities($title['image']);?>"alt="Image placeholder"  width="500" height="75"class="mr-4">
                        <div class="text">
                          <h4><?php echo htmlentities($title['title']);?></h4>
                          <div class="post-meta">
                            <span class="mr-2"><?php echo date('F j, Y',strtotime($title['published_date'])); ?> </span>
                          </div>
                        </div>
                      </a>
                    </li>
                  <?php } ?>
                    
                    
                  </ul>
                </div>
              </div>