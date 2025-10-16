<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forgot Password</title>
  <link rel="stylesheet" href="statics/forget_pass.css">
</head>
<body>
  <div class="container">
    <form class="forgot-password-box" action="forget_check_pass.php" method="POST">
      <h2>Reset Your Password</h2>
      <p class="description">Enter your username to verify your account.</p>

      <div class="input-group">
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required placeholder="Enter your username">
      </div>

      <!-- Message display area -->
      <div id="message" class="message"></div>

      <button type="submit" class="reset-btn">Verify Username</button>

      <p class="login-link">Remember your password? <a href="login.php">Login here</a></p>
    </form>
  </div>

  <script>
    // Check URL for message parameter
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');
    if (message === 'error') {
      document.getElementById('message').innerHTML = 
        '<div class="error-message">✗ Username not found</div>';
    }
  </script>
</body>
</html>