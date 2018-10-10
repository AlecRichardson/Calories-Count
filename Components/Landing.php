<?php
if(!session_start()){
    header("Location: ./Error/error.php");
    exit;
}

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

?>

<div> welcome </div>