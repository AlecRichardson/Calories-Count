<?php

	if(!session_start()) {
		header("Location: ../error.php");
		exit;
    }
    $postId = empty($_SESSION['postId']) ? '99' : $_SESSION['postId'];
    $postId = explode("-", $postId);
    $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
?>
<script>
    $("#post-button").click(function() {

    $('#error').html('');
        $.post("./api/createPost.php", $("#post-form").serialize(), function(data) {
            if(data === 'success'){
                console.log('success data',data);
            history.pushState(null, null, "forum");
            evaluatePath("forum");
            } else{
                console.log('faildata', data);
                $('#error').html(data);

            }
        });
      });

      $("#post-back-button").click(function() {
            history.pushState(null, null, "forum");
            evaluatePath("forum");
      });
</script>
<div class='post-form container text-center' style="width: 50%; margin-top: 100px;">
          
                <h1>Create a Post</h1>

                <form id='post-form'>
                <input type='hidden' name='action' value='do_create'>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Title</span>
                        </div>
                        <input type="text" class="form-control" name='title' placeholder="Title">
                    </div>

                    <div class="input-group mb-3">
                        <textarea  class="form-control" maxlength="1000" rows='20' cols='20' placeholder="Post" name='post'></textarea>
                    </div>

                    
                    <div id='error' style='margin:15px; color: red;'></div>
                    
                    <button type="button" class="btn btn-success" id='post-button' style='width: 100px;'>Post</button>

                    <button type="button" class="btn btn-danger" id='post-back-button' style='width: 100px;'>Back</button>
                </form>
        </div>
 
         