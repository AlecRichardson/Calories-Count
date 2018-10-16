<?php

if(!session_start()){
    header("Location: error.php");
    exit;
}

$loggedin = empty($_SESSION['loggedin']) ? '' : $_SESSION['loggedin'];

if($loggedin){
    echo 'success';
} else {
    echo 'fail';
}
?>