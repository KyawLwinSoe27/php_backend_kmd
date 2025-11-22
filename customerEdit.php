<?php
global $connection;
include('process/connection.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('Please login'); window.location='customer.php';</script>";
    exit();
}

$uId = intval($_GET['id']); // Secure

// Fetch user
$query = "SELECT * FROM usertb WHERE userId = '$uId'";
$result = mysqli_query($connection, $query);
$arr = mysqli_fetch_assoc($result);

if (!$arr) {
    die("User not found");
}

$userid = $arr['userid'];
$username = $arr['userName'];
$useremail = $arr['userEmail'];
$address = $arr['address'];
$phoneNumber = $arr['phoneNumber'];
$gender = $arr['gender'];
$photo = $arr['photo'];

if (isset($_POST['btnUpdate'])) {

    $name = mysqli_real_escape_string($connection, $_POST['txtUserName']);
    $uEmail = mysqli_real_escape_string($connection, $_POST['txtUserEmail']);
    $phone = mysqli_real_escape_string($connection, $_POST['txtPhoneNumber']);
    $gen = mysqli_real_escape_string($connection, $_POST['txtGender']);
    $add = mysqli_real_escape_string($connection, $_POST['txtAddress']);

    // Handle Image Upload
    if (!empty($_FILES['txtPhoto']['name'])) {
        $img = $_FILES['txtPhoto']['name'];
        $folder = 'photo/';
        $path = $folder . $img;

        move_uploaded_file($_FILES['txtPhoto']['tmp_name'], $path);
    } else {
        $img = $photo;
    }

    // Update query with quotes
    $updateQuery = "
        UPDATE usertb 
        SET userName='$name',
            userEmail='$uEmail',
            phoneNumber='$phone',
            gender='$gen',
            address='$add',
            photo='$img'
        WHERE userId='$uId'
    ";

    $updateResult = mysqli_query($connection, $updateQuery);

    if ($updateResult) {
        echo "<script>alert('Profile updated successfully'); window.location='customer.php';</script>";
    } else {
        echo "Update failed: " . mysqli_error($connection);
    }
}
?>





<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile Edit</title>
</head>
<body>

<a href="customer.php"></a>

<h1>Customer Edit</h1>

<form action="customerEdit.php?id=<?php echo $userid ?>" method="POST" enctype="multipart/form-data">

    <input type="hidden" name="txtUserId" value="<?php echo $userid?>">

    <label for="">Choose Photo: </label>
    <input type="file" name="txtPhoto" accept="image/*" onchange="loadFile(event)">

    <img src="photo/<?php echo $photo?>" width="300px" height="auto" id="output"/>

    <script>
        var loadFile = function (event) {
            var image = document.getElementById('output');
            image.src = URL.createObjectURL(event.target.files[0])
        };
    </script>


    <label for="username">User Name</label>
    <input type="text" name="txtUserName" value="<?php echo $username?>">

    <br><br>

    <label for="useremail">User Email</label>
    <input type="text" name="txtUserEmail" value="<?php echo $useremail?>" >

    <br><br>

    <label for="address">Address: </label>
    <input type="text" name="txtAddress"  value="<?php echo $address?>">

    <br><br>

    <label for="gender">Gender</label>
    <input type="text" name="txtGender" value="<?php echo $gender?>">

    <br><br>

    <label for="phoneNumber">Phone Number</label>
    <input type="text" name="txtPhoneNumber" value="<?php echo $phoneNumber?>">

    <br>

    <input type="submit" name="btnUpdate" value="update">
</form>

</body>
</html>
