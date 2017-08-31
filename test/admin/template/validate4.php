<?php 
$email=$_POST['email'];
require "conn.php";
$sql="select * from user where email='$email'";
$result= mysqli_query($conn,$sql);
if(mysqli_fetch_array($result)){
	echo "false";	
}else{
	
	echo "true";
}
	mysqli_free_result($result);
	mysqli_close($conn);
?>