<?php
require "conn.php";
$id=$_GET["id"];

$sql="select *from jqxw where id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

echo $row;
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
  <style>

  </style>
  <script src="../js/jquery.js"></script>


</head>
<body>
  <div class="panel admin-panel">
    <div class="panel-head" id="add"><strong><span class="icon-pencil-square-o"></span>修改内容</strong></div>
    <div class="body-content">
      <form method="post" class="form-x" action="doEdit.php" enctype='multipart/form-data'>
        <div class="form-group hidden">
          <div class="label">
            <label>ID</label>
          </div>

          <div class="field">
            <input type="text" class="input w50" value="<?php echo $row["id"]?>" name="id" data-validate="required:请输入标题" />
            <div class="tips"></div>
          </div>
        </div>



        <div class="form-group">
          <div class="label">
            <label>标题：</label>
          </div>

          <div class="field">
            <input type="text" class="input w50" value="<?php echo $row["headed"]?>" name="title" data-validate="required:请输入标题" />
            <div class="tips"></div>
          </div>
        </div>
        <div class="form-group">
          <div class="label">
            <label>图片：</label>
          </div>
          <div class="field">
            <input type="file" id="url1"  name="img" class="input tips" style="width:25%; float:left;"  value="<?php echo $row["img"]?>"  data-toggle="hover" data-place="right" data-image="" />

          </div>
        </div>

        <input type="hidden" value="<?php  echo $row["img"] ?>"  name="img1">
        <div class="form-group">
          <div class="label">
            <label>修改图片：</label>
          </div>
          <div class="field1">

            <img  src="<?php  echo $row["img"] ?>" alt="" >

          </div>
        </div>
        <div class="form-group">
          <div class="label">
            <label>内容：</label>
          </div>
          <div class="field">
            <textarea name="content" class="input" value="<?php echo $row["tip"]?>" style="height:200px; border:1px solid #ddd;"><?php echo $row["tip"]?></textarea>
            <div class="tips"></div>
          </div>
        </div>
        
        <div class="clear"></div>
        <div class="form-group">
          <div class="label">
            <label></label>
          </div>
          <div class="field">
            <button class="button bg-main icon-check-square-o" type="submit"> 提交</button>
          </div>
        </div> 

      </form>
    </div>
  </div>

</body>
</html>