<?php
include 'koneksi.php';
$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT gambar FROM siswa WHERE id = $id");
$row = mysqli_fetch_assoc($result);

// Hapus File Gambar
unlink('uploads/' . $row['gambar']);

mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");
header("Location: index.php");
?>
