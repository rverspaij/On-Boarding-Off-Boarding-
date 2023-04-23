<?php
session_start();

if (!isset($_SESSION['username'])) {
	header('Location: http://10.10.1.100/login.php');
}
else {
?>

<!DOCTYPE html>
<html>
	<nav>
		<ul>
		  <li><a href="http://10.10.1.100/onboard.php">Onboarding</a></li>
		  <li><a href="http://10.10.1.100/offboarding.php">Offboarding</a></li>
		  <li><a href="http://10.10.1.100/resetpwd.php">Change Password</a></li>
		  <li><a href="http://10.10.1.100/enableacc.php">Unlock Account</a></li>
		</ul>
	  </nav>
<head>
	<title>Add New Employee</title>
	<style>
		nav {
  			background-color: #333;
  			color: #fff;
  			font-size: 18px;
  			font-weight: bold;
  			text-align: center;
		}

		ul {
  			list-style: none;
  			margin: 0;
  			padding: 0;
		}

		li {
  			display: inline-block;
  			margin: 0 10px;
		}

		a {
  			color: #fff;
  			text-decoration: none;
  			padding: 10px;
  			border-radius: 5px;
		}

		a:hover {
		background-color: #fff;
  		color: #333;
		}

		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
		}
		h1 {
			text-align: center;
			color: #444;
			margin-top: 50px;
		}
		form {
			width: 500px;
			margin: 0 auto;
			background-color: #fff;
			padding: 20px;
			border-radius: 10px;
			box-shadow: 0px 0px 10px #ccc;
		}
		label, select {
			display: block;
			margin-bottom: 10px;
			color: #555;
			font-size: 18px;
		}
		input[type="text"], select {
			width: 100%;
			padding: 10px;
			border: 2px solid #ccc;
			border-radius: 5px;
			font-size: 16px;
			outline: none;
		}
		input[type="submit"] {
			padding: 10px 20px;
			font-size: 18px;
			background-color: #4CAF50;
			color: white;
			border: none;
			border-radius: 5px;
			cursor: pointer;
			margin-top: 20px;
			transition: background-color 0.3s ease-in-out;
		}
		input[type="submit"]:hover {
			background-color: #3E8E41;
		}
	</style>
</head>
<body>
	<h1>Add New Employee</h1>
	<form id="onboarding-form" action="onboard.inc.php" method="post">
		<label for="firstname">First Name:</label>
		<input type="text" id="firstname" name="firstname" required>
		
		<label for="lastname">Last Name:</label>
		<input type="text" id="lastname" name="lastname" required>
		
		<label for="department">Department:</label>
		<select id="department" name="department" required>
			<option value="">Select a department</option>
			<option value="IT">IT</option>
			<option value="HR">HR</option>
			<option value="Finance">Finance</option>
			<option value="Marketing">Marketing</option>
		</select>
		
		<input type="submit" value="Add Employee">
	</form>
</body>
</html>

<?php
}
?>