<?php
 if(!session_start()){
        header("Location: error.php");
        exit;
    }

    $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
    
    $action = empty($_POST['action']) ? '' : $_POST['action'];
    
	if (!$loggedin) {
		header("Location: ../error.php");
		exit;
	} 

if ($action == 'do_log') {
		handle_log(); 
	} else {
		login_form();
    }
    
function handle_log(){
    
    $currentWeight = empty($_POST['currentWeight']) ? '' : $_POST['currentWeight'];
    $goalWeight = empty($_POST['goalWeight']) ? '' : $_POST['goalWeight'];
    $calorieGoal = empty($_POST['calorieGoal']) ? '' : $_POST['calorieGoal'];
    $activityLevel = empty($_POST['activityLevel']) ? 'Not Very Active' : $_POST['activityLevel'];
    $workouts = empty($_POST['workouts']) ? '0' : $_POST['workouts'];
   
    if(!$currentWeight || !$goalWeight || !$calorieGoal || !$activityLevel || !$workouts){
        echo 'All fields are required.';
        exit;
    }
    

   require_once "../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
    $currentWeight = $mysqli->real_escape_string($currentWeight);
    $goalWeight = $mysqli->real_escape_string($goalWeight);
    $calorieGoal = $mysqli->real_escape_string($calorieGoal);
    $activityLevel = $mysqli->real_escape_string($activityLevel);
    $workouts = $mysqli->real_escape_string($workouts);

    $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];
    
    $query = "select * from goals where userId='$id' limit 1";
    
    if($result = $mysqli->query($query)){

        if(mysqli_num_rows($result) < 1){
            $query =  "insert into goals (userId, currentWeight, goalWeight, calorieGoal, ActivityLevel, workouts) values('$id', '$currentWeight', '$goalWeight', '$calorieGoal', '$activityLevel', '$workouts')";
        } else{
            $query =  "update goals set currentWeight ='$currentWeight', goalWeight = '$goalWeight', calorieGoal = '$calorieGoal', activityLevel = '$activityLevel', workouts = '$workouts' where userId = '$id';"; 
        }


        if($result = $mysqli->query($query)){
            echo 'success';
        } else {
            echo 'Error updating goals, please try again later';
        }
    }
    $mysqli->close();

}

function login_form() {
		echo "redirect";
	}

?>