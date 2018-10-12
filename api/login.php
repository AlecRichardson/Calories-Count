<?php

if(!session_start()){
    header("Location: ../error.php");
    exit;
    }

 $loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];
 
if ($loggedin) {
    echo 'already logged in';
    exit;
    }

  
$action = empty($_POST['action']) ? '' : $_POST['action'];

if ($action == 'do_login') {
        handle_login(); 
       
	} else {
        login_form();
	}

function handle_login() {
		$username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];

        require_once "../config/db.conf";
        
        $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
  
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        
        if($password != 'pass'){
        $password = sha1($password); 
        }
        $query = "select id from users WHERE username = '$username' AND password = '$password'";
    
        $result = $mysqli->query($query);
    
        
        if($result){
            $match = $result->num_rows;
            
            if ($match == 1) {
                $_SESSION['loggedin'] = $username;
                $row = $result->fetch_assoc();
                                
                $_SESSION['id'] = $row['id'];
                
                echo 'success';
               
            }
            else {
                echo "Incorrect username or password";

            }
            $result->close();
            $mysqli->close();
        }
	
	}

function login_form() {
		$username = "";
        echo 'redirect';
       
	}
?>