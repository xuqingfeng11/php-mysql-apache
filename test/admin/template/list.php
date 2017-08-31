<?php
    session_start();
    if(!array_key_exists("username", $_SESSION)){
        header("Location:login.html");
        return;
    }
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
<meta name="renderer" content="webkit">
<title></title>
<link rel="stylesheet" href="../css/pintuer.css">
<link rel="stylesheet" href="../css/admin.css">
<script src="../js/jquery.js"></script>
<script src="../js/list.js"></script>
 <script src="../js/template-web.js"></script>
 <script>
   
 </script>
</head>
<body>

<form method="post" action="" id="listform">
  <div class="panel admin-panel">
    <div class="panel-head"><strong class="icon-reorder"> 内容列表</strong> <a href="" style="float:right; display:none;">添加字段</a></div>
    <div class="padding border-bottom">
      <ul class="search" style="padding-left:10px;">
        <li> <a class="button border-main icon-plus-square-o" href="add.html"> 添加内容</a> </li>
      </ul>
    </div>
    <table class="table table-hover text-center">
      <tr>
        <th width="100" style="text-align:left; padding-left:20px;">ID</th>
        <th>图片</th>
        <th>标题</th>
        <th width="10%">更新时间</th>
        <th width="310">操作</th>
      </tr>
         

     <!--  <tr>
        <td style="text-align:left; padding-left:20px;">
            <input type="checkbox" name="id[]" value="" /> 1</td>
        <td width="10%"><img src="../images/11.jpg" alt="" width="70" height="50" /></td>
         <td>这是一套MUI后台精美管理系统，感谢您的支持</td>
         <td>2016-07-01</td>
         <td>
             <div class="button-group">
             <a class="button border-main" href="edit.html">
                  <span class="icon-edit"></span> 修改</a>
                  <a class="button border-red" href="javascript:void(0)" >
                       <span class="icon-trash-o"></span> 删除</a>
             </div>
       </tr> -->
        
       <tbody id="trShow">
         
       </tbody>
      <tr>
        <td colspan="8">
            <div class="pagelist">
                  <a href="##" id="select"  class="current">上一页</a>
                 <a href="##" id="select1"  class="current1">  1</a>
                  <a href="##"  id="select2" class="current2">  2</a>
                  <a href="##" id="select3" class="current3">3</a>
                  <a href="##" id="select4"  class="current4">下一页</a>
                  <a href="##" id="select5" class="current5">尾页</a>
                  </div></td>
      </tr>

    </table>
  </div>
</form>
</body>
</html>