<?php
session_start();
require_once 'includes/AuthFacade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth = new AuthFacade();
    if ($auth->login($_POST['username'], $_POST['password'])) {
        header('Location: welcome.php');
        exit();
    } else {
        $error = "Invalid username or password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nsu Study Buddy - Login</title>
  <link rel="stylesheet" href="css/login_style.css">
</head>
<body>
  <div class="wrapper">
    <form action="#" method="POST">
      <h2>Login</h2>
      <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
      <div class="input-field">
        <input type="text" name="username" required>
        <label>Enter your email</label>
      </div>
      <div class="input-field">
        <input type="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <div class="forget">
        <label for="remember">
          <input type="checkbox" id="remember" name="remember">
          <span>Remember me</span>
        </label>
        <a href="forgot-password.php">Forgot password?</a>
      </div>
      <button type="submit">Log In</button>
      <div class="register">
        <p>Don't have an account? <a href="register.php">Register</a></p>
      </div>
    </form>
  </div>
</body>
</html>
