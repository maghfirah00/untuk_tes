<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }
</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Data mahasiswa</h1>
    <a href="tambah.php">Tambah data</a>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NIS</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Jenis Kelamin</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <?php
        $no = 1;
        $query = "SELECT * FROM tb_siswa";
        $result = mysqli_query($koneksi, $query);
        ?>
        <tbody>
            <?php
            foreach ($result as $data) {
                echo "
                <tr>
                <td>" . $no++ . "</td>
                <td>" . $data['nis'] . "</td>
                <td>" . $data['nama'] . "</td>
                <td>" . $data['kelas'] . "</td>
                <td>" . $data['jkel'] . "</td>
                <td>
                <a href='update.php?id=" . $data['id'] . "'>Edit</a>
                <a href='delete.php?id=" . $data['id'] . "' onlick='return confirm('Yakin ingin menghapus data?')'>Hapus</a>
                </td>
                </tr>
                ";
            }
            ?>
        </tbody>
    </table>
</body>

</html>