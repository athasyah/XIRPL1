<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Siswa</title>
</head>
<body>
    <h1>Edit Siswa</h1>
    <?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Nama:</label><br>
        <input type="text" name="nama" value="<?= $row['nama']; ?>" required><br>
        <label>Kelas:</label><br>
        <input type="text" name="kelas" value="<?= $row['kelas']; ?>" required><br>
        <label>Gambar Lama:</label><br>
        <img src="uploads/<?= $row['gambar']; ?>" width="50"><br>
        <label>Gambar Baru (Opsional):</label><br>
        <input type="file" name="gambar"><br><br>
        <button type="submit" name="submit">Update</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];

        if ($_FILES['gambar']['name']) {
            $gambar = $_FILES['gambar']['name'];
            $tmp_name = $_FILES['gambar']['tmp_name'];
            $upload_dir = 'uploads/';
            move_uploaded_file($tmp_name, $upload_dir . $gambar);

            // Hapus Gambar Lama
            unlink($upload_dir . $row['gambar']);
        } else {
            $gambar = $row['gambar'];
        }

        mysqli_query($conn, "UPDATE siswa SET nama = '$nama', kelas = '$kelas', gambar = '$gambar' WHERE id = $id");
        header("Location: index.php");
    }
    ?>
</body>
</html>
