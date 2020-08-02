<?php
//Common functions
session_start();

function echoActiveIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['PHP_SELF'], ".php");
    if ($current_file_name == $requestUri)
        echo 'active';
}

function handleInfoMessage() {
    if (isset($_SESSION['message'])){
        echo '<script> alert("' . $_SESSION['message'] . '"); </script>';
        resetMessage();
    }
}

function resetMessage() {
    unset($_SESSION['message']);
}
?>