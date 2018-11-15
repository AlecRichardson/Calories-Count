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
<div class="container">
    <div id='post-container'>
    <?php
        
         require_once "../../config/db.conf";
    
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
         if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }

        $query = "select * from posts where id='$postId[1]'";
        $query = "select posts.id, posts.date, posts.userId as postId, posts.user as postUser, posts.title, posts.post,
        replies.id, replies.postId, replies.userId as replyId, replies.user as replyUser, replies.reply from 
        posts inner join replies on posts.id = replies.postId where posts.id = '$postId[1]' and
        replies.postId = '$postId[1]';";
        if($result = $mysqli->query($query)){
          while($row = $result->fetch_assoc()){ 
          ?>
      <div id="post">
        <h3 class='text-center'><?php echo $row['posts.title']; ?></h3>
          
        <h5>Posted by: <?php echo $row['postUser']; ?></h5>
        <div><?php echo $row['post']; ?></div>
        <h5 class='date'>Posted on: <?php echo $row['date']; ?></h5>
      </div>
      <div id='post-buttons'>    
            <button type="button" class="btn btn-warning" id='reply-button' style='width: 100px;'>Reply</button>

            <button type="button" class="btn btn-danger" id='post-back-button' style='width: 100px;'>Back</button>     
        </div>
        
          <?php }} ?>
        

        
    
    </div>
</div>