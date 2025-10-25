<?php

include('process/loginProcess.php');

?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="CSS/style.css?v=<?php echo time(); ?>">
</head>
<body>
	
	<div class="logincontent">
		<h1>Login</h1>
		<form action="process/loginProcess.php" method="POST" class="loginForm">
		<label>Email</label>
		<input type="text" name="txtUserEmail" required>

		<br><br>
		<label>Password</label>
		<input type="Password" id="myInput" name="txtUserPassword" required>	
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
		<input type="submit" class="btnLogin" name="btnLogin" value="Login" >
	</form>
	<br><br>
	<div class="regLink">
		<a href="register.php">No account? register</a>
	</div>
	</div>
	

	

</body>
</html>