<?php
    header("Location:login.php");
    session_start();
//    unset($_SESSION["username"]);
//    $_SESSION = array();
    session_destroy();
    setcookie("username","",time());
    setcookie("password","",time());
?>