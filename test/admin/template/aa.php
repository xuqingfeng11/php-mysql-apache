<?php
    session_start();
    if(!array_key_exists("username", $_SESSION)){
        header("Location:login.html");
        return;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
欢迎登录

	<?php echo $_SESSION["username"];
		
	?>
</body>
</html>