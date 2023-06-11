<?php
// Menghubungkan ke database
include 'config/connection.php';
// Memulai sesi
session_start();

// Memeriksa apakah pengguna sudah login
if (!isset($_SESSION['id_mahasiswa'])) {
    // Jika tidak, redirect ke halaman login
    header("Location: login.php");
    exit();
}

// Menampilkan data pengguna yang sudah login
$id_mahasiswa = $_SESSION['id_mahasiswa'];
$nama_mahasiswa = $_SESSION['nama_mahasiswa'];
$nim = $_SESSION['nim'];
$email_mahasiswa = $_SESSION['email_mahasiswa'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Halaman Sesudah Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Selamat datang, <?php echo $nama_mahasiswa; ?></h1>
        <p>NIM: <?php echo $nim; ?></p>
        <p>Email: <?php echo $email_mahasiswa; ?></p>

        <!-- Tombol untuk logout -->
        <a href="logout-mhs.php" class="btn btn-primary">Logout</a>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>