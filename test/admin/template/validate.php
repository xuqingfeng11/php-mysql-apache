<?php 

$username=$_POST['username'];
require "conn.php";
$sql="select * from user where username='$username'";
$result= mysqli_query($conn,$sql);
if(mysqli_fetch_array($result)){
	
	echo "true";	
}else{
	
	echo "false";
}
	mysqli_free_result($result);
	mysqli_close($conn);
?>