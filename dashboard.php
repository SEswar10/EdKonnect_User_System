<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

echo "Welcome, " . $_SESSION['first_name'] . "! <br>";
echo "<a href='list_users.php'>List Users</a> | <a href='logout.php'>Logout</a>";
?>
