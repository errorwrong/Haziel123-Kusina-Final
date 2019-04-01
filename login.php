<?php

	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Kusina Online</title>
		<link rel="stylesheet" href="log.css">
		
</head>
<body>
    <div class="loginbox">
    <img src="images/kusina.jpg" class="avatar">
        <h1>Admin</h1>
        <form action="register.php" method="POST">
		
            <p>Username</p>
            <input type="text" name="username" placeholder="Enter Username" required>
            <p>Password</p>
            <input type="password" name="password" placeholder="Enter Password" required>
            <input type="submit" name="submit"  value="Login">
        </form>
		
</div>
</body>
</html>