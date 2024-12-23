<?php
session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Input Data</title>
    <link rel="stylesheet" href="styledash.css">
</head>

<header>
        <div>
            <h1>Firefly</h1>
        </div>
        <nav class="menu-bar">
            <a href="form.php">Input Data</a>
            <a href="data.php">Lihat Data</a>
            <a href="logout.php">Logout</a>
        </nav>
    </header>

<body>
    <div class="form-container">
        <h1>Masukkan Data</h1>
        <form action="submit.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="nim">NIM:</label>
                <input type="text" id="nim" name="nim" required>
            </div>
            <div class="form-group">
                <label for="asal_kampus">Asal Kampus:</label>
                <input type="text" id="asal_kampus" name="asal_kampus" required>
            </div>
            <div class="form-group">
                <label for="karakter_kesukaan">Karakter Kesukaan:</label>
                <input type="text" id="karakter_kesukaan" name="karakter_kesukaan" required>
            </div>
            <div class="form-group">
                <label for="gambar">Upload Gambar:</label>
                <input type="file" id="gambar" name="gambar" accept="image/*" required>
            </div>
            <button type="submit">Submit</button>
        </form>
    </div>
</body>
</html>
