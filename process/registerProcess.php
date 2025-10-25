
<?php 

include('connection.php');

if (isset($_POST['btnRegister'])) {
	// code...
	$userName=$_POST['txtUserName'];
	$userEmail=$_POST['txtUserEmail'];
	$userPassword=$_POST['txtUserPassword'];

	$enycrptPassword=password_hash($userPassword, PASSWORD_DEFAULT);

	$checkQuery="SELECT * FROM usertb WHERE userEmail='$userEmail'";
    $checkResult=mysqli_query($connection,$checkQuery);
    $arr=mysqli_fetch_array($checkResult);
	$dbEmail=$arr['userEmail'];

    if ($dbEmail==$userEmail) {
    	// code...
    	echo "<script>window.alert('Enail already exist!')</script>";
		echo "<script>window.location='../register.php'</script>";
    }
    else{
    $query= "
				INSERT into usertb (userName,userEmail,userPassword) 
				values ('$userName','$userEmail','$enycrptPassword');
	        ";
	$result=mysqli_query($connection,$query);

	if ($result) {
		// code...
		echo "<script>window.alert('Register Success.')</script>";
		echo "<script>window.location='../register.php'</script>";
	}
	else{
		echo "<script>window.alert('Register Fail.')</script>";
		echo "<script>window.location='../register.php'</script>";
	}
    }
}

 ?>

