<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up</title>
  <link rel="stylesheet" href="statics/signup.css">
</head>
<body>
  <div class="container">
    <form class="signup-box" action="signup.php" method="POST">
      <h2>Sign Up</h2>

      <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" required>
      </div>

      <div class="input-group">
        <label>Email</label>
        <input type="email" name="email" required>
      </div>

      <div class="input-group">
        <label>First Name <span class="optional">(optional)</span></label>
        <input type="text" name="first_name">
      </div>

      <div class="input-group">
        <label>Last Name <span class="optional">(optional)</span></label>
        <input type="text" name="last_name">
      </div>

      <div class="input-group">
        <label>Password</label>
        <input type="password" name="password" required>
      </div>

      <button type="submit">Create Account</button>

      <p class="login-link">Already have an account? <a href="login.html">Login</a></p>
    </form>
  </div>
</body>
</html>
