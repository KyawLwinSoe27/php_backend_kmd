<?php

include('process/registerProcess.php');

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register</title>
</head>
<body>

	<h1>Register</h1>

	<form action="process/registerProcess.php" method="POST">
		
		<label>User Name:</label>
		<input type="text" name="txtUserName">

		<br><br>

		<label>User Email:</label>
		<input type="text" name="txtUserEmail">

		<br><br>	

		<label>Password:</label>
		<input type="Password" id="myInput" name="txtUserPassword">	
		<input type="checkbox" name=""
		onclick="showHide()" >Show Password

		<script>
			function showHide() {
				// body...
				var x=document.getElementById('myInput');
				if (x.type != 'text') {
					x.type='text';
				}
				else{
					x.type='password';
				}
			}
		</script>

		<br><br>

		<input type="submit" name="btnRegister"
		value="Register">

		<input type="reset" name="" value="Clear">

	</form>

	<br><br>

	<a href="login.php">Have an account? Login</a>

</body>
</html>