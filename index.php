<?php
$koneksi = new mysqli("localhost", "root", "", "booking_futsal");
$data = $koneksi->query("SELECT * FROM pembookingan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Booking Futsal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background: #f8f9fa; }
    .table-container { margin: 50px auto; max-width: 1100px; }
    .card { border: none; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
    .btn-edit { background-color: #ffc107; color: white; }
    .btn-edit:hover { background-color: #e0a800; color: white; }
    .btn-delete { background-color: #dc3545; color: white; }
    .btn-delete:hover { background-color: #bb2d3b; color: white; }
  </style>
</head>
<body>
  <div class="container table-container">
    <div class="card p-4">
      <h2 class="text-center mb-4">📋 Daftar Booking Futsal</h2>
      
      <div class="d-flex justify-content-between mb-3">
        <a href="tambah.php" class="btn btn-primary">+ Tambah Booking</a>
        <a href="laporan.php" class="btn btn-primary">Lihat Laporan</a>
      </div>
      
      <table class="table table-bordered table-hover text-center align-middle">
        <thead class="table-primary">
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th>No Telpon</th>
            <th>Lapangan</th>
            <th>Jadwal</th>
            <th>Waktu Pesan</th>
            <th>Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; while ($row = $data->fetch_assoc()): ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= htmlspecialchars($row['nama']) ?></td>
            <td><?= htmlspecialchars($row['no_telpon']) ?></td>
            <td><?= htmlspecialchars($row['lapangan']) ?></td>
            <td><?= htmlspecialchars($row['jadwal_Pembookingan']) ?></td>
            <td><?= htmlspecialchars($row['created']) ?></td>
            <td>
              <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-edit">Edit</a>
              <a href="hapus.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-delete" onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
          </tr>
          <?php endwhile; ?>
        </tbody>
      </table>
    </div>
  </div>
</body>
</html>
