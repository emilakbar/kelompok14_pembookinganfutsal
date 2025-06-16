<?php
include 'koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM booking WHERE id='$id'");
$data = mysqli_fetch_array($query);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telpon = $_POST['telpon'];
    $jadwal = $_POST['jadwal'];
    $tanggal = $_POST['tanggal'];

    mysqli_query($conn, "UPDATE booking SET nama='$nama', telpon='$telpon', jadwal='$jadwal', tanggal='$tanggal' WHERE id='$id'");
    header("Location: list_booking.php");
}
?>

<h2>Edit Booking</h2>
<form method="POST">
    <label>Nama:</label><br>
    <input type="text" name="nama" value="<?= $data['nama'] ?>"><br>

    <label>No Telpon:</label><br>
    <input type="text" name="telpon" value="<?= $data['telpon'] ?>"><br>

    <label>Jadwal:</label><br>
    <input type="text" name="jadwal" value="<?= $data['jadwal'] ?>"><br>

    <label>Tanggal:</label><br>
    <input type="datetime-local" name="tanggal" value="<?= date('Y-m-d\TH:i', strtotime($data['tanggal'])) ?>"><br><br>

    <input type="submit" name="submit" value="Update">
</form>
