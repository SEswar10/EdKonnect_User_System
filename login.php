<?php
session_start();
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT id, first_name, password FROM users WHERE user_id = ?");
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $stmt->store_result();
    $stmt->bind_result($id, $first_name, $hashed_password);
    
    if ($stmt->num_rows > 0) {
        $stmt->fetch();
        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['first_name'] = $first_name;
            header("Location: users.php");
            exit();
        } else {
            echo "<script>alert('Invalid password!');</script>";
        }
    } else {
        echo "<script>alert('User ID not found!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - EdKonnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 400px;">
            <h2 class="text-center text-success">Login</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">User ID</label>
                    <input type="text" name="user_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-success w-100">Login</button>
                <p class="text-center mt-3">
                    Don't have an account? <a href="register.php">Register</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
