<?php
	
    if(!session_start()){
        header("Location: ./Components/Error/error.php");
        exit;
    }
    $_SESSION = array();
    session_destroy();
	
	echo 'Logged out successfully';
?>
