<?php 
header("Content-Type:text/html;charset=utf-8"); 
	session_start();
	require "conn.php";
 	$username=$_SESSION["username"];
    $userid=$_SESSION["id"];
    $num=$_GET["num"];
    if($num==0||num==1){
    	$sub=0;
    }elseif($num){

    	$sub=($num-1)*5;
    }
    $sql="select * from jqxw where userid=$userid limit 5,5";
    $arr=array();
	while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
		array_push($arr,$row);
	}
	echo json_encode($arr);

?>

