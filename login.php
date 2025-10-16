<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login | User Panel</title>
  <link rel="stylesheet" href="statics/login.css" />
</head>
<body>
  <div class="login-container">
    <div class="login-box">
      <h2>Welcome Back 👋</h2>
      <p class="subtitle">Sign in to continue to your dashboard</p>
<?php
if (isset($_GET['message'])) {

?>
      <!-- ⚠️ Static error text -->
      <p class="error-text"><?php echo $_GET['message'] ?></p>
<?php
}
?>
      <form action="authenticate.php" method="POST">
        <div class="input-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Enter your username" required />
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" placeholder="Enter your password" required />
        </div>

        <button type="submit" class="btn-login">Login</button>

        <p class="register-link">
          Don't have an account? <a href="register.php">Register</a>
        </p>
      </form>
    </div>
  </div>
</body>
</html>
