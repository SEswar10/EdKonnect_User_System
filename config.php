<?php
$host = "localhost";
$dbname = "edkonnect";
$username = "root";  // Change if you set a MySQL password
$password = "";      // Keep empty if no password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
