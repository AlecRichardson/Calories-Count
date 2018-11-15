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

        $postId = empty($_SESSION['postId']) ? '99' : $_SESSION['postId'];
        $postId = explode("-", $postId);
        $id = empty($_SESSION['id']) ? '' : $_SESSION['id'];    

        $query = "select * from likes where postId='$postId[1]' and userId='$id'";

        

        if ($result = $mysqli->query($query)) {
            $numRows = mysqli_num_rows($result);
            if($numRows <  1){
                $query = "INSERT INTO likes (postId, userId) VALUES ('$postId[1]', '$id')";
                

                if ($mysqli->query($query)) {
                    $mysqli->close();
                        echo 'success';
                        exit;
                    }
            }else {
                echo 'Already liked;';
                exit;
            }
            }
        
            
          
	
?>