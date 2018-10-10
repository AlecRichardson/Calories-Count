<?php
	if(!session_start()){
        header("Location: ../error.php");
        exit;
    }

	$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
	
	
	if (!$loggedin) {
		header("Location: ../Login/loginForm.php");
		exit;
	} 
        
  $id = empty($_POST['id']) ? '' : $_POST['id'];
   
    

   require_once "../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
  
    $id = $mysqli->real_escape_string($id);
 
    $query =  "delete from calorielog where id='$id'";
    
    if($mysqli->query($query)){
        echo 'Entry deleted succesfully';
    } else{
        $error = "Error, unable to delete log.";
        echo $error;
    }

    $mysqli->close();
    
?>