<?php
require 'HTML5Validate.php';
$validator = new HTML5Validate();

$html = "<div class='login-form container text-center' style='width: 50%; margin-top: 100px;'>

<?php if(!$loggedin){ ?>
    <h1>Log in</h1>
    <form id='login-form'>
        <input type='hidden' name='action' value='do_login'>

        <div class='input-group mb-3'>
            <div class='input-group-prepend'>
                <span class='input-group-text'>Username</span>
            </div>
            <input type='text' class='form-control' name='username' placeholder='Username'>
        </div>

        <div class='input-group mb-3'>
            <div class='input-group-prepend'>
                <span class='input-group-text'>Password</span>
            </div>
            <input type='password' class='form-control' placeholder='Password' name='password'>
        </div>
        <div id='error' style='margin: 25px; color: red;'></div>
        <button type='button' class='btn btn-success' id='login-button'>Log in</button>
    </form>
    <h1 style='margin: 25px;'>Not registered?</h1>
    <button type='button' class='btn btn-primary' id='register-button'>Register</button>

<?php } else { ?> 
        <h1>Log Out</h1>
        <button type='button' class='btn btn-danger' id='logout-button'>Log out</button>
<?php } ?>

</div>";

$result = $validator->Assert($html);

echo "Result: " . $result . "\nMessage: " . $validator->message;
?>
