<?php
session_start();

if (isset($_POST['login'])) {
  // Check if username and password are valid
  $username = $_POST['username'];
  $password = $_POST['password'];
  if ($username === '123' && $password === '123') {
    $_SESSION['username'] = $username;
    header('Location: dashboard.php');
    exit();
  } else {
    $error = "Invalid username or password";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
</head>
<body>
  <?php if (isset($error)): ?>
    <p><?php echo $error; ?></p>
  <?php endif; ?>
  <form method="post" action="">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username"><br><br>
    <label for="password">Password:</label>
    <input type="password" id="password" name="password"><br><br>
    <input type="submit" name="login" value="Login">
  </form>
</body>
</html>
