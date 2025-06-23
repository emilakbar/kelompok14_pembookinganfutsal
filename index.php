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
    body { background: #f4f6f9; }
    .table-container { margin: 40px auto; max-width: 1000px; }
    .btn-edit { background-color: #0d6efd; color: white; }
    .btn-delete { background-color: #dc3545; color: white; }
  </style>
</head>
<body>
  <div class="container table-container">
    <h2 class="text-center mb-4">Daftar Booking Futsal</h2>
    <a href="tambah.php" class="btn btn-primary mb-3">+ Tambah Booking</a>
    <table class="table table-bordered table-striped text-center">
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
</body>
</html>
