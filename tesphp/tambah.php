<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
</head>

<body>
    <h1>Tambah Data</h1>
    <form method="POST">
        <table>
            <tr>
                <td><label for="inputnis">NIS</label></td>
                <td><input type="number" id="inputnis" name="nis"></td>
            </tr>
            <tr>
                <td><label for="inputnama">Nama</label></td>
                <td><input type="text" id="inputnama" name="nama"></td>
            </tr>
            <tr>
                <td><label for="inputkelas">Kelas</label></td>
                <td><input type="text" id="inputkelas" name="kelas"></td>
            </tr>
            <tr>
                <td><label for="inputjkel">Jenis Kelamin</label></td>
                <td>
                    <select name="jkel" id="inputjkel" required>
                        <option value=""></option>
                        <option value="L">Laki-Laki</option>
                        <option value="P">Perempuan</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input name="daftar" type="submit" value="Simpan"></td>
                <td><a href="index.php">Kembali</a></td>
            </tr>
        </table>
    </form>

    <?php
    include "koneksi.php";

    if (isset($_POST['daftar'])) {
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jkel = $_POST['jkel'];

        $query = "INSERT INTO tb_siswa (nis,nama,kelas,jkel) VALUES('$nis','$nama','$kelas','$jkel')";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("location:index.php");
        } else {
            echo "<script>alert('Data gagal ditambahkan!')</script>";
        }
    }
    ?>

</body>

</html>