<?php
session_start();

unset($_SESSION['loggedin']);
unset($_SESSION['username']);
unset($_SESSION['id']);

if(isset($_GET['goto'])) {
    error_log($_GET['goto']);
    header('Location: ' . htmlspecialchars($_GET['goto']));
}
else {
    header('Location: ../index.php');
}

die;
?>