<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Dark Theme</title>
  <link rel="stylesheet" href="statics/signup.css">
</head>
<body>
  <div class="container">
    <form class="signup-box" action="registeration.php" method="POST">
      <h2>Create Account</h2>
      
      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required>
      </div>

      <div class="input-group">
        <label for="email">Password</label>
        <input type="password" id="password" name="password" required>
      </div>

      <button type="submit" class="signup-btn">Sign Up</button>

      <p class="login-link">Already have an account? <a href="login.php">Login</a></p>
    </form>
  </div>
</body>
</html>