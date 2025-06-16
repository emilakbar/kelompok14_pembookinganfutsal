<?php
$host = "localhost";     // Host database (default XAMPP)
$user = "root";          // Username default XAMPP
$pass = "";              // Kosongkan jika tidak ada password
$db   = "db_futsal";     // GANTI dengan nama database kamu

$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
