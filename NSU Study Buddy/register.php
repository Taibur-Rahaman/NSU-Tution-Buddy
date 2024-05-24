<?php
require_once 'includes/AuthFacade.php';
require_once 'includes/ValidatorDecorator.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usernameValidator = new UsernameValidator();
    $passwordValidator = new PasswordValidator();
    $usernameValidator->setNext($passwordValidator);

    $data = ['username' => $_POST['username'], 'password' => $_POST['password']];
    if ($usernameValidator->validate($data)) {
        $auth = new AuthFacade();
        if ($auth->register($_POST['username'], $_POST['password'])) {
            header('Location: login.php');
            exit();
        } else {
            $error = "Registration failed.";
        }
    } else {
        $error = "Invalid input.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nsu Study Buddy - Sign Up</title>
  <link rel="stylesheet" href="css/signup_style.css">
</head>
<body>
  <div class="wrapper">
    <form id="signup-form" method="POST" action="#">
      <h2>Sign Up</h2>
      <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
      <div class="input-field">
        <input type="text" id="username" name="username" required>
        <label>Enter your username</label>
      </div>
      <div class="input-field">
        <input type="password" id="password" name="password" required>
        <label>Enter your password</label>
      </div>
      <button type="submit">Sign Up</button>
      <div class="login">
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </form>
  </div>
</body>
</html>
