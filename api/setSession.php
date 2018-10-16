<?php
if(!session_start()){
    header("Location: error.php");
    exit;
}

unset($_SESSION['edit-id']);

$_SESSION['edit-id'] = empty($_POST['id']) ? '' : $_POST['id'];

echo $_SESSION['edit-id'];
?>