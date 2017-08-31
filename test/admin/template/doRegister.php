<?php 
header("Content-Type:text/html;charset=utf-8");
$username=$_POST['username'];
$password=$_POST['password'];
$email=$_POST['email'];
$time=date("Y-m-d",time());
date_default_timezone_set("PRC");
require "conn.php";
$sql="insert into user (username,password,email,date) values ('$username','$password','$email','$time')";
$result= mysqli_query($conn,$sql);

if($result){

	echo "<script>alert('注册成功');location.href='login.html'</script>";
}else{
	echo "<script>alert('注册失败');</script>";
}
  
	mysqli_close($conn);
?> 