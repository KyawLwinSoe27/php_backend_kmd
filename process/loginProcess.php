<?php
include('connection.php');
if (isset($_POST['btnLogin'])) {
	// code...
	$email =$_POST['txtUserEmail'];
	$password =$_POST['txtUserPassword'];

	$query="SELECT * FROM usertb WHERE
            userEmail='$email'";

    $result=mysqli_query($connection,$query);
    $arr=mysqli_fetch_array($result);
    $encryptPassword=$arr['userPassword'];

  
    //$row=mysqli_num_rows($result);

    if (password_verify($password,$encryptPassword)) {
		// code...
		echo "<script>window.alert('Login Success.')</script>";
		echo "<script>window.location='../adminHome.php'</script>";
	}
	else{
		echo "<script>window.alert('Login Fail.')</script>";
		echo "<script>window.location='../login.php'</script>";
	}
}

?>