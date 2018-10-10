<?php
if(!session_start()){
    header("Location: error.php");
    exit;
}

unset($_SESSION['edit-id']);
unset($_SESSION['date'] );
unset($_SESSION['breakfast'] );
unset($_SESSION['lunch'] );
unset($_SESSION['dinner'] );
unset($_SESSION['other'] );

$_SESSION['edit-id'] = empty($_POST['id']) ? '' : $_POST['id'];
$_SESSION['date'] = empty($_POST['date']) ? '' : $_POST['date'];
$_SESSION['breakfast'] = empty($_POST['breakfast']) ? '0' : $_POST['breakfast'];
$_SESSION['lunch'] = empty($_POST['lunch']) ? '0' : $_POST['lunch'];
$_SESSION['dinner'] = empty($_POST['dinner']) ? '0' : $_POST['dinner'];
$_SESSION['other'] = empty($_POST['other']) ? '0' : $_POST['other'];
?>