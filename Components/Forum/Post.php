<?php

	if(!session_start()) {
		header("Location: ../error.php");
		exit;
    }
    $postId = empty($_SESSION['postId']) ? '99' : $_SESSION['postId'];
    $postId = explode("-", $postId);
    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
?>
<link href="./Components/Forum/Post.css" rel="stylesheet" type="text/css" />
<script>
    $("#reply-button").click(function() {
            history.pushState(null, null, "reply");
            evaluatePath("reply");
      });

      $("#post-back-button").click(function() {
            history.pushState(null, null, 'forum');
            evaluatePath("forum");
      });

      $("#like-button").click(function() {
          console.log('liked butto clicked');
        $.post("./api/likePost.php", function(data) {
            console.log('like data', data);
            if(data === 'success'){
               
                var path = '<?php echo $_SESSION['postId']; ?>';
                history.pushState(null, null, path);
                evaluatePath("post");
            }
        });
  });
</script>

<div class="container">
    <div id='post-container'>
    <?php
        
         require_once "../../config/db.conf";
    
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
         if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }

        $query = "select posts.*, count(likes.id) as likes from posts left join 
        likes on likes.postId = posts.id where posts.id='$postId[1]' group by posts.id order by date, posts.id";
        if($result = $mysqli->query($query)){
          while($row = $result->fetch_assoc()){ 
          ?>
      <div id="post">
        
            <h3 class='text-center'><?php echo $row['title']; ?></h3>
            <h5>Posted by: <?php echo $row['user']; ?></h5>
            <div id="post-content">
                <div><?php echo $row['post']; ?></div>
            </div>
            <button type="button" id='like-button' class="btn btn-success">
                <span><i class="fa fa-thumbs-up"></i></span> Like
            </button>
            <span id='likes' style='margin-left: 10px;'><?php echo $row['likes']; ?></span>
            <h5 class='date'>Posted on: <?php echo $row['date']; ?></h5>
        
      </div>
      <div id='post-buttons'>    
            <button type="button" class="btn btn-warning" id='reply-button' style='width: 100px;'>Reply</button>

            <button type="button" class="btn btn-danger" id='post-back-button' style='width: 100px;'>Back</button>     
        </div>
        
          <?php 
          }
        } 
        $query = "select * from replies where postId='$postId[1]' order by date desc";

        if($result = $mysqli->query($query)){
          while($row = $result->fetch_assoc()){ 
          ?>
      <div class="reply">
        <h6>Reply from: <?php echo $row['user']; ?></h6>
        <div id="post-content">
            <div><?php echo $row['reply']; ?></div>
        </div>
        <h6 class='date'>Posted on: <?php echo $row['date']; ?></h6>
      </div>
      <?php
          }}
    ?>
    
        
    
    </div>
</div>