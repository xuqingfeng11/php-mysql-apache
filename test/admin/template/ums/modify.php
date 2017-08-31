<?php
    require "conn.php";

    $sql = "select * from t_user where id = {$_GET["id"]}";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    // print_r($row);
    //   print_r($result);
?>
<!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="doModify.php" method="post" >
        
        <input type="hidden" name="id" value="" />

        用户名：<input type="text" name="username" value="<?php echo $row["username"]; ?>">
        <br>
        密码：<input type="password" name="password" value="<?php echo $row["password"]; ?>">
        <br>
        年龄：<input type="text" name="age" value="<?php echo $row["age"]; ?>">
        <br>



        兴趣爱好：<input type="checkbox" name="hobbies[]" value="吃饭"
            <?php
                $hobbies = $row["hobbies"];
                $pos = strpos($hobbies, "吃饭");
                echo $pos === 0 || $pos ? "checked" : "";
            ?>
        >吃饭
        <input type="checkbox" name="hobbies[]" value="睡觉"
            <?php
                $hobbies = $row["hobbies"];
                $pos = strpos($hobbies, "睡觉");
                echo $pos === 0 || $pos ? "checked" : "";

            ?>
        >睡觉
        <input type="checkbox" name="hobbies[]" value="打豆豆"
            <?php
                $hobbies = $row["hobbies"];
                $pos = strpos($hobbies, "打豆豆");
                echo $pos === 0 || $pos ? "checked" : "";
            ?>
        >打豆豆
        <br>
        <input type="submit" value="修改">

        <a href="success.php">返回</a>
    </form>

</body>
</html>
