<?php 
header("Content-Type:text/html;charset=utf-8");
require "conn.php";
$id=$_POST["id"];
 if(array_key_exists($hobbies, $_POST)){
 		$hobbies=join(",",$_POST["hobbies"]);
 }
 $destpath="upload";
 $filePath="$destpath/".$FILES["img"]["name"];
 $sql="
 	update t_user
 	set username='{$_POST["username"]}',password='{$_POST["password"]}',age={$_POST["age"]},hobbies='$hobbies',filePath='$filePath' where id=$id;

 ";
 mysqli_query($connn,$sql);
 if(!file_exists($destpath)){
 	mkdir( $destpath);
 }
 $filePath="$destpath/".iconv("utf-8","gbk",$FILES["img"]["name"]);
 move_uploaded_file($FILES["img"]["tmp_name"], $filePath);
 header("Location:login1.php?error==2");
   mysqli_free_result($result);
    mysqli_close($conn);


?>