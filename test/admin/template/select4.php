<?php 
session_start();
require "conn.php";
$userid=$_SESSION['id'];
$sql="select username ,((select count(1) from jqxw where user.id=jqxw.userid) +(select count(1) from rzjg where user.id=rzjg.userid) +(select count(1) from jqhd where user.id=jqhd.userid)) as um from user";
$arr=array();
    $result=mysqli_query($conn,$sql);
    if($result){
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
        		array_push($arr,$row);
        	}
        	echo json_encode($arr);
    }

?>
