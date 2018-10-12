<?php

	if(!session_start()) {
		header("Location: ../error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		echo 'redirect';
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_user();
	} else {
		login_form();
	}
	
	function create_user() {
		$firstName = empty($_POST['firstName']) ? '' : $_POST['firstName'];
		$lastName = empty($_POST['lastName']) ? '' : $_POST['lastName'];
        $username = empty($_POST['username']) ? '' : $_POST['username'];
        $password = empty($_POST['password']) ? '' : $_POST['password'];
        $confirmPass = empty($_POST['confirmPass']) ? '' : $_POST['confirmPass'];
        $birthday = empty($_POST['birthday']) ? '' : $_POST['birthday'];
        $email = empty($_POST['email']) ? '' : $_POST['email'];
        
        if($firstName == '' || $lastName == '' || $username == '' || $password == '' || $confirmPass == '' || $birthday == '' || $email == ''){
            echo 'All fields are required';
        }
        
        if(strcmp($password, $confirmPass) == 0){

            require_once '../config/db.conf';

            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'redirect';
            }

           
        $firstName = $mysqli->real_escape_string($firstName);
        $lastName = $mysqli->real_escape_string($lastName);
        $username = $mysqli->real_escape_string($username);
        $password = $mysqli->real_escape_string($password);
        $confirmPass = $mysqli->real_escape_string($confirmPass);
        $birthday = $mysqli->real_escape_string($birthday);
        $email = $mysqli->real_escape_string($email);

            
            
            $query = "select * from users where username='$username'";
       
            
            $result = $mysqli->query($query);
            
            if($result->num_rows>0){
                echo 'Username is already taken.';
            }
            
            
            $password = sha1($password);

            $query = "INSERT INTO users (firstName, lastName, username, password, email, birthday, addDate, changeDate) VALUES ('$firstName', '$lastName', '$username', '$password', '$email', STR_TO_DATE('$birthday', '%Y-%m-%d'), now(), now())";


            if ($mysqli->query($query) === TRUE) {
                $mysqli->close();

                    echo 'success';
                }
            } 
     
        else {
          echo 'Passwords do not match!';
        }
    
	}

	function login_form() {
		$username = "";
		echo 'redirect';
	}
	
?>