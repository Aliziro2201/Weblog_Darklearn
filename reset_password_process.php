<?php

include ("db.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $new_pass = $_POST["new_password"];
    $token = $_POST["token"];
    $user = $_POST["username"];

    $sql = "SELECT * FROM users WHERE username='$user'";
    $result = mysqli_query($conn , $sql);
    $row = mysqli_fetch_assoc($result);


    if ($token == $row['token']){
        $sql = "UPDATE users SET token = NULL WHERE username = '$user'";
        $result = mysqli_query($conn , $sql);


        $sql = "UPDATE users SET password = '$new_pass' WHERE username = '$user'";
        $result = mysqli_query($conn , $sql);
        if($result){
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset Success</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #e6e6e6;
      padding: 20px;
    }

    .success-container {
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .success-card {
      background: #2d3047;
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
      border: 1px solid #404467;
    }

    .success-icon {
      width: 80px;
      height: 80px;
      background: rgba(46, 204, 113, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 25px;
      border: 2px solid #2ecc71;
    }

    .success-icon svg {
      width: 40px;
      height: 40px;
      fill: #2ecc71;
    }

    h1 {
      color: #ffffff;
      margin-bottom: 15px;
      font-size: 32px;
      font-weight: 600;
    }

    .success-message {
      color: #b8b8d0;
      margin-bottom: 35px;
      line-height: 1.6;
      font-size: 18px;
    }

    .login-btn {
      display: inline-block;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      text-decoration: none;
      padding: 14px 35px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.3s ease;
      margin-top: 10px;
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .additional-info {
      margin-top: 30px;
      padding-top: 25px;
      border-top: 1px solid #404467;
      color: #8a8ba8;
      font-size: 14px;
    }

    .countdown {
      color: #667eea;
      font-weight: 600;
      font-size: 16px;
    }

    /* Animation */
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .success-card {
      animation: fadeIn 0.6s ease-out;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .success-card {
        padding: 40px 25px;
      }
      
      h1 {
        font-size: 26px;
      }
      
      .success-message {
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
  <div class="success-container">
    <div class="success-card">
      <div class="success-icon">
        <svg viewBox="0 0 24 24">
          <path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/>
        </svg>
      </div>
      
      <h1>Password Reset Successful!</h1>
      
      <p class="success-message">
        Your password has been reset successfully. You can now log in with your new password.
      </p>
      
      <a href="login.php" class="login-btn">Continue to Login</a>
      
      <div class="additional-info">
        <p>You will be automatically redirected to the login page in <span class="countdown" id="countdown">10</span> seconds.</p>
      </div>
    </div>
  </div>

  <script>
    // Countdown timer for automatic redirect
    let countdown = 10;
    const countdownElement = document.getElementById('countdown');
    const countdownInterval = setInterval(() => {
      countdown--;
      countdownElement.textContent = countdown;
      
      if (countdown <= 0) {
        clearInterval(countdownInterval);
        window.location.href = 'login.php';
      }
    }, 1000);
  </script>
</body>
</html>


<?php
        }
        else{
            ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password Reset Error</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: linear-gradient(135deg, #1a1a2e 0%, #16213e 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      color: #e6e6e6;
      padding: 20px;
    }

    .error-container {
      width: 100%;
      max-width: 500px;
      text-align: center;
    }

    .error-card {
      background: #2d3047;
      padding: 50px 40px;
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
      border: 1px solid #404467;
    }

    .error-icon {
      width: 80px;
      height: 80px;
      background: rgba(231, 76, 60, 0.1);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 25px;
      border: 2px solid #e74c3c;
    }

    .error-icon svg {
      width: 40px;
      height: 40px;
      fill: #e74c3c;
    }

    h1 {
      color: #ffffff;
      margin-bottom: 15px;
      font-size: 32px;
      font-weight: 600;
    }

    .error-message {
      color: #b8b8d0;
      margin-bottom: 30px;
      line-height: 1.6;
      font-size: 18px;
    }

    .error-details {
      background: rgba(231, 76, 60, 0.1);
      border: 1px solid #e74c3c;
      border-radius: 8px;
      padding: 15px;
      margin-bottom: 25px;
      text-align: left;
    }

    .error-details h3 {
      color: #e74c3c;
      margin-bottom: 10px;
      font-size: 16px;
    }

    .error-details ul {
      color: #b8b8d0;
      padding-left: 20px;
    }

    .error-details li {
      margin-bottom: 5px;
    }

    .action-buttons {
      display: flex;
      gap: 15px;
      justify-content: center;
      flex-wrap: wrap;
    }

    .retry-btn {
      display: inline-block;
      background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
      color: white;
      text-decoration: none;
      padding: 14px 30px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.3s ease;
      border: none;
      cursor: pointer;
    }

    .back-btn {
      display: inline-block;
      background: #404467;
      color: #b8b8d0;
      text-decoration: none;
      padding: 14px 30px;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .retry-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
    }

    .back-btn:hover {
      background: #505580;
      color: #ffffff;
      transform: translateY(-2px);
    }

    .support-text {
      margin-top: 25px;
      color: #8a8ba8;
      font-size: 14px;
    }

    .support-text a {
      color: #667eea;
      text-decoration: none;
    }

    .support-text a:hover {
      text-decoration: underline;
    }

    /* Animation */
    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
      20%, 40%, 60%, 80% { transform: translateX(5px); }
    }

    .error-card {
      animation: fadeIn 0.6s ease-out;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .shake {
      animation: shake 0.5s ease-in-out;
    }

    /* Responsive */
    @media (max-width: 480px) {
      .error-card {
        padding: 40px 25px;
      }
      
      h1 {
        font-size: 26px;
      }
      
      .error-message {
        font-size: 16px;
      }
      
      .action-buttons {
        flex-direction: column;
      }
      
      .retry-btn, .back-btn {
        width: 100%;
        text-align: center;
      }
    }
  </style>
</head>
<body>
  <div class="error-container">
    <div class="error-card" id="errorCard">
      <div class="error-icon">
        <svg viewBox="0 0 24 24">
          <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/>
        </svg>
      </div>
      
      <h1>Password Reset Failed</h1>
      
      <p class="error-message">
        We couldn't reset your password. Please try again or contact support if the problem continues.
      </p>
      
      <div class="error-details">
        <h3>Possible reasons:</h3>
        <ul>
          <li>Passwords didn't match</li>
          <li>Password is too weak</li>
          <li>Network connection issue</li>
          <li>Session has expired</li>
        </ul>
      </div>
      
      <div class="action-buttons">
        <a href="reset_password.html" class="retry-btn" onclick="retryAction()">Try Again</a>
        <a href="login.php" class="back-btn">Back to Login</a>
      </div>
      
      <div class="support-text">
        Need help? <a href="contact.php">Contact support</a>
      </div>
    </div>
  </div>

  <script>
    // Add shake animation when page loads
    document.addEventListener('DOMContentLoaded', function() {
      const errorCard = document.getElementById('errorCard');
      errorCard.classList.add('shake');
      
      // Remove shake class after animation completes
      setTimeout(() => {
        errorCard.classList.remove('shake');
      }, 500);
    });

    // Retry button action
    function retryAction() {
      const errorCard = document.getElementById('errorCard');
      errorCard.classList.add('shake');
      
      setTimeout(() => {
        errorCard.classList.remove('shake');
      }, 500);
    }

    // Auto-retry after 15 seconds (optional)
    setTimeout(() => {
      document.querySelector('.retry-btn').classList.add('pulsing');
    }, 15000);
  </script>
</body>
</html>

<?php

        }
    }
}


?>