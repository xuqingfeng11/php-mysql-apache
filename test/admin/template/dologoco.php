<?php 
$username=$_POST['username'];
$password=$_POST['password'];
require "conn.php";
$sql="select * from user where username='$username' and password='$password'";
$result= mysqli_query($conn,$sql);
if(mysqli_fetch_array($result)){
	echo "true";	
}else{
	
	echo "false";
}
	mysqli_free_result($result);
	mysqli_close($conn);
?>