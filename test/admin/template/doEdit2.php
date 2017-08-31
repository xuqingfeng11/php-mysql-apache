<?php
header("Content-Type:text/html;charset=utf-8"); 
	session_start();
	require "conn.php";
 	$username=$_SESSION["username"];
    $userid=$_SESSION["id"];
	$title=$_POST["title"];
	$id=$_POST["id"];
	$content=$_POST["content"];
	$img1=$_POST["img1"];
    $time=date("Y-m-d",time());
    date_default_timezone_set("PRC");
    $destPath = "upload";
    $filePath = "$destPath/" . $_FILES["img"]["name"];
    if(!$_FILES["img"]["name"]){
        $filePath=$img1;
    }
    $sql = "update jqhd set headed='$title', img='$filePath', tip='$content' where id=$id";
    $result=mysqli_query($conn, $sql); 
    
    if($result){
    	echo "<script>alert('修改成功');location.href='list2.php' </script>";
    	}else{
    		echo "<script>alert('修改失败');location.href='history.go(-1)' </script>";
               
    	}
    if(!file_exists($destPath)){
        mkdir($destPath);
    }
    $filePath = "$destPath/" . iconv("utf-8","gbk",$_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $filePath);
    mysqli_close($conn);

?>