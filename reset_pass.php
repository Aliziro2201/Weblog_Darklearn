<?php
include("db.php");

$user = $_GET['username'];
$sql = "SELECT * FROM users WHERE username='$user'";
$result = mysqli_query($conn , $sql);
$row = mysqli_fetch_assoc($result);

if ($_GET['token'] == $row['token']){


?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset Password</title>
  <link rel="stylesheet" href="statics/reset_pass.css">
</head>
<body>
  <div class="container">
    <form class="reset-password-box" action="reset_password_process.php" method="POST">
      <h2>Create New Password</h2>
      <p class="description">Enter your new password below.</p>

      <div class="input-group">
        <label for="new_password">New Password</label>
        <input type="password" id="new_password" name="new_password" required placeholder="Enter new password">
        <input type="token" id="token" name="token" value="<?php echo $_GET['token'] ?>" hidden>
        <input type="username" id="username" name="username" value="<?php echo $user ?>" hidden>
        <div class="password-requirements">
          <span>Must be at least 8 characters</span>
        </div>
      </div>

      <div class="input-group">
        <label for="confirm_password">Confirm Password</label>
        <input type="password" id="confirm_password" name="confirm_password" required placeholder="Confirm new password">
      </div>

      <!-- Password match indicator -->
      <div id="password-match" class="password-match"></div>

      <!-- Message display area -->
      <div id="message" class="message"></div>

      <button type="submit" class="reset-btn" id="submit-btn">Reset Password</button>

      <p class="login-link">Remember your password? <a href="login.php">Login here</a></p>
    </form>
  </div>

  <script>
    // Password match validation
    const newPassword = document.getElementById('new_password');
    const confirmPassword = document.getElementById('confirm_password');
    const passwordMatch = document.getElementById('password-match');
    const submitBtn = document.getElementById('submit-btn');

    function checkPasswordMatch() {
      const password1 = newPassword.value;
      const password2 = confirmPassword.value;

      if (password2 === '') {
        passwordMatch.innerHTML = '';
        submitBtn.disabled = true;
        return;
      }

      if (password1 === password2 && password1.length >= 8) {
        passwordMatch.innerHTML = '<div class="match-success">✓ Passwords match</div>';
        submitBtn.disabled = false;
      } else if (password1 !== password2) {
        passwordMatch.innerHTML = '<div class="match-error">✗ Passwords do not match</div>';
        submitBtn.disabled = true;
      } else {
        passwordMatch.innerHTML = '<div class="match-error">✗ Password must be at least 8 characters</div>';
        submitBtn.disabled = true;
      }
    }

    newPassword.addEventListener('input', checkPasswordMatch);
    confirmPassword.addEventListener('input', checkPasswordMatch);

    // Check URL for message parameters
    const urlParams = new URLSearchParams(window.location.search);
    const message = urlParams.get('message');
    
    if (message === 'success') {
      document.getElementById('message').innerHTML = 
        '<div class="success-message">✓ Password reset successfully!</div>';
    } else if (message === 'error') {
      document.getElementById('message').innerHTML = 
        '<div class="error-message">✗ Error resetting password</div>';
    }
  </script>
</body>
</html>

<?php
}else{
    http_response_code(403); // send 403 Forbidden status
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>403 Forbidden</title>
  <style>
    body {
      background-color: #0f172a;
      color: #f87171;
      font-family: Arial, sans-serif;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      height: 100vh;
    }
    h1 { font-size: 60px; margin: 0; }
    p { font-size: 18px; color: #e5e7eb; }
    a {
      color: #60a5fa;
      text-decoration: none;
      margin-top: 20px;
    }
    a:hover { text-decoration: underline; }
  </style>
</head>
<body>
  <h1>403</h1>
  <p>Access Denied — You don’t have permission to view this page.<br><h1> Token Not Valid</h1> </p>
  <a href="login.php">Go back to login</a>
</body>
</html>

    <?php
}
?>