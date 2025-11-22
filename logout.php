<?php
session_start();

session_destroy();

echo "<script> window.alert('Logout');  window.location = 'login.php'</script>";