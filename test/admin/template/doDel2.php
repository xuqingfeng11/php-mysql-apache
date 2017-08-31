<?php 
require "conn.php";
$id=$_GET["id"];
$sql="delete from jqhd where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
	echo 1;
}

mysqli_close($conn);
?>