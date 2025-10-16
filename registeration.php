<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    if (!$conn) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    // Use prepared statements to prevent SQL injection
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt = mysqli_prepare($conn, $sql);
    
    if ($stmt) {
        mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
        $result = mysqli_stmt_execute($stmt);
        
        if ($result) {
            echo "User registered successfully!";
            header("Location:login.php?message= successfully To Sign Up , Please Login");
        } else {
            echo "Error: " . mysqli_stmt_error($stmt);
        }
        mysqli_stmt_close($stmt);
    } else {
        echo "Prepare failed: " . mysqli_error($conn);
    }
}
?>

<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// If it's a GET request, return 403 Forbidden
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    http_response_code(403);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>403 Forbidden</title>
        <style>
            body { 
                font-family: Arial, sans-serif; 
                background: #1a1a2e; 
                color: #e6e6e6; 
                display: flex; 
                justify-content: center; 
                align-items: center; 
                height: 100vh; 
                margin: 0; 
            }
            .error-container { 
                text-align: center; 
                padding: 40px; 
                background: #0f3460; 
                border-radius: 8px; 
                border: 1px solid #1a5a9e;
            }
            h1 { 
                color: #ff6b6b; 
                margin-bottom: 20px; 
            }
            a { 
                color: #4a90e2; 
                text-decoration: none; 
            }
            a:hover { 
                text-decoration: underline; 
            }
        </style>
    </head>
    <body>
        <div class="error-container">
            <h1>403 Forbidden</h1>
            <p>Direct access to this page is not allowed.</p>
            <p>Please use the <a href="register.php">signup form</a> to register.</p>
        </div>
    </body>
    </html>
    <?php
    exit();
}