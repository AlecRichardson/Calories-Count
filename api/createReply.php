<?php

	if(!session_start()) {
		header("Location: ../error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	
	if (!$loggedIn) {
        echo 'Not logged in.';
        exit;
	}
	
	
	$action = empty($_POST['action']) ? '' : $_POST['action'];
	
	if ($action == 'do_create') {
		create_post();
	} else {
		login_form();
	}
	
	function create_post() {
		$reply = empty($_POST['reply']) ? '' : $_POST['reply'];
        
        if($reply == ''){
            echo 'All fields are required';
            exit;
        }
        
        

            require_once '../config/db.conf';

            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'Error, please contact administration.';
                exit;
            }

            
        $reply = $mysqli->real_escape_string($reply);
        
        $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];
        $postId = empty($_SESSION['postId']) ? '' : $_SESSION['postId'];
        $postId = explode("-", $postId);
        $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];    
        
            
            $query = "INSERT INTO replies (date, postId, userId, user, reply) VALUES (now(),'$postId[1]', '$id','$loggedIn', '$reply')";
           

            if ($mysqli->query($query)) {
                $mysqli->close();
               
                    echo 'success';
                    exit;
                }

                echo 'Error, please contact administration.';
                exit;
            } 
     

	function login_form() {
        echo 'redirect';
        exit;
	}
	
?>