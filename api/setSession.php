<?php
if(!session_start()){
    header("Location: error.php");
    exit;
}

unset($_SESSION['edit-id']);
unset($_SESSION['postId']);

$_SESSION['edit-id'] = empty($_POST['id']) ? '' : $_POST['id'];
$_SESSION['postId'] = empty($_POST['id']) ? '' : $_POST['id'];

echo $_SESSION['edit-id'];
echo $_SESSION['postId'];
?>