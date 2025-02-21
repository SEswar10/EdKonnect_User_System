
<?php
include 'db.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $user_id = $_POST['user_id'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hashing password

    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, user_id, password) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $first_name, $last_name, $user_id, $password);
    
    if ($stmt->execute()) {
        echo "<script>alert('Registered Successfully!'); window.location='login.php';</script>";
    } else {
        echo "<script>alert('Error: Registration failed');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - EdKonnect</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow p-4 mx-auto" style="max-width: 400px;">
            <h2 class="text-center text-primary">Register</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" name="first_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" name="last_name" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">User ID</label>
                    <input type="text" name="user_id" class="form-control" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Register</button>
                <p class="text-center mt-3">
                    Already have an account? <a href="login.php">Login</a>
                </p>
            </form>
        </div>
    </div>
</body>
</html>
