<?php

include('process/registerProcess.php');

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="CSS/style.css?v=<?php echo time(); ?>">
</head>
<body class="register-body">

<div class="register-container">
    <h1 class="register-title">Register</h1>

    <form action="process/registerProcess.php" method="POST" class="register-form">

        <div class="form-group">
            <label class="form-label">User Name:</label>
            <input type="text" name="txtUserName" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">User Email:</label>
            <input type="text" name="txtUserEmail" class="form-input">
        </div>

        <div class="form-group">
            <label class="form-label">Password:</label>
            <input type="password" id="myInput" name="txtUserPassword" class="form-input">
            <div class="checkbox-group">
                <input type="checkbox" id="showPassword" onclick="showHide()" class="form-checkbox">
                <label for="showPassword" class="checkbox-label">Show Password</label>
            </div>
        </div>

        <div class="button-group">
            <input type="submit" name="btnRegister" value="Register" class="btn btn-primary">
            <input type="reset" value="Clear" class="btn btn-secondary">
        </div>

    </form>

    <a href="login.php" class="login-link">Have an account? Login</a>
</div>

<script>
    function showHide() {
        var x = document.getElementById('myInput');
        x.type = (x.type === 'password') ? 'text' : 'password';
    }
</script>

</body>
</html>