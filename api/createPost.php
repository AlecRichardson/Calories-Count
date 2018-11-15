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
		$title = empty($_POST['title']) ? '' : $_POST['title'];
		$post = empty($_POST['post']) ? '' : $_POST['post'];
        
        if($title == '' || $post == ''){
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

            
        $title = $mysqli->real_escape_string($title);
        $post = $mysqli->real_escape_string($post);
        
        $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];
        $loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];    
        
            
            $query = "INSERT INTO posts (date, userId, user, title, post) VALUES (now(),'$id','$loggedIn', '$title', '$post')";
           

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