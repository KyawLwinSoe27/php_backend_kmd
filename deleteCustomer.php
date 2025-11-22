<?php


global $connection;
include('process/connection.php');

if (!isset($_GET['id'])) {
    echo "<script>alert('Please login'); window.location='customer.php';</script>";
    exit();
}


$uId = intval($_GET['id']); // Secure

$query = "UPDATE usertb set status='inactive' WHERE userid=$uId";

$result = mysqli_query($connection, $query);

if($result) {
    echo "<script>alert('Customer Deleted successfully'); window.location='customer.php';</script>";
}