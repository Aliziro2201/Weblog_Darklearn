<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Panel</title>
    <link rel="stylesheet" href="statics/style.css">
    <script src="statics/functions.js"></script>
</head>
<body>

<?php
include("db.php");
if(isset($_COOKIE['is_logged']) && isset($_COOKIE['username'])){
    if($_COOKIE['is_logged'] === 'true'){

        $user = $_COOKIE['username'];
        $sql = "SELECT * FROM users WHERE username='$user'";
        $result = mysqli_query($conn , $sql);
        $row = mysqli_fetch_assoc($result);
        $firs_name = $row['firs_name'];
        $last_name = $row['last_name'];

?>
    <div class="sidebar">
        <h2>My Panel</h2>
        <a href="#">Dashboard</a>
        <a href="#">Profile</a>
        <a href="#">Posts</a>
        <a href="#">Comments</a>
        <a href="#">Settings</a>
        <a href="#" onclick="clearAllCookies();Redirect('login.php')">Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Welcome, <?php echo $firs_name; ?></h1>
            <div class="user-info">
                <img src="https://i.pravatar.cc/50" alt="User Avatar">
                <span><?php echo $row['username'];?></span>
            </div>
        </div>

        <div class="cards">
            <div class="card">
                <h3>Profile Info</h3>
                <p>Check and update your profile details here.</p>
                <a href="#" class="btn">Edit Profile</a>
            </div>
            <div class="card">
                <h3>Posts</h3>
                <p>View and manage your posts.</p>
                <a href="#" class="btn">Manage Posts</a>
            </div>
            <div class="card">
                <h3>Comments</h3>
                <p>View comments and respond to users.</p>
                <a href="#" class="btn">Manage Comments</a>
            </div>
            <div class="card">
                <h3>Settings</h3>
                <p>Adjust your account and panel settings.</p>
                <a href="#" class="btn">Go to Settings</a>
            </div>
        </div>
    </div>
    <?php
    }
}else{
    ?>
<script>
  // Show message in the page, then redirect after 3000ms (3s)
  document.body.innerHTML = '<p>Redirecting you in 3 seconds…</p>';
  setTimeout(function() {
    window.location.href = 'login.php';
  }, 3000);

</script>


<?php
}
    ?>


</body>
</html>
