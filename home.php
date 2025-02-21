<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>


<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EdKonnect - Home</title>
</head>
<body>
    <h2>Welcome to EdKonnect!</h2>
    <p><a href="list_users.php">View Registered Users</a></p>
    <p><a href="logout.php">Logout</a></p>
</body>
</html>
