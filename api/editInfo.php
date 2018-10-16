<?php
 if(!session_start()){
        header("Location: error.php");
        exit;
    }

    $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if (!$loggedin) {
		header("Location: ../Login/loginForm.php");
		exit;
	} 

if ($action == 'do_log') {
		handle_log(); 
	} else {
		login_form();
    }
    
function handle_log(){
    if(empty($_POST['date'])){
        $error = 'Error: Please select a date';
        echo $error;
    }

    $date = empty($_POST['date']) ? '' : $_POST['date'];
    $breakfast = empty($_POST['breakfast']) ? '0' : $_POST['breakfast'];
    $lunch = empty($_POST['lunch']) ? '0' : $_POST['lunch'];
    $dinner = empty($_POST['dinner']) ? '0' : $_POST['dinner'];
    $other = empty($_POST['other']) ? '0' : $_POST['other'];
   
    

   require_once "../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    $id = empty($_SESSION['edit-id']) ? '99' : $_SESSION['edit-id'];
    
    $date = $mysqli->real_escape_string($date);
    $breakfast = $mysqli->real_escape_string($breakfast);
    $lunch = $mysqli->real_escape_string($lunch);
    $dinner = $mysqli->real_escape_string($dinner);
    $other = $mysqli->real_escape_string($other);
 
     $query =  "update calorielog set date ='$date', breakfast = '$breakfast', lunch = '$lunch', dinner = '$dinner', other = '$other' where id = '$id';";
    
    
    if($mysqli->query($query) === TRUE){
       
        echo "Calorie log updated successfully!";
        
    
    } else {
        echo "Updating the calorie log was unsuccessful";
    }
    
    $mysqli->close();
}

function login_form() {
		$username = "";
		$error = "";
		echo "redirect";
	}

?>