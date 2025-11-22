
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css?v=<?php echo time(); ?>">

</head>
<body>

<?php include('navbar.php') ?>

	<h1>Welcome Home Page</h1>

	<?php

	$name="Aung Aung";
	$encrypt=password_hash($name, PASSWORD_DEFAULT);

	echo "Name: $name <br>";
	echo "Encrypt Name: $encrypt";

	?>

</body>
</html>