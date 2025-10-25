
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

	<h1>Welcome Home Page</h1>

	<?php

	$name="Aung Aung";
	$encrypt=password_hash($name, PASSWORD_DEFAULT);

	echo "Name: $name <br>";
	echo "Encrypt Name: $encrypt";

	?>

</body>
</html>