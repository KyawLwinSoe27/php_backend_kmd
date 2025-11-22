<?php
global $connection;
include('connection.php');
session_start();
if (isset($_POST['btnLogin'])) {
	// code...
	$email =$_POST['txtUserEmail'];
	$password =$_POST['txtUserPassword'];

	$query="SELECT * FROM usertb WHERE
            userEmail='$email'";

    $result=mysqli_query($connection,$query);
    $arr=mysqli_fetch_array($result);
    $encryptPassword=$arr['userPassword'];
    $userId = $arr['userid'];
    $role = $arr['userRole'];

  
    //$row=mysqli_num_rows($result);

    if (password_verify($password,$encryptPassword)) {
        $_SESSION['id'] = $userId;
        $_SESSION['role'] = $role;
        echo "<script>window.alert('Login Success.')</script>";

        if($role == 'admin') {
            echo "<script>window.location='../adminHome.php'</script>";
        } else if ($role == 'user') {
            echo "<script>window.location='../userHome.php'</script>";
        } else {
            echo "<script>window.alert('Role Error.')</script>";
            echo "<script>window.location='../login.php'</script>";

        }


	}
	else{
		echo "<script>window.alert('Login Fail.')</script>";
		echo "<script>window.location='../login.php'</script>";
	}
}

?>