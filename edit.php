<?php
$koneksi = new mysqli("localhost", "root", "", "booking_futsal");

$id = $_GET['id'] ?? null;
if (!$id) {
    die("ID tidak ditemukan.");
}

$result = $koneksi->query("SELECT * FROM pembookingan WHERE id = '$id'");
if (!$result || $result->num_rows === 0) {
    die("Data tidak ditemukan.");
}

$row = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $no_telpon = $_POST['no_telpon'];
    $lapangan = $_POST['lapangan'];
    $jadwal = $_POST['jadwal'];

    $koneksi->query("UPDATE pembookingan SET 
        nama = '$nama', 
        no_telpon = '$no_telpon', 
        lapangan = '$lapangan',
        jadwal_Pembookingan = '$jadwal' 
        WHERE id = '$id'");

    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
  <div class="container">
    <h3>Edit Booking Futsal</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" value="<?= htmlspecialchars($row['nama']) ?>" required>
      </div>
      <div class="mb-3">
        <label>No Telpon</label>
        <input type="text" name="no_telpon" class="form-control" value="<?= htmlspecialchars($row['no_telpon']) ?>" required>
      </div>
      <div class="mb-3">
        <label>Lapangan</label>
        <select name="lapangan" class="form-control" required>
          <option value="">-- Pilih Lapangan --</option>
          <option value="Lapangan A" <?= $row['lapangan'] == 'Lapangan A' ? 'selected' : '' ?>>Lapangan A</option>
          <option value="Lapangan B" <?= $row['lapangan'] == 'Lapangan B' ? 'selected' : '' ?>>Lapangan B</option>
          <option value="Lapangan C" <?= $row['lapangan'] == 'Lapangan C' ? 'selected' : '' ?>>Lapangan C</option>
          <option value="Lapangan Matras" <?= $row['lapangan'] == 'Lapangan Matras' ? 'selected' : '' ?>>Lapangan Matras</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Jadwal</label>
        <input type="text" name="jadwal" class="form-control" value="<?= htmlspecialchars($row['jadwal_Pembookingan']) ?>" required>
      </div>
      <button class="btn btn-primary">Simpan Perubahan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
