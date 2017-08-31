<?php
session_start();
$id=$_SESSION["id"];
require "conn.php";

	$sql="select * from jqhd where userid=$id";
	$result=mysqli_query($conn,$sql);
	$arr=array();
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		array_push($arr,$row);
	}
	echo json_encode($arr);
?>