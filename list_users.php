<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$sql = "SELECT first_name, last_name, user_id FROM users";
$result = $conn->query($sql);

echo "<h2>User List</h2>";
while ($row = $result->fetch_assoc()) {
    echo $row['first_name'] . " " . $row['last_name'] . " (" . $row['user_id'] . ")<br>";
}
?>
<br>
<a href="dashboard.php">Back to Dashboard</a>
