<?php

include("process/connection.php");
session_start();
if(isset($_SESSION['id']) &&  isset($_SESSION['role'])) {

} else {
    echo "<script>window.location='login.php'</script>";
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css?v=<?php echo time(); ?>">

</head>
<body>

<?php
if($_SESSION['id' == null] && $_SESSION['role'] == null) {
    echo '
    <nav class="navbar">
    <ul>
        <li><a href="adminHome.php">Dashboard</a></li>
        <li><a href="customer.php">Customer</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="login.php">Login</a> </li>
    </ul>
</nav>
    ';
} else if($_SESSION['id'] != null && $_SESSION['role'] != null) {
    if($_SESSION['role'] == 'admin') {
        echo  '
    <nav class="navbar">
    <ul>
        <li><a href="adminHome.php">Dashboard</a></li>
        <li><a href="customer.php">Customer</a></li>
        <li><a href="about.php">About</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="profile.php">Profile</a></li>
        <li><a href="logout.php">Logout</a> </li>
    </ul>
</nav>
    ';
    } else {
        echo  '
    <nav class="navbar">
    <ul>
        <li><a href="">Home</a></li>
        <li><a href="">About</a></li>
        <li><a href="">Recipe Collection</a></li>
        <li><a href="">Education Resources</a></li>
        <li><a href="logout.php">Logout</a> </li>
    </ul>
</nav>
    ';
    }
} else {
    echo 'Navbar error';
}

?>


</body>
</html>