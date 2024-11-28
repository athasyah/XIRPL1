<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Siswa</title>
</head>
<body>
    <h1>Tambah Siswa</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br>
        <label>Gambar:</label><br>
        <input type="file" name="gambar" required><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

        // Proses Upload Gambar
        $gambar = $_FILES['gambar']['name'];
        $tmp_name = $_FILES['gambar']['tmp_name'];
        $upload_dir = 'uploads/';
        move_uploaded_file($tmp_name, $upload_dir . $gambar);

        mysqli_query($conn, "INSERT INTO siswa (nama, kelas, gambar) VALUES ('$nama', '$kelas', '$gambar')");
        header("Location: index.php");
    }
    ?>
</body>
</html>
