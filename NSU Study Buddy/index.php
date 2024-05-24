<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: welcome.php');
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login System</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>
    <div class="container">
        <h1>Login System</h1>
        <a href="login.php">Login</a> | <a href="register.php">Register</a> | <a href="forgot-password.php">Forgot Password</a>
    </div>
</body>
</html>
