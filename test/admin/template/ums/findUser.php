<?php
    require "conn.php";

    $id = $_POST["id"];

    $sql = "select id,username,age, hobbies from t_user where id = $id ";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

    echo json_encode($row);

?>