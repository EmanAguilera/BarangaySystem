<?php
require "../config/conn.php";

function logoutUser()
{
    session_start();
    $_SESSION = [];
    session_unset();
    session_destroy();
    header("Location: login.php");
}

logoutUser();
?>