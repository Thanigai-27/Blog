<?php
                      
                       $sql=mysqli_query($con,"SELECT * FROM posts where published=1 ORDER BY published_date DESC LIMIT $offset, $no_of_records_per_page "); 
                       while($post=mysqli_fetch_array($sql))
                       {
                        ?>

                <div class="col-md-6">
                   

                 
                  <a href="blog-single.php?pid=<?php echo htmlentities($post['id']);?>"class="blog-entry element-animate" data-animate-effect="fadeIn">
                    <img src="users/postimages/<?php echo htmlentities($post['image']);?>" alt="Image placeholder" width="400" height="200">
                    <div class="blog-content-body">
                      <div class="post-meta">
                       
                        
                        <span class="mr-2"><?php echo date('F j, Y',strtotime($post['published_date'])); ?></span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span><?php echo htmlentities($post['views']);?> </span>
                      </div>
                      <h2><?php echo htmlentities($post['title']);?></h2>
                    </div>
                  </a>
                </div>
              <?php } ?>

