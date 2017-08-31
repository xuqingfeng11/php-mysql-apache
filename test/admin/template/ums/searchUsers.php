<?php
    require "conn.php";

    $key = $_GET["key"];

    $sql = "
        select id,username,age,hobbies
        from t_user
        where username like '%$key%'
    ";

    $result = mysqli_query($conn, $sql);

    $arr = array();

    while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
//        $arr[] = $row;
        array_push($arr, $row);
    }

    echo json_encode($arr);







?>