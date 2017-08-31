<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css">
        #msg{
            color:red;
        }

    </style>
</head>
<body>
    <form action="doLogin.php" method="get" >
        用户名：<input type="text" name="username">
        <br/>
        密&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"/>
        <br/>
        <input type="checkbox" name="auto" value="1"/>下次自动登录
        <br/>
        <input type="submit" value="登录"/>
        还没有账号？<a href="regist.php">注册一个</a>
    </form>
    <?php
        if(array_key_exists("error",$_GET)){
            if($_GET["error"] == 1){
                echo "<span style='color:red;'>用户名或密码错误</span>";
            }
        }
    ?>
</body>
</html>