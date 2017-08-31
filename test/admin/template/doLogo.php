<?php 
header("Content-Type:text/html;charset=utf-8");
session_start();
require "conn.php";
// $id=$_POST["id"];
$username=$_POST["username"];
$password=$_POST["password"];
$sql="select * from user where username='$username' and password ='$password'
";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
if($row){
	$_SESSION["username"]=$username;
	$_SESSION["id"]=$row["id"];
	
	echo "<script>alert('登录成功');location.href='index.php'</script>";
}else{
	echo "<script>alert('登录失败');location.href='history(-1)'</script>";
}
mysqli_free_result($result);
    mysqli_close($conn);
?>