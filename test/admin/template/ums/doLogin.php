<?php
    session_start();
?>
<?php
    //获得请求参数用户名、密码
    //根据用户名密码查询用户表
    //能查出数据，表示用户名、密码正确
    //查不出数据，表示用户名或密码错误

    require "conn.php";

    $username = $_GET["username"];
    $password = $_GET["password"];

    $sql = "
        select *
        from t_user
        where username = '$username' and password = '$password'
    ";
    $result = mysqli_query($conn, $sql);

    if(mysqli_fetch_array($result)){

        if(array_key_exists("auto",$_GET)){
            setcookie("username", $username, time() + 7 * 24 * 60 * 60);
            setcookie("password", $password, time() + 7 * 24 * 60 * 60);
        }else{
            setcookie("username", "", time());
            setcookie("password", "", time());
        }
        // echo "<script>location.href = 'success.php';</script>";
        $_SESSION["username"] = $username;
        header("Location:success2.php");
        mysqli_free_result($result);
        mysqli_close($conn);
        return;
    }
//   header("Location:../day02/05.php?msg=用户名或密码错误");
    setcookie("username", "", time());
    setcookie("password", "", time());
    header("Location:login.php?error=1");
    mysqli_free_result($result);
    mysqli_close($conn);
?>