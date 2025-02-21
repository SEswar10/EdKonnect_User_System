<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to EdKonnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">EdKonnect</a>
            <div class="d-flex">
                <?php if (isset($_SESSION['user_id'])): ?>
                    <a href="users.php" class="btn btn-light me-2">Dashboard</a>
                    <a href="logout.php" class="btn btn-danger">Logout</a>
                <?php else: ?>
                    <a href="login.php" class="btn btn-light me-2">Login</a>
                    <a href="register.php" class="btn btn-warning">Register</a>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container text-center mt-5">
        <h1 class="display-4 text-primary">Welcome to EdKonnect!</h1>
        <p class="lead">Your one-stop platform for seamless learning and collaboration.</p>
        
        <div class="mt-4">
            <?php if (!isset($_SESSION['user_id'])): ?>
                <a href="register.php" class="btn btn-primary btn-lg">Get Started</a>
                <a href="login.php" class="btn btn-outline-success btn-lg">Login</a>
            <?php else: ?>
                <a href="users.php" class="btn btn-success btn-lg">Go to Dashboard</a>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
