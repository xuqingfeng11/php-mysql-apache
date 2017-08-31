<?php
//    $username = $_GET["username"];
    $username = $_POST["username"];
    require "conn.php";
    $sql = "select * from t_user where username = '$username' ";
    $result = mysqli_query($conn, $sql);
    if(mysqli_fetch_array($result)){
        echo "用户名已存在";
    }
    mysqli_free_result($result);
    mysqli_close($conn);
?>