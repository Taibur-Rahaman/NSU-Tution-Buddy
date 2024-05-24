<?php
require_once 'includes/AuthFacade.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $auth = new AuthFacade();
    $auth->forgotPassword($_POST['email']);
    $message = "If the email is registered, you will receive instructions to reset your password.";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nsu Study Buddy - Forgot Password</title>
  <link rel="stylesheet" href="css/forgot_password_style.css">
</head>
<body>
  <div class="wrapper">
    <h1>Nsu Study Buddy: Password Reset</h1>
    <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>
    <form id="reset-form" method="POST" action="#">
      <label for="email">Enter your registered email address:</label>
      <input type="email" id="email" name="email" required>
      <button type="submit">Send Reset Link</button>
    </form>
    <div class="login">
      <p>Remembered your password? <a href="login.php">Login</a></p>
    </div>
  </div>
</body>
</html>
