<?php
include ("db.php");
include ("functions.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $user = $_POST['username'];

    $sql = "SELECT * FROM users WHERE username = '$user'";
    $result = mysqli_query($conn , $sql);
    if($result && mysqli_num_rows($result) == 1){
        $token = generateToken();

        $sql = "UPDATE users SET token = '$token' WHERE username = '$user'";
        $result = mysqli_query($conn , $sql);
        header("Location: reset_pass.php?token=$token&username=$user");
        
}else{
    header("Location:forget_pass.php?message=error");
}
}
?>


