<?php
$servername = "localhost";
$username = "darklearn";     // your database username
$password = "123";         // your database password
$dbname = "Darklearn"; // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>



