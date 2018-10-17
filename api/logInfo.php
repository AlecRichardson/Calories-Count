<?php
 if(!session_start()){
        header("Location: error.php");
        exit;
    }

$action = empty($_POST['action']) ? '' : $_POST['action'];

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	
	
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
    
    if(empty($_POST['date'])){
        echo 'Please select a date.';
        exit;
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
    $id = empty($_SESSION['id']) ? '99' : $_SESSION['id'];
  
    $date = $mysqli->real_escape_string($date);
    $breakfast = $mysqli->real_escape_string($breakfast);
    $lunch = $mysqli->real_escape_string($lunch);
    $dinner = $mysqli->real_escape_string($dinner);
    $other = $mysqli->real_escape_string($other);
  
     $query =  "insert into calorielog (userId, date, breakfast, lunch, dinner, other) values ('12', '$date', '$breakfast', '$lunch', '$dinner', '$other')";
    
    
    if($mysqli->query($query)){
       
        echo "success";    
    } else {
        echo "Error submitting entry, please contact the system administrator.";
    }
    $mysqli->close();
}

function login_form() {
		$username = "";
		$error = "";
		echo 'redirect';
	}

?>