<?php
$koneksi = new mysqli("localhost", "root", "", "booking_futsal");

$id = $_GET['id'] ?? null;
if ($id) {
    $koneksi->query("DELETE FROM pembookingan WHERE id = '$id'");
}

header("Location: index.php");
exit;
