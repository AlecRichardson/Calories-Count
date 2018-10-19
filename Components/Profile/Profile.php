<?php
if(!session_start()){
    header("Location: error.php");
    exit;
}

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
?>

<link href='./Components/Profile/Profile.css' rel='stylesheet' type='text/css
'>

<script>
    $("#profile-button").click(function() {
    $('#error').html('');
        $.post("./api/createUser.php", $("#profile-form").serialize(), function(data) {
            if(data === 'success'){
            history.pushState(null, null, "login");
            evaluatePath("login");
            } else{
                $('#error').html(data);
            }
        });
      });

      $("#profile-back-button").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
      });
</script>
<div id="profile-container" class='container'>
    <div id='column-1'>
        <h1 id='name'><?php echo $loggedin; ?></h1>
        <?php
            require_once "../../config/db.conf";
    
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
        
             if($mysqli->connect_error){
                die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
            }
            $id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
            $query = "select * from users where id='$id'";
                
            if($result = $mysqli->query($query)){ 
                while($row = $result->fetch_assoc()){
        ?>
            <div id='user-info'>
                <ul id='user-info-list'>
                    <li class='list-item'><h5>First name: </h5> <?php echo $row['firstName'];?></li>
                    <br />
                    <li class='list-item'><h5>Last name: </h5><?php echo $row['lastName'];?></li>
                    <br />
                    <li class='list-item'><h5>Email: </h5><?php echo $row['email'];?></li>
                    <br />
                    <li class='list-item'><h5>Birthday: </h5><?php echo $row['birthday'];?></li>
                    <br />
                    <li class='list-item'><h5>Date joined: </h5><?php echo $row['addDate'];?></li>
                    <br />
                </ul>
            </div>
            <?php }} 
            $mysqli->close();
            ?>
    </div>
    <div class='profile-form text-center' id='column-2' style="width: 50%; margin-top: 100px;">
            
                    <h1 id='header'>My Profile</h1>

                    <form id='profile-form'>
                        <input type='hidden' name='action' value='do_create'>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Calorie goal</span>
                            </div>
                            <input type="text" class="form-control" name='goal' placeholder="Calorie goal">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Last Name</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Last name" name='lastName'>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Username</span>
                            </div>
                            <input type="text" class="form-control" placeholder="Username" name='username'>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Password</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Password" name='password'>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Confirm password</span>
                            </div>
                            <input type="password" class="form-control" placeholder="Confirm password" name='confirmPass'>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Birthday</span>
                            </div>
                            <input type="date" class="form-control" placeholder="Birthday" name='birthday'>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Email</span>
                            </div>
                            <input type="email" class="form-control" placeholder="Email" name='email'>
                        </div>

                        <div id='error' style='margin:15px; color: red;'></div>
                        
                        <button type="button" class="btn btn-success" id='profile-button'>Save</button>
                        <button type="button" class="btn btn-danger" id='profile-back-button'>Back</button>
                    </form>
        </div>
</div>
 
         