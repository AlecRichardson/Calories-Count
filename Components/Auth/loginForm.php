<?php
if(!session_start()){
    header("Location: ../Error/error.php");
    exit;
}
$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
?>
<script>
   $("#login-button").click(function() {
        $.post("./api/login.php", $("#login-form").serialize(), function(data) {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
        });
      });

       $("#logout-button").click(function() {
        $.get("./api/logout.php",function(data) {
            console.log("ONLOGOUT", data);
            history.pushState(null, null, "login");
            evaluatePath("login");
        });
      });
</script>
<div class='login-form container text-center' style="width: 50%;">

            <?php if(!$loggedin){ ?>
                <h1>Log in</h1>
                <?php if($error){ ?>
                <div><?php $error ?></div> <?php } ?>

                <form id='login-form'>
                    <input type='hidden' name='action' value='do_login'>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Username</span>
                        </div>
                        <input type="text" class="form-control" name='username' placeholder="Username">
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name='password'>
                    </div>

                    <button type="button" class="btn btn-success" id='login-button'>Log in</button>
                </form>

            <?php } else { ?> 
                    <h1>Log Out</h1>
                    <button type="button" class="btn btn-danger" id='logout-button'>Log out</button>
            <?php } ?>

        </div>
 