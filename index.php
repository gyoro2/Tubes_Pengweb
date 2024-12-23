<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password']; // Password plain-text dari form

    // Query untuk mendapatkan pengguna berdasarkan username
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verifikasi password dengan hash yang tersimpan
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['username'] = $username;

            // Redirect ke form.php
            header("Location: form.php");
            exit;
        } else {
            echo "<script>alert('Invalid username or password.');</script>";
        }
    } else {
        echo "<script>alert('Invalid username or password.');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="js/script.js"></script>
</head>
<body>
    <div class="login-container">
        <h1>Game Login</h1>
        <form method="POST" action="">
            <div class="form-group">
                <input type="text" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="form-group">
                <input type="password" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" id="login-button">Login</button>
            <p>Don't have an account? <a href="register.php">Register</a></p>
        </form>
    </div>
</body>
</html>
