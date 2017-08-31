<?php 
require "conn.php";
$id=$_GET["id"];
$sql="delete from jqxw where id=$id";
$result=mysqli_query($conn,$sql);
if($result){
	echo 1;
}
mysqli_free_result($result);
mysqli_close($conn);

?>