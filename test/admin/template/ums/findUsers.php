<?php
//    header("Content-Type:text/json;charset=utf-8");
    require "conn.php";

    $key = $_GET["key"];

    $sql = "select id,username from t_user where username like '%$key%'";

    $arr = array();

    $result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result,MYSQLI_ASSOC)){
//        $arr[] = $row;
        array_push($arr,$row);
    }

    echo json_encode($arr);

?>