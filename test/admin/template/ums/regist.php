<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/jquery-1.9.0.min.js"></script>
    <script src="js/xhr.js"></script>
    <script>
        $(function(){
            $("#img").change(function(){
                $("#showImg").attr("src",window.URL.createObjectURL(this.files[0]));
            });
            $("#username").on("blur",function(){
                    $.ajax({
                        url:"validateUsername.php",
                        type:"post",
                        data:{username:$(this).val()},
                        dataType:"text",
                        success:function(data){
                            $usernameSpan = $("#usernameMsg");
                            if(data){
                                $usernameSpan.text(data);
                                $usernameSpan.css("color","red");
                            }else{
                                $usernameSpan.html("用户名可用");
                                $usernameSpan.css("color", "green");
                            }
                        }
                    });
            });

        });

//        window.onload = function(){
//            var usernameInput = document.getElementById("username");
//            usernameInput.onblur = function(){
//                var usernameText = this.value;
//                var xhr = getXMLHttpRequest();
//                xhr.open("post", "validateUsername.php", true);
//                xhr.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
//                xhr.send("username="+usernameText);
//
//                xhr.onreadystatechange = function(){
//                    if(xhr.readyState == 4) {
//                        var msg = xhr.responseText;
//                        var usernameSpan = document.getElementById("usernameMsg");
//                        if(msg){
//                            usernameSpan.innerHTML = msg;
//                            usernameSpan.style.color = "red";
//                        }else{
//                            usernameSpan.innerHTML = "用户名可用";
//                            usernameSpan.style.color = "green";
//                        }
//                    }
//                }
//
//            }
//        }
    </script>
</head>
<body>
    <form action="doRegist.php" method="post" enctype="multipart/form-data">
        用户名：<input type="text" name="username" id="username">
                <span id="usernameMsg"></span>
        <br>
        密码：<input type="password" name="password">
        <br>
        年龄：<input type="text" name="age">
        <br>
        兴趣爱好：<input type="checkbox" name="hobbies[]" value="吃饭">吃饭
                 <input type="checkbox" name="hobbies[]" value="睡觉">睡觉
                 <input type="checkbox" name="hobbies[]" value="打豆豆">打豆豆
        <br>
        头像：<input type="file" name="img" id="img">
<!--        回显-->
        <br/>
        <img src="" id="showImg" width="100px"/>
        <br>
        <input type="submit" value="注册">
        已有账号？<a href="login.php">去登录</a>
    </form>
    <?php
        if(array_key_exists("error",$_GET)){
            if($_GET["error"] == 1){
                echo "<span style='color:red;'>用户名已存在</span>";
            }
        }
    ?>
</body>
</html>