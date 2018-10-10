<?php
//alec

    // HTTPS redirect
//    if ($_SERVER['HTTPS'] !== 'on') {
//		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
//		header("Location: $redirectURL");
//		exit;
//	}
	
	// http://us3.php.net/manual/en/function.session-start.php
	if(!session_start()) {
		// If the session couldn't start, present an error
		header("Location: ../error.php");
		exit;
	}
	
	
	// Check to see if the user has already logged in
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if ($loggedIn) {
		header("Location: ../Login/loginForm.php");
		exit;
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
        
        
        
        if(strcmp($password, $confirmPass) == 0){
           // Require the credentials
            require_once '../conf/db.conf';

            // Connect to the database
            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            // Check for errors
            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                require "../Login/loginForm.php";
                exit;
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
                $error = "Error: Username is already taken.";
                require "createUserForm.php";
            }
            
            
            $password = sha1($password);

            $query = "INSERT INTO users (firstName, lastName, username, password, email, birthday, addDate, changeDate) VALUES ('$firstName', '$lastName', '$username', '$password', '$email', STR_TO_DATE('$birthday', '%Y-%m-%d'), now(), now())";


            if ($mysqli->query($query) === TRUE) {
                $mysqli->close();

                    $error = "New user created successfully!";
                    require "../Login/loginForm.php";
                    exit;
                }
            } 
     
        else {
          $error = 'Error: Passwords do not match!';
          require "createUserForm.php";
          exit;
        }
    
	}

	function login_form() {
		$username = "";
		$error = "";
		require "../Login/loginForm.php";
        exit;
	}
	
?>