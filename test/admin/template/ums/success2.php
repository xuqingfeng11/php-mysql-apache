<?php
require "checkLogin.php";
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <script src="js/xhr.js"></script>
    <style>
        #userDetail{
            border: 1px solid black;
            background-color: #cccccc;
            width:200px;
            display: none;
            position:absolute;
        }
        li{
            width:100px;
            /*border: 1px solid red;*/
            margin: 10px;
            list-style: none;
        }
        li:hover{
            cursor:pointer;
            background-color: #c5cc24;
        }


        #tips{
            border:1px solid #cccccc;
            width:145px;
            max-height:105px;
            background-color: #eeeeee;
            overflow:auto;
            display:none;
        }



    </style>
    <script src="js/jquery-1.9.0.min.js"></script>

    <script>
        $(function(){
            var $lis = $("li");
            var $spans = $("#userDetail span");
            var $userDiv = $("#userDetail");

            $lis.mouseover(function(e){
                var id = $(this).attr("id");
                $.post("findUser.php",{id:id},function(user){
                    $($spans[0]).html(user.id);
                    $spans[1].innerHTML = user.username;
                    $spans[2].innerHTML = user["age"];
                    $spans[3].innerHTML = user.hobbies;
                    $userDiv.css("left", e.clientX + 20 + "px");
                    $userDiv.css("top", e.clientY + "px");
                    $userDiv.show();

                },"json");

            });
            $lis.mouseout(function(){
                $spans.empty();
                $userDiv.hide();
            });
//---------------------------------------------------------------------------------
            var $keyInput = $("#key");
            var $tipsDiv = $("#tips");

            $keyInput.bind("keyup",function(){
                var key = $(this).val();

                $tipsDiv.empty();

                if(!key){
                    $tipsDiv.hide();
                    return;
                }

                $.get("findUsers.php",{key:key}, function(users){

                    if(users.length == 0){
                        $tipsDiv.hide();
                        return;
                    }

                    [].forEach.call(users, function(user){
                        var $li = $("<li>"  + user.username + "</li>");
                        $li.click(function(){
                            $keyInput.val($(this).text());
                            $tipsDiv.empty();
                            $tipsDiv.hide();
                        });
                        $tipsDiv.append($li);

                    });
                    $tipsDiv.show();
                },"json");

            });
//            ----------------------------------------------------------------------
            var $searchBtn = $("#search");
            $searchBtn.click(function(){
                $tipsDiv.empty();
                $tipsDiv.hide();
                $.getJSON("searchUsers.php",{key:$keyInput.val()},function(users){
                    var $tbody = $("#tb");
                    var arr = [];
                    [].forEach.call(users, function(user){
                        var str = [];
                        str.push("<tr align='center'>");

                        for(var i in user){
                            str.push("<td>" + user[i] + "</td>");
                        }

                        str.push("<td>");
                        str.push("<a href='##' class='del' id='" + user["id"] + "'>删除</a>&nbsp;&nbsp;&nbsp;");
                        str.push("<a href='modify.php?id=" + user["id"] + "' >修改</a>&nbsp;&nbsp;&nbsp;");
                        str.push("</td>");
                        str.push("</tr>");

                        arr.push(str.join(""));
                    });

                    $tbody.html(arr.join(""));

                    $(".del").click(function(){
                        var $this = $(this);
                        if(confirm("确认删除?")){
                            $.get("delById.php",{id:$(this).attr("id")},function(data){
                                if(data){
                                    $this.parent().parent().remove();
                                }
                            });
                        }
                    });
                });

            });

//            $searchBtn.click();
            $searchBtn.trigger("click");

        });

    </script>

</head>
<body>
欢迎,<?php echo $_SESSION["username"]; ?>
<a href="logout.php">退出</a>

<br/>
<input type="text" placeholder="用户名模糊查询" id="key" />
<input type="button"  value="查询" id="search"/>
<div id="tips">

</div>

<table width="500px" border="1" cellspacing="0" style="margin-top:50px;">
    <caption>用户信息</caption>
    <thead>
    <tr>
        <th>ID</th>
        <th>用户名</th>
        <th>年龄</th>
        <th>兴趣爱好</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody id="tb">

    </tbody>
</table>
<hr />
<div id="usernames">
    <?php
    require "conn.php";
    $sql = "select * from t_user";
    $result = mysqli_query($conn, $sql);
    //            mysqli_data_seek($result, 0);
    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
        echo "<li id='{$row["id"]}'>";
        echo $row["username"];
        echo "</li>";
    }
    ?>
</div>
<div id="userDetail">
    用户Id：<span></span>
    <br/>
    用户名：<span></span>
    <br/>
    年龄：<span></span>
    <br/>
    兴趣爱好：<span></span>
</div>
</body>
</html>