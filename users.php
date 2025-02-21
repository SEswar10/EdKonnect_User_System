<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}
include 'db.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users - EdKonnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4">
            <h2 class="text-center text-info">User List</h2>
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User ID</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $result = $conn->query("SELECT id, first_name, last_name, user_id FROM users");
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['first_name']}</td>
                                <td>{$row['last_name']}</td>
                                <td>{$row['user_id']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
            <a href="logout.php" class="btn btn-danger w-100">Logout</a>
        </div>
    </div>
</body>
</html>
