<?php 

	session_start();
	require "conn.php";
	// print_r($_GET);
	$num=$_GET['num'];
 	$username=$_SESSION["username"];
    $userid=$_SESSION["id"];
    $nu=($num-1)*5;
    $sql="select * from jqxw where userid=$userid limit $nu,5";
    $arr=array();
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        		array_push($arr,$row);
        	}
        	echo json_encode($arr);
    }



?>

