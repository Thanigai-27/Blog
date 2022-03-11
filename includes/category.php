
<div class="sidebar-box">
                <h3 class="heading">Categories</h3>
                <ul class="categories">
                  <?php $query=mysqli_query($con,"SELECT * FROM category where active=1");
                  while($row=mysqli_fetch_array($query))
                  {
                    $cat=$row['category_name'];
                    $result=mysqli_query($con,"SELECT * from posts where category='$cat' and published=1");
$count=mysqli_num_rows($result);
                    ?>
                  
                  <li><a href="category-single.php?cid=<?php echo htmlentities($row['category_name']);?>"><?php echo htmlentities($row['category_name']);?> <span><?php echo htmlentities('('.$count.')');?></span></a></li>
                <?php } ?>

                
                </ul>
              </div>