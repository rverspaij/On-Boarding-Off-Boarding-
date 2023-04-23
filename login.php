<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="login">
		<h1>Login</h1>
		<form method="post" action="login.inc.php">
			<label for="username">Username:</label>
			<input type="text" name="username" id="username" required>

			<label for="password">Password:</label>
			<input type="password" name="password" id="password" required>

			<input type="submit" value="Log in">
		</form>
	</div>
</body>
</html>