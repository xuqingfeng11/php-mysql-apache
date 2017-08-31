<?php
    require "conn.php";

    $sql = "delete from t_user where id = {$_GET["id"]} ";

    mysqli_query($conn, $sql);

    mysqli_close($conn);

    header("Location:success.php");
?>