<?php
// Koneksi ke database
$koneksi = new mysqli("localhost", "root", "", "booking_futsal");

// Cek koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Booking Futsal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4 text-center">Laporan Booking Futsal</h2>

    <!-- Total Booking per Lapangan -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">Total Booking per Lapangan</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Lapangan</th>
                        <th>Total Booking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT lapangan, COUNT(*) AS total_booking 
                              FROM pembookingan 
                              GROUP BY lapangan";
                    $result = $koneksi->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['lapangan']}</td>
                                <td>{$row['total_booking']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Booking Pertama dan Terakhir -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="alert alert-success">
                <?php
                $min_query = "SELECT MIN(created) AS booking_pertama FROM pembookingan";
                $min_result = $koneksi->query($min_query);
                $min_row = $min_result->fetch_assoc();
                echo "Booking pertama dilakukan pada: <strong>{$min_row['booking_pertama']}</strong>";
                ?>
            </div>
        </div>
        <div class="col-md-6">
            <div class="alert alert-warning">
                <?php
                $max_query = "SELECT MAX(created) AS booking_terakhir FROM pembookingan";
                $max_result = $koneksi->query($max_query);
                $max_row = $max_result->fetch_assoc();
                echo "Booking terakhir dilakukan pada: <strong>{$max_row['booking_terakhir']}</strong>";
                ?>
            </div>
        </div>
    </div>

    <!-- Total Booking per Tanggal -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">Total Booking per Tanggal</div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Tanggal</th>
                        <th>Total Booking</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = "SELECT DATE(created) AS tanggal, COUNT(*) AS total_booking 
                              FROM pembookingan 
                              GROUP BY DATE(created) 
                              ORDER BY tanggal ASC";
                    $result = $koneksi->query($query);
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>{$row['tanggal']}</td>
                                <td>{$row['total_booking']}</td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <a href="index.php" class="btn btn-secondary">Kembali ke Daftar Booking</a>

</div>

</body>
</html>
