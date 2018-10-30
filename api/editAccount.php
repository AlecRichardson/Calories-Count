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
    
    $email = empty($_POST['email']) ? '' : $_POST['email'];
    $password = empty($_POST['password']) ? '' : $_POST['password'];
    $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
   
    if(!$email){
        echo 'Email field is required.';
        exit;
    }
    require_once "../config/db.conf";
    
    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);
    
    if($mysqli->connect_error){
        die('Connect Error (' . $mysqli->connect_errno . ')' . $mysqli->connect_error);
    }
    
    $email = $mysqli->real_escape_string($email);
    $password = $mysqli->real_escape_string($password);
    

    $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];

    if(!empty($password) || !empty($confirmPass)){
        if(strcmp($password, $confirmPass) == 0){
            $password = sha1($password);
            $query = "update users set email = '$email', password = '$password' where id='$id';";
    
            if($mysqli->query($query)){
                    echo 'success';
                    exit;
            
                    
                } else {
                    echo 'Error updating account, please try again later.';
                    exit;
                }
                $mysqli->close();
        } else {
            echo 'Passwords do not match.';
            exit;
        }
    } else if(empty($password) && empty($password)){
        $query = "update users set email = '$email' where id='$id';";
    
        if($mysqli->query($query)){
                echo 'success';
                exit;
        
                
            } else {
                echo 'Error updating account, please try again later.';
                exit;
            }
            $mysqli->close();
    }
    
    }
    

    



function login_form() {
		echo "redirect";
	}

?>