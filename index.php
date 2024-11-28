<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD Siswa</title>
</head>
<body>
    <h1>Data Siswa</h1>
    <a href="tambah.php">Tambah Siswa</a>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Gambar</th>
            <th>Aksi</th>
        </tr>
        <?php
        $no = 0;
        
        $result = mysqli_query($conn, "SELECT * FROM siswa");
        while ($row = mysqli_fetch_assoc($result)) {
            $no++;
            echo "<tr>
                <td>  $no </td>
                <td>{$row['nama']}</td>
                <td>{$row['kelas']}</td>
                <td><img src='uploads/{$row['gambar']}' width='50'></td>
                <td>
                    <a href='edit.php?id={$row['id']}'>Edit</a>
                    <a href='hapus.php?id={$row['id']}' onclick='return confirm(\"Yakin?\")'>Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
