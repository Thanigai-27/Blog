<?php

include('users/includes/config.php');
$postid=intval($_GET['pid']);
$query=mysqli_query($con,"UPDATE posts set views=views+1 where id=$postid" );
$result=mysqli_query($con,"SELECT * from rating_info where rating_action='like' and post_id='$postid'");
$countlikes=mysqli_num_rows($result);
$insertlikes=mysqli_query($con,"UPDATE posts set likes='$countlikes' where id='$postid'");
$res=mysqli_query($con,"SELECT * from rating_info where rating_action='dislike' and post_id='$postid'");
$countdislikes=mysqli_num_rows($res);
$insertdislikes=mysqli_query($con,"UPDATE posts set dislikes='$countdislikes' where id='$postid'");

$ip = $_SERVER['REMOTE_ADDR']; 

$visitor_ip=$ip;

$type=-1;
$sql=mysqli_query($con,"SELECT * from devices where ip_address='$visitor_ip' and post_id='$postid'");
$total=mysqli_num_rows($sql);
if($total<1)
{
  $devices=mysqli_query($con,"INSERT INTO devices (ip_address,post_id) VALUES ('$visitor_ip','$postid')");
}


$user_id=$ip;

function userLiked($post_id)
{
  global $con;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id='$user_id'
          AND post_id=$post_id AND rating_action='like'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}

function userDisliked($post_id)
{
  global $con;
  global $user_id;
  $sql = "SELECT * FROM rating_info WHERE user_id='$user_id' 
        AND post_id=$post_id AND rating_action='dislike'";
  $result = mysqli_query($con, $sql);
  if (mysqli_num_rows($result) > 0) {
    return true;
  }else{
    return false;
  }
}
function getLikes($id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE post_id = $id AND rating_action='like'";
  $rs = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($rs);

  return $result[0];
}

// Get total number of dislikes for a particular post
function getDislikes($id)
{
  global $con;
  $sql = "SELECT COUNT(*) FROM rating_info 
        WHERE post_id = $id AND rating_action='dislike'";
  $rs = mysqli_query($con, $sql);
  $result = mysqli_fetch_array($rs);
  return $result[0];
}



if (isset($_POST['action'])) {
  $post_id = $_POST['post_id'];
  $action = $_POST['action'];

  
  switch ($action) {
    case 'like':
         $sql="INSERT INTO rating_info (user_id, post_id, rating_action) 
             VALUES ('$user_id', $post_id, 'like') 
             ON DUPLICATE KEY UPDATE rating_action='like'";
         break;
    case 'dislike':
          $sql="INSERT INTO rating_info (user_id, post_id, rating_action) 
               VALUES ('$user_id', $post_id, 'dislike') 
             ON DUPLICATE KEY UPDATE rating_action='dislike'";
         break;
    case 'unlike':
        $sql="DELETE FROM rating_info WHERE user_id='$user_id' AND post_id=$post_id";
        break;
    case 'undislike':
          $sql="DELETE FROM rating_info WHERE user_id='$user_id' AND post_id=$post_id";
      break;
    default:
      break;
  }

  
  mysqli_query($con, $sql);
  
  
  
  
  
}


?>
<?php include 'includes/header.php'; ?>



    <div class="wrap">

<?php include 'includes/navigation.php'; ?>

      <!-- END header -->

    <section class="site-section py-lg">
      <div class="container">
        
        <div class="row blog-entries element-animate">

          <div class="col-md-12 col-lg-8 main-content">
            
             <?php
                       $postid=intval($_GET['pid']);
                       $sql=mysqli_query($con,"SELECT * from posts where id=$postid"); 
                       while($post=mysqli_fetch_array($sql))
                       {
                        ?>
                        <img src="users/postimages/<?php echo htmlentities($post['image']);?>" alt="Image" width="750" height="400" class="img-fluid mb-5">
                        <div class="post-meta">
                          <?php
                       $id=$post['user_id'];
                       $sql=mysqli_query($con,"SELECT image from users where id=$id"); 
                       while($img=mysqli_fetch_array($sql))
                       {
                        ?>
                        <?php if($img['image']==NULL)
{
    ?>
     <span class="author mr-2"><img src="users/assets/images/users/avatar-1.png" alt="profile-image" class="mr-2"> <?php echo htmlentities(strtolower($post['username']));?></span>&bullet;
<?php } else {?>
 <span class="author mr-2"><img src="users/profile_images/<?php echo htmlentities($img['image']);?>"alt="profile-image" class="mr-2"> <?php echo htmlentities(strtolower($post['username']));?></span>&bullet;

<?php } ?>
         
                        
                      <?php }?>
                        <span class="mr-2"><?php echo date('F j, Y',strtotime($post['published_date'])); ?> </span> &bullet;
                        <span class="ml-2"><span class="fa fa-comments"></span><?php echo htmlentities($post['views']);?></span>
                      </div>
            <h1 class="mb-4"><?php echo htmlentities($post['title']);?></h1>
            <a class="category mb-5" href="#"><?php echo htmlentities($post['category']);?></a>           
            <div class="post-content-body">
             <p><?php echo ($post['content']);?></p>


        

            

                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                
            
<!-- Rating System -->

<?php } ?>
<div class="post-action">

        <i <?php if (userLiked($postid)): ?>
            class="fa fa-thumbs-up like-btn"
          <?php else: ?>
            class="fa fa-thumbs-o-up like-btn"
          <?php endif ?>
          data-id="<?php echo $postid ?>"></i>
          <span class="likes"><?php echo getLikes($postid); ?></span>

            &nbsp;&nbsp;&nbsp;&nbsp;
        
           <i 
          <?php if (userDisliked($postid)): ?>
            class="fa fa-thumbs-down dislike-btn"
          <?php else: ?>
            class="fa fa-thumbs-o-down dislike-btn"
          <?php endif ?>
          data-id="<?php echo $postid?>"></i>
            <span class="dislikes"><?php echo getDislikes($postid); ?></span>
     </div>

            </div>


<div class="pt-5">

 <?php $query=mysqli_query($con,"SELECT * from comments where status=1 and post_id='$postid'");
              $count=mysqli_num_rows($query);
              ?>
              <h3 class="mb-5"><?php echo htmlentities($count);?>  Comments</h3>
              
         </div> 
        <?php if($count!=0)
        {

          ?>

 <button  id="comment" onclick="myFunction()" style=" background:none;
  border: none;
  outline:none;
  padding: 0!important;
color:#6610f2;
font-size:24px;
  
">Show Comments</button>
<?php } ?>

            <div class="pt-5" id="toggle" style="display:none" >
             
              
            
                 <?php 

                 $query=mysqli_query($con,"SELECT * from comments where status=1 and post_id='$postid'");
                                while($row=mysqli_fetch_array($query))
                                  
                 {
                   $sql=mysqli_query($con,"SELECT * from posts where id='$postid'");
              $username=mysqli_fetch_assoc($sql);



                 ?> 
                 
                  <div class="comment-body">
                    <h5><?php echo htmlentities($row['name']);?></h5>
                    <div class="meta"><?php echo date('F j, Y',strtotime($row['comment_date'])); ?></div>
                    <p><?php echo htmlentities($row['body']);?></p>
                    
              
                     
               
                
                  <?php if($row['reply']==1)
                  {
                    ?>
                    <button  id="but" style=" background:none;
  border: none;
  outline:none;
  padding: 0!important;
color:#6610f2;
  
">Reply</button>
                  
                    <h5 style="margin-left:30px"><?php echo htmlentities($username['username']);?></h5>
                  <div class="meta" style="margin-left:30px"><?php echo date('F j, Y',strtotime($row['reply_date'])); ?></div>
                    <p style="margin-left:30px"><?php echo htmlentities($row['reply_body']);?></p>
                  
                <?php  }
                  ?>


                    
                
                


                  </div>
                <?php } ?>  
                </div>                 
            
                <script>
                  function myFunction() {
                    document.getElementById("comment").value="Hide Reply";
  var x = document.getElementById("toggle");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
</script>

           <?php
             if(isset($_POST['comment']))
             {
              $name=$_POST['name'];
              $email=$_POST['email'];
              $body=$_POST['body'];
               $result=mysqli_query($con,"SELECT user_id from posts where id='$postid'");
                $post = mysqli_fetch_assoc($result);
              if (!filter_var($email, FILTER_VALIDATE_EMAIL))
                {

        echo "<script>alert('Invalid Email ID');</script>";
                }
              $sql =mysqli_query($con,"INSERT INTO comments (name,email,body,post_id,user_id) VALUES ('$name', '$email','$body','$postid'," . $post['user_id'] . ")");


                

  


             }

             ?> 
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                  <form method="post" action="blog-single.php?pid=<?php echo htmlentities($postid);?>" class="p-5 bg-light">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control" id="name">
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email">
                  </div>
                

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="body" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" name="comment" id="submit_comment" class="btn btn-primary">
                  </div>

                </form>
              </div>
            

          </div>
         

          <!-- END main-content -->

          <div class="col-md-12 col-lg-4 sidebar">
            <div class="sidebar-box search-form-wrap">
             
            </div>
            <!-- END sidebar-box -->
            <?php
                $sql=mysqli_query($con,"SELECT * from posts where id=$postid"); 
                       while($post=mysqli_fetch_array($sql))
                       {
                        ?>
                         <?php
                       $id=$post['user_id'];
                       $sql=mysqli_query($con,"SELECT * from users where id=$id"); 
                       while($img=mysqli_fetch_array($sql))
                       {
                        ?>
                        <?php if($img['content']!=NULL)
                        {
                          ?>
                        
            <div class="sidebar-box">
              <div class="bio text-center">
                
                          <?php if($img['image']==NULL)
                          {
                            ?>
                             <img src="users/assets/images/users/avatar-1.png" alt="Image Placeholder" class="img-fluid">
                        <?php }else  { ?>
                <img src="users/profile_images/<?php echo htmlentities($img['image']);?>" alt="Image Placeholder" class="img-fluid">
              <?php }?>
                <div class="bio-body">
                  <h2><?php echo htmlentities($img['username']);?></h2>
                  <p><?php echo $img['content'];?></p>
                  
                
                <?php }}} ?>
                </div>
              </div>

            </div>
            <!-- END sidebar-box -->  
           <?php include 'includes/related_posts.php'; ?>
            <!-- END sidebar-box -->

            <?php include 'includes/category.php'; ?>
            <!-- END sidebar-box -->

           
          <!-- END sidebar -->

        </div>
      </div>
    </div>
    </section>


   
    <!-- END section -->
  
   
<?php include 'includes/footer.php'; ?>
      </footer>
      <!-- END footer -->

    </div>
    
    <!-- loader -->

    
    <div id="loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#f4b214"/></svg></div>

    <script src="js/jquery-3.2.1.min.js"></script>
    
<script type="text/javascript">
   $(document).ready(function(){

 
       $('.like-btn').on('click', function(){
       
  var id = $(this).data('id');

  var action;
  $clicked_btn=$(this);
  if($clicked_btn.hasClass('fa-thumbs-o-up')){
    action='like';
  }
  else if($clicked_btn.hasClass('fa-thumbs-up'))
  {
          action='unlike';
}
   $.ajax({
            
           url:'blog-single.php?pid=<?php echo htmlentities($postid);?>',
           data:{post_id:id,
            action:action},
           type:'POST',
           success:function(data){
            
            if(action =="like"){
  $clicked_btn.removeClass('fa-thumbs-o-up');
        $clicked_btn.addClass('fa-thumbs-up');
}
if(action=="unlike")
{
   $clicked_btn.removeClass('fa-thumbs-up');
        $clicked_btn.addClass('fa-thumbs-o-up');
}


  $clicked_btn.siblings('i.fa-thumbs-down').removeClass('fa-thumbs-down').addClass('fa-thumbs-o-down');
  window.location.reload();

}
});
       });



         $('.dislike-btn').on('click', function(){
  var id = $(this).data('id');
  $clicked_btn=$(this);
  
  if($clicked_btn.hasClass('fa-thumbs-o-down')){
    var action='dislike';
  }
  else if($clicked_btn.hasClass('fa-thumbs-down'))
  {
          var action='undislike';
  }
   $.ajax({
            
           url:'blog-single.php',
           data:{post_id:id,
            action:action},
           type:'POST',
           success:function(data){
               
               if(action == "dislike"){
  $clicked_btn.removeClass('fa-thumbs-o-down');
        $clicked_btn.addClass('fa-thumbs-down');
}
if(action=="undislike")
{
   $clicked_btn.removeClass('fa-thumbs-down');
        $clicked_btn.addClass('fa-thumbs-o-down');
}

      

  $clicked_btn.siblings('i.fa-thumbs-up').removeClass('fa-thumbs-up').addClass('fa-thumbs-o-up');
  window.location.reload();
  
}
});
       });
       
       
       
   });
    
</script>
 

    
    
    <script src="js/jquery-migrate-3.0.0.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.stellar.min.js"></script>
<script src="js/time_ago.js"></script>
<script src="js/main.js"></script>
      
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
      


  </body>
</html>