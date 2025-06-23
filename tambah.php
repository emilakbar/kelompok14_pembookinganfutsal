<?php
$koneksi = new mysqli("localhost", "root", "", "booking_futsal");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $no_telpon = $_POST['no_telpon'];
  $lapangan = $_POST['lapangan'];
  $jadwal = $_POST['jadwal'];
  $waktu = date("Y-m-d H:i:s");

  $koneksi->query("INSERT INTO pembookingan (nama, no_telpon, lapangan, jadwal_Pembookingan, created) 
                  VALUES ('$nama', '$no_telpon', '$lapangan', '$jadwal', '$waktu')");
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">
  <div class="container">
    <h3>Tambah Booking Futsal</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>No Telpon</label>
        <input type="text" name="no_telpon" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Lapangan</label>
        <select name="lapangan" class="form-control" required>
          <option value="">-- Pilih Lapangan --</option>
          <option value="Lapangan A">Lapangan A</option>
          <option value="Lapangan B">Lapangan B</option>
          <option value="Lapangan C">Lapangan C</option>
          <option value="Lapangan Matras">Lapangan Matras</option>
        </select>
      </div>
      <div class="mb-3">
        <label>Jadwal</label>
        <input type="text" name="jadwal" placeholder="Contoh: 10.00 - 11.00" class="form-control" required>
      </div>
      <button class="btn btn-success">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
