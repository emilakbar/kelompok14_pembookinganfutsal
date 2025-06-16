<?php
$koneksi = new mysqli("localhost", "root", "", "booking futsal");
$data = $koneksi->query("SELECT * FROM pembookingan");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Booking</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body { background-color: #f1f4ff; font-family: 'Segoe UI', sans-serif; }
    .table thead { background-color: #6c63ff; color: white; }
    .btn-blue { background-color: #3b82f6; color: white; }
    .btn-blue:hover { background-color: #2563eb; }
    .btn-red { background-color: #ef4444; color: white; }
    .btn-red:hover { background-color: #dc2626; }
    .card { border: none; border-radius: 15px; }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #6c63ff;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Data Booking</a>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="#">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Lapangan</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Booking</a></li>
        <li class="nav-item"><a class="nav-link" href="#">User</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container my-4">
  <div class="card shadow p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
      <h4 class="mb-0">Daftar Booking Futsal</h4>
      <a href="tambah_booking.php" class="btn btn-blue">+ Tambah Booking</a>
    </div>

    <table class="table table-bordered table-hover">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>No Telpon</th>
          <th>Jadwal</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while($row = $data->fetch_assoc()) { ?>
          <tr>
            <td><?= $no++ ?></td>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['no telpon'] ?></td>
            <td><?= $row['jadwal_Pembookingan'] ?></td>
            <td><?= $row['created'] ?></td>
    <td>
    <a href="edit_booking.php?id=' . $row['id'] . '" class="btn btn-blue btn-sm">Edit</a> 
    <a href="hapus_booking.php?id=' . $row['id'] . '" onclick="return confirm(\'Hapus booking ini?\')" class="btn btn-red btn-sm">Hapus</a>
    </td>
          </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</div>

</body>
</html>
