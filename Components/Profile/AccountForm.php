<!-- <?php
if(!session_start()){
    header("Location: error.php");
    exit;
}

$id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];

require_once "../../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }

    $query = "select * from users where id='$id' limit 1";

    if($result = $mysqli->query($query)){
        while($row = $result->fetch_assoc()){
            $email = $row['email'];
        }
    }
?> -->

<script>
    $("#account-button").click(function() {
    $('#error').html('');
        $.post("./api/editAccount.php", $("#account-form").serialize(), function(data) {
            if(data === 'success'){
            history.pushState(null, null, "profile");
            evaluatePath("profile");
            } else{
                $('#error').html(data);
            }
        });
      });

      $("#account-back-button").click(function() {
            history.pushState(null, null, "profile");
            evaluatePath("profile");
      });
</script>
<div class='container text-center' style="width: 50%; margin-top: 100px;">
          
                <h1 style='margin-bottom: 50px;'>Update account</h1>

                <form id='account-form'>
                    <input type='hidden' name='action' value='do_log'>  
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                        <input type="email" class="form-control" name='email' placeholder="Email" value='<?php echo $email; ?>'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name='password'>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Confirm Password</span>
                        </div>
                        <input type="password" class="form-control" placeholder="Confirm Password" name='confirmPass'>
                    </div>

                    

                    <div id='error' style='margin:15px; color: red;'></div>
                    
                    <button type="button" class="btn btn-success" id='account-button'>Submit</button>
                    <button type="button" class="btn btn-danger" id='account-back-button'>Back</button>
                </form>
        </div>
   
 
         