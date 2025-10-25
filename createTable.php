<?php
$connection=mysqli_connect('localhost','root','','l5dc115db'); // localhost, username, password, db name
$query="
		CREATE table usertb
			(
				userId int primary key auto_increment,
				userName varchar(50),
				userEmail varchar(50),
				userPassword varchar(50)
			)
      ";

  $result=mysqli_query($connection,$query); // connection, query

  if ($result) {
  	// code...
  	echo "user table created";
  }
  else{
  	echo "table already exist.";
  }
?>
