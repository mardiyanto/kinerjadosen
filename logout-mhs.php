<?php
// Memulai sesi
session_start();

// Menghapus semua data sesi
session_destroy();

// Mengarahkan pengguna ke halaman login
header("Location: login-msiswa.php");
exit();
?>