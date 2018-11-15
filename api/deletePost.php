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
	
        
       
            require_once '../config/db.conf';

            $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

            if ($mysqli->connect_error) {
                $error = 'Error: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
                echo 'Error, please contact administration.';
                exit;
            }

        $postId = empty($_POST['id']) ? '' : $_POST['id'];  

        $query =  "delete from posts where id='$postId'";
          

        if ($mysqli->query($query)) {
                    $mysqli->close();
                    echo 'success';
            }else{
                echo 'Delete failed.';
            }
            
        
?>