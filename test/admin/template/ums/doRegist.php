<?php
//    sleep(5);
    header("Content-Type:text/html;charset=utf-8");
    //获得请求参数中的用户信息
    //根据当前用户名查询用户表
    //查到了，说明用户名已存在，跳转回注册页面重新注册
    //没查到，说明当前用户名可以使用 保存用户信息到用户表 跳转到登录页面登录
    $username = $_POST["username"];

    require "conn.php";

    $sql = "select * from t_user where username =  '$username' ";

    $result = mysqli_query($conn, $sql);
//    $result -> num_rows > 0

    if(mysqli_fetch_array($result)){
        header("Location:regist.php?error=1");
        mysqli_free_result($result);
        mysqli_close($conn);
        return;
    }

//    $hobbies = null;

    if(array_key_exists("hobbies", $_POST)){
       $hobbies = join(",", $_POST["hobbies"]);
    }
//    echo $hobbies;

    $destPath = "upload";
    $filePath = "$destPath/" . $_FILES["img"]["name"];
    $sql = "
        insert into t_user
          (username, password, age, hobbies, img)
        values ('{$_POST["username"]}', '{$_POST["password"]}', {$_POST["age"]}, '$hobbies','$filePath');
    ";
    mysqli_query($conn, $sql);

    if(!file_exists($destPath)){
        mkdir($destPath);
    }
    $filePath = "$destPath/" . iconv("utf-8","gbk",$_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $filePath);
    header("Location:login.php");
    mysqli_free_result($result);
    mysqli_close($conn);

?>