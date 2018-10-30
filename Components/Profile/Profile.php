<?php
if(!session_start()){
    header("Location: error.php");
    exit;
}

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
$id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
?>

<link href='./Components/Profile/Profile.css' rel='stylesheet' type='text/css
'>

<script>
      $("#profile-back-button").click(function() {
            history.pushState(null, null, "dashboard");
            evaluatePath("dashboard");
      });
      $("#update-goals-button").click(function() {
            history.pushState(null, null, "update-goals");
            evaluatePath("update-goals");
      });
      $("#edit-account-button").click(function() {
            history.pushState(null, null, "edit-account");
            evaluatePath("edit-account");
      });
</script>

<div id="profile-container" class='container'>
        <h1 id='name'><?php echo $loggedin; ?></h1>
        <i id='avatar' class="fa fa-user fa-5x" aria-hidden="true"></i>
        <div id="columns">
            <div id="column-a">
            <h3 id='name'>Profile</h3>
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
                        $date = substr($row['addDate'], 0, 10);
                        $m = substr($date, 5, 2);
                        $d = substr($date, 8, 2);
                        $y = substr($date, 0, 4);
                        $joinDate = $m."/".$d."/".$y;
                        $date = substr($row['birthday'], 0, 10);
                        $m = substr($date, 5, 2);
                        $d = substr($date, 8, 2);
                        $y = substr($date, 0, 4);
                        $birthday = $m."/".$d."/".$y;


            ?>
                <div id='user-info'>
                    <ul id='user-info-list' class='container'>
                        <li class='list-item'><h5>First name </h5> <?php echo $row['firstName'];?></li>
                        
                        <li class='list-item'><h5>Last name </h5><?php echo $row['lastName'];?></li>
                        
                        <li class='list-item'><h5>Email </h5><?php echo $row['email'];?></li>
                        
                        <li class='list-item'><h5>Birthday </h5><?php echo $birthday;?></li>
                        
                        <li class='list-item'><h5>Date joined </h5><?php echo $joinDate;?></li>

                        <li class="list-item"><button type="button" id='edit-account-button' class="btn btn-warning">Edit account</button></li>
                        
                    </ul>
                </div>
            </div>    
            <!--  -->
                
            
        <div id="column-b">
            <h3 id='name'>Goals</h3>
            <div id='user-info'>
            <ul id='user-info-list' class='container' >
            <?php }}
                
                $query = "select * from goals where userId='$id' limit 1";

                if($result = $mysqli->query($query)){
                    while($row = $result->fetch_assoc()){
                ?>
                    
                        <li class='list-item'><h5>Current weight </h5> <?php echo empty($row['currentWeight']) ? 'N/A' : $row['currentWeight'];?></li>
                        
                        <li class='list-item'><h5>Goal weight </h5><?php echo  empty($row['goalWeight']) ? 'N/A' :$row['goalWeight'];?></li>
                        
                        <li class='list-item'><h5>Calorie goal </h5><?php echo empty($row['calorieGoal']) ? 'N/A' : $row['calorieGoal'];?></li>
                        
                        <li class='list-item'><h5>Activity level </h5><?php echo empty($row['activityLevel']) ? 'N/A' : $row['activityLevel'];?></li>
                        
                        <li class='list-item'><h5>Workouts per week </h5><?php echo empty($row['workouts']) ? 'N/A' : $row['workouts'];?></li>

                <?php }} $mysqli->close(); ?>
                
                        <li class="list-item"><button type="button" class="btn btn-warning" id='update-goals-button'>Update goals</button></li>
                    </ul>
            </div>
        </div> 

                    
                    <!--  -->
    </div>
    <button type="button" class="btn btn-danger" id='profile-back-button'>Back</button>
</div>
 
         