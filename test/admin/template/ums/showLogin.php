<?php
    if(array_key_exists("username",$_COOKIE) && array_key_exists("password",$_COOKIE)){
        $username = $_COOKIE["username"];
        $password = $_COOKIE["password"];

        require "conn.php";

        $sql = "
            select *
            from t_user
            where username = '$username' and password = '$password'
        ";
        $result = mysqli_query($conn, $sql);

        if(mysqli_fetch_array($result)){
            session_start();
            $_SESSION["username"] = $username;
            header("Location:success.php");
        }else{
            setcookie("username","", time());
            setcookie("password","",time());
            header("Location:login.php");
        }

        mysqli_free_result($result);
        mysqli_close($conn);

        return;
    }

    header("Location:login.php");
?>