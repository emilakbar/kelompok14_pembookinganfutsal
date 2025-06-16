<?php
include 'koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM booking WHERE id='$id'");

header("Location: list_booking.php");
exit;
