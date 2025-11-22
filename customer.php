<?php
global $connection;
include('process/connection.php');


if(isset($_POST['btnSubmit'])) {
    $userName = $_POST['txtUsername'];
    $userEmail = $_POST['txtEmail'];
    $password = $_POST['txtPassword'];
    $userRole = 'user';
    $status = 'active';

    $query = "INSERT INTO usertb ('userName', 'userEmail', 'userPassword', 'role', 'status') VALUES ($userName, $userEmail, $password, $userRole, $status) ";

    $result = mysqli_query($connection, $query);

    if($result) {
        echo "<script>window.alert('Customer Register Successfully.')</script>";
    }
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact</title>
</head>
<body>
<?php include('navbar.php') ?>
<h1>Customer Register</h1>

<form method="post">
    <label for="">User Name</label>
    <input type="text" name="txtUsername">

    <br>

    <label for="">User Email</label>
    <input type="email" name="txtEmail">

    <br>

    <label for="">Password</label>
    <input type="text" name="txtPassword">

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

    <br>

    <input type="submit" name="btnSubmit" value="Register">
</form>

<hr>

<h3>Customer List</h3>

<form action="customer.php" method="POST">
    <input type="text" name="txtSearch">
    <input type="submit" name="btnSearch" value="Search">
</form>

<br>

<?php

if(isset($_POST['btnSearch'])) {

}




?>

<table>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Photo</th>
        <th>Action</th>
    </tr>

    <?php

    if(!isset($_POST['btnSearch'])) {
        $showQuery = "SELECT * FROM usertb WHERE status='active'";
        $showResult = mysqli_query($connection, $showQuery);

        $rows = mysqli_num_rows($showResult);

        for ($i=0; $i<$rows; $i++) {
            $showArr = mysqli_fetch_array($showResult);
            $id = $showArr['userid'];
            $name = $showArr['userName'];
            $email = $showArr['userEmail'];
            $photo = $showArr['photo'];

            echo "
                    <tr>
        <th>$id</th>
        <th>$name</th>
        <th>$email</th>
        <th><img src='photo/$photo' alt='' width='100px'></th>
        <th>
            <a href='customerEdit.php?id=$id'>Edit</a>
            <a href='deleteCustomer.php?id=$id'>Delete</a>
        </th>

    </tr>
                    ";

        }
    } else {
        $searchName = $_POST['txtSearch'];
        $sql = "SELECT * FROM usertb WHERE userName like '%$searchName%'";
        $result = mysqli_query($connection, $sql);

        $rows = mysqli_num_rows($result);

        for ($i=0; $i<$rows; $i++) {
            $showArr = mysqli_fetch_array($result);
            $id = $showArr['userid'];
            $name = $showArr['userName'];
            $email = $showArr['userEmail'];
            $photo = $showArr['photo'];

            echo "
                    <tr>
        <th>$id</th>
        <th>$name</th>
        <th>$email</th>
        <th><img src='photo/$photo' alt='' width='100px'></th>
        <th>
            <a href='customerEdit.php?id=$id'>Edit</a>
            <a href='deleteCustomer.php?id=$id'>Delete</a>
        </th>

    </tr>
                    ";

        }
    }



    ?>


</table>

</body>
</html>