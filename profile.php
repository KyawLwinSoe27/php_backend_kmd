<?php
include('process/connection.php');
session_start();

if(isset($_SESSION['id'])) {
    $id = $_SESSION['id'];
} else {
    echo "<script>window.alert('Please login')</script>";
    echo "<script>window.location='login.php'</script>";
}

$query = "SELECT * FROM usertb WHERE userId = $id";

$result = mysqli_query($connection, $query);

$arr = mysqli_fetch_array($result);
$userid = $arr['userid'];
$username = $arr['userName'];
$useremail = $arr['userEmail'];
$address = $arr['address'];
$phoneNumber = $arr['phoneNumber'];
$gender = $arr['gender'];
$photo = $arr['photo'];


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
</head>
<body>
<?php include('navbar.php') ?>

<?php
echo  "
<img src='photo/$photo' width='200px' height='auto' />
<h3>Name: $username</h3>
<h3>Email: $useremail</h3>
<h3>Address: $address</h3>
<h3>Phone Number: $phoneNumber</h3>
<h3>Gender: $gender</h3>";


?>

<a href="profileEdit.php?id=<?php echo $userid ?>">Edit</a>



</body>
</html>