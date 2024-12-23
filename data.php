<?php
// data.php
include 'db.php';

session_start();

// Periksa apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Ambil data dari database
$query = "SELECT * FROM data";
$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Karakter Kesukaan</title>
    <link rel="stylesheet" href="styledash.css">
</head>

<header>
    <div>
        <h1>Firefly</h1>
    </div>
    <div class="user-info">
        <p>Hai, <?php echo htmlspecialchars($_SESSION['username']); ?>!</p>
    </div>
    <nav class="menu-bar">
        <a href="form.php">Input Data</a>
        <a href="data.php">Lihat Data</a>
        <a href="logout.php">Logout</a>
    </nav>
</header>

<body>
    <div class="table-container">
        <h1>Data Mahasiswa</h1>
        <table border="1">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>NIM</th>
                    <th>Asal Kampus</th>
                    <th>Karakter Kesukaan</th>
                    <th>Gambar</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['nama']); ?></td>
                    <td><?php echo htmlspecialchars($row['nim']); ?></td>
                    <td><?php echo htmlspecialchars($row['asal_kampus']); ?></td>
                    <td><?php echo htmlspecialchars($row['karakter_kesukaan']); ?></td>
                    <td><img src="uploads/<?php echo htmlspecialchars($row['gambar']); ?>" alt="Gambar" width="100"></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>
