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
    <script>
        window.onload = function(){

            var lis = document.getElementsByTagName("li");
            var spans = document.querySelectorAll("#userDetail span");
            var userDiv = document.getElementById("userDetail");

            [].forEach.call(lis,function(li){
                li.onmouseover = function(e){
                    var id = li.id;
                    var xhr = getXMLHttpRequest();
                    xhr.open("post","findUser.php", true);
                    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                    xhr.send("id=" + id);

                    xhr.onreadystatechange = function(){
                        if(xhr.readyState == 4){
                            var userStr = xhr.responseText;
                            var user = JSON.parse(userStr);

                            console.debug(user);

                            var {id,username,age,hobbies} = user;

                            spans[0].innerHTML = id;
                            spans[1].innerHTML = username;
                            spans[2].innerHTML = user["age"];
                            spans[3].innerHTML = user.hobbies;


                            userDiv.style.left = e.clientX + 20 + "px";
                            userDiv.style.top =  e.clientY + "px";
                            userDiv.style.display = "block";


                        }
                    }

                }
                li.onmouseout = function(){
                    [].forEach.call(spans,function(span){
                        span.innerHTML = "";
                    });
                    userDiv.style.display = "none";
                }
            });


           var keyInput = document.getElementById("key");
           var tipsDiv = document.getElementById("tips");

           keyInput.onkeyup = function(){
                var key = this.value;
                if(!key){
                    tipsDiv.innerHTML = "";
                    tipsDiv.style.display = "none";
                    return;
                }
                var xhr = getXMLHttpRequest();
                xhr.open("get","findUsers.php?key="+key,true);
                xhr.send();
                xhr.onreadystatechange = function(){
                    if(xhr.readyState == 4){
                        var users = JSON.parse(xhr.responseText);
                        tipsDiv.innerHTML = "";
                        if(users.length == 0){
                            tipsDiv.style.display = "none";
                            return;
                        }
                        [].forEach.call(users, function(user){
                            var li = document.createElement("li");
                            li.onclick = function(){
                                keyInput.value = this.innerText;
                                tipsDiv.innerHTML = "";
                                tipsDiv.style.display = "none";
                            }
                            var text = document.createTextNode(user.username);
                            li.appendChild(text);
                            tipsDiv.appendChild(li);
                        });
                        tipsDiv.style.display = "block";
                    }
                }
           }


            //给查询按钮绑定点击事件处理函数
                //拿到关键字
                //发送请求请求根据关键字匹配的用户
                //根据一组用户更新表格
            var searchBtn = document.querySelector("#search");
            searchBtn.onclick = function(){
                tipsDiv.innerHTML = "";
                tipsDiv.style.display = "none";
                var key = keyInput.value;
                var xhr = getXMLHttpRequest();
                xhr.open("get","searchUsers.php?key=" + key, true);
                xhr.send();
                xhr.onreadystatechange = function(){
                    if(xhr.readyState == 4){
//                        eval('({"name":"zhangsan"})");
                        var users = JSON.parse(xhr.responseText);

                        var tbody = document.querySelector("#tb");
//                        tbody.innerHTML = "";

//                        var str = "";
                        var arr = [];
                        [].forEach.call(users, function(user){
//                            var tr = document.createElement("tr");
//                            tr.align = "center";
                           var str = [];
//                            str += "<tr align='center'>";
                            str.push("<tr align='center'>");

                            for(var i in user){
//                                str +="<td>" + user[i] + "</td>";
                                str.push("<td>" + user[i] + "</td>");
//                                var td = document.createElement("td");
//                                var text = document.createTextNode(user[i]);
//                                td.appendChild(text);
//                                tr.appendChild(td);
                            }
//                            str += "<td>"   +
//                                        "<a href='##' >删除</a>&nbsp;&nbsp;&nbsp;"  +
//                                        "<a href='##' >修改</a>&nbsp;&nbsp;&nbsp;"  +
//                                   "</td>";
                            str.push("<td>");
                                str.push("<a href='##' class='del' id='" + user["id"] + "'>删除</a>&nbsp;&nbsp;&nbsp;");
                                str.push("<a href='modify.php' >修改</a>&nbsp;&nbsp;&nbsp;");
                            str.push("</td>");
//                            str += "</tr>";
                            str.push("</tr>");

//                            var td = document.createElement("td");
//                            var aDel = document.createElement("a");
//                            aDel.href = "##";
//                            var aUp = document.createElement("a");
//                            aUp.href = "##";
//                            var textDel = document.createTextNode("删除");
//                            var textUp = document.createTextNode("修改");
//                            aDel.appendChild(textDel);
//                            aUp.appendChild(textUp);
//                            td.appendChild(aDel);
//                            td.appendChild(aUp);
//                            tr.appendChild(td);
//                            tbody.appendChild(tr);
                            arr.push(str.join(""));
                        });

                        tbody.innerHTML = arr.join("");
                        var as = document.querySelectorAll(".del");
                        [].forEach.call(as, function(a){
                            a.onclick = function(){
                                if(confirm("确认删除?")){
                                    var xhr = getXMLHttpRequest();
                                    xhr.open("get", "delById.php?id=" + this.id, true);
                                    xhr.send();

                                    xhr.onreadystatechange = function(){
                                        if(xhr.readyState == 4){
                                            if(xhr.responseText){
                                                a.parentElement.parentElement.parentElement.removeChild(a.parentElement.parentElement);
                                            }
                                        }
                                    }
                                }
                            }
                        });

                    }
                }
            }

            searchBtn.onclick();

        }

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