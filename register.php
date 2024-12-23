<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Periksa apakah email sudah ada
    $checkQuery = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($checkQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('Email sudah terdaftar. Silakan gunakan email lain.');</script>";
    } else {
        // Jika email belum ada, lakukan pendaftaran
        $query = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $username, $email, $password);

        if ($stmt->execute()) {
            echo "<script>alert('Pendaftaran berhasil! Silakan login.');</script>";
            header("Location: index.php");
        } else {
            echo "<script>alert('Terjadi kesalahan saat mendaftar.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="js/script.js"></script>
</head>
<body>
    <div class="register-container">
        <h1>Game Register</h1>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="form-group">
                <input type="password" id="confirm-password" name="confirm_password" placeholder="Confirm Password" required>
            </div>
            <button type="submit" id="register-button">Register</button>
            <p>already have an account? <a href="index.php">Login</a></p>
        </form>
    </div>
</body>
</html>
