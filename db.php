<?php
$host = "localhost"; // Change this if using a different host
$user = "root"; // Your MySQL username
$password = ""; // Your MySQL password (empty for XAMPP)
$database = "edkonnect"; // Your database name

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}
?>
