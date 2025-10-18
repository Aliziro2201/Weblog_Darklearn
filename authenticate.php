<?php
session_start();

include ("db.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    if(!is_null($row)){
      $_SESSION['is_logged'] = true;
      $_SESSION['username'] = $row['username'];
      $_SESSION['user_id'] = $row['id'];
        header("Location:user_panel.php");

    }else{
        header("Location:login.php?message=invalid");
    }
}else{
    ?>
    <?php
// forbidden.php
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
  <p>Access Denied — You don’t have permission to view this page.</p>
  <a href="login.php">Go back to login</a>
</body>
</html>

    <?php
}
?>