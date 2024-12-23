<?php
// submit.php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $asal_kampus = $_POST['asal_kampus'];
    $karakter_kesukaan = $_POST['karakter_kesukaan'];
    $gambar = $_FILES['gambar']['name'];
    $gambar_tmp = $_FILES['gambar']['tmp_name'];

    // Pindahkan file gambar ke folder uploads
    $target_dir = "uploads/";
    if (!is_dir($target_dir)) {
        mkdir($target_dir);
    }
    $target_file = $target_dir . basename($gambar);
    move_uploaded_file($gambar_tmp, $target_file);

    // Simpan data ke database
    $query = "INSERT INTO data (nama, nim, asal_kampus, karakter_kesukaan, gambar) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('sssss', $nama, $nim, $asal_kampus, $karakter_kesukaan, $gambar);

    if ($stmt->execute()) {
        echo "<script>alert('Data berhasil disimpan!'); window.location.href='data.php';</script>";
    } else {
        echo "<script>alert('Terjadi kesalahan!');</script>";
    }
}
?>
