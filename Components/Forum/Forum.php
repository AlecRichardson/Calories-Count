<?php if(!session_start()){ header("Location: error.php"); exit; } $loggedin =
empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin']; ?>
<script>
  $("#post-button").click(function() {
    history.pushState(null, null, "create-post");
    evaluatePath("create-post");
  });

  $(".view-post-button").click(function() {
    var postId = {id:$(this).attr('id')};
    console.log(postId);
        $.post("./api/setSession.php", postId, function(data){
            history.pushState(null, null, postId.id);
            evaluatePath("post");
        })
      });
</script>

<link href="./Components/Forum/Forum.css" rel="stylesheet" type="text/css" />
<div class="container">
  <div id="forum-header">
    <h1 id="forum-title">Community Forum</h1>
    <h3 class="text-center">
      Get involved with the community by sharing tips, progress, or asking
      questions here.
    </h3>
  </div>
  <div id="forum-container">
    <button type="button" id="post-button" class="btn btn-warning text-center">
      Create Post
    </button>
    <?php
        if($_SESSION['error']){echo '<div>'.$_SESSION['error'].'</div>';}
        
         require_once "../../config/db.conf";
    
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
         if($mysqli->connect_error){
            die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
        }

        $query = "select * from posts order by date, id desc";
            
        if($result = $mysqli->query($query)){
          while($row = $result->fetch_assoc()){ 
          ?>
      <div class="post">
        <h4><?php echo $row['title']; ?></h4>
          
        <div>Posted by: <?php echo $row['user']; ?></div>

          <button type="button" id='post-<?php echo $row['id']; ?>' class="btn btn-warning view-post-button"
          >
            View post
          </button>
          <span class='date'>Posted on: <?php echo $row['date']; ?></span>
      </div>
          <?php }} ?>
  </div>
</div>
