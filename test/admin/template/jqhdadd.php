<?php  
    header("Content-Type:text/html;charset=utf-8");
      session_start();
    require "conn.php";
    $username=$_SESSION["username"];
    $userid=$_SESSION["id"];
	$title=$_POST["title"];
	$content=$_POST["content"];
	
    $time=date("Y-m-d",time());
    date_default_timezone_set("PRC");
    $destPath = "upload";
    $filePath = "$destPath/" . $_FILES["img"]["name"];
    $sql = "
        insert into jqhd
          (userid, username, headed, img, tip,date)
        values ($userid, '$username','$title', '$filePath','$content','$time');
    ";
 
    $result=mysqli_query($conn, $sql); 
    
    if($result){
    	echo "<script>alert('添加成功');location.href='list2.php' </script>";
    	}else{
    		echo "<script>alert('添加失败'); </script>";

    	}
    if(!file_exists($destPath)){
        mkdir($destPath);
    }
    $filePath = "$destPath/" . iconv("utf-8","gbk",$_FILES["img"]["name"]);
    move_uploaded_file($_FILES["img"]["tmp_name"], $filePath);
    mysqli_close($conn);

?>