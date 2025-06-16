<?php
$koneksi = new mysqli("localhost", "root", "", "booking futsal");

$data = $koneksi->query("SELECT * FROM view_jumlah_booking_per_jam");

echo "<h2>Statistik Jumlah Booking per Jam</h2>";
echo "<table border='1'>
<tr><th>Jadwal</th><th>Jumlah Booking</th></tr>";

while($row = $data->fetch_assoc()) {
    echo "<tr>
        <td>{$row['jadwal_pembookingan']}</td>
        <td>{$row['jumlah_booking']}</td>
    </tr>";
}
echo "</table>";

// Menampilkan total booking lewat function
$total = $koneksi->query("SELECT total_booking() AS total")->fetch_assoc();
echo "<br>Total Booking: " . $total['total'];
?>
