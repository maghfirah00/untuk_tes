<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>

<body>
    <?php
    $id = $_GET['id'];

    $query = "SELECT * FROM tb_siswa WHERE id= $id";

    $result = mysqli_query($koneksi, $query);
    foreach ($result as $data) {
    ?>
        <h1>Edit Data</h1>
        <form method="POST">
            <input type="hidden" value="<?= $data['id'] ?>" name="id">
            <table>
                <tr>
                    <td><label for="inputnis">NIS</label></td>
                    <td><input type="number" id="inputnis" name="nis" value="<?= $data['nis'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="inputnama">Nama</label></td>
                    <td><input type="text" id="inputnama" name="nama" value="<?= $data['nama'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="inputkelas">Kelas</label></td>
                    <td><input type="text" id="inputkelas" name="kelas" value="<?= $data['kelas'] ?>"></td>
                </tr>
                <tr>
                    <td><label for="inputjkel">Jenis Kelamin</label></td>
                    <td>
                        <select name="jkel" id="inputjkel" required>
                            <option value="" <?php if (!$data['jkel']) {
                                                    echo "selected";
                                                } ?>></option>
                            <option value="L" <?php if ($data['jkel'] == 'L') {
                                                    echo "selected";
                                                } ?>>Laki-Laki</option>
                            <option value="P" <?php if ($data['jkel'] == 'P') {
                                                    echo "selected";
                                                } ?>>Perempuan
                            </option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><input name="daftar" type="submit" value="Update"></td>
                    <td><a href="index.php">Kembali</a></td>
                </tr>
            </table>
        </form>

    <?php
    }

    if (isset($_POST['daftar'])) {
        $id = $_POST['id'];
        $nis = $_POST['nis'];
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $jkel = $_POST['jkel'];

        $query = "UPDATE tb_siswa SET nis='$nis', nama='$nama', kelas='$kelas', jkel='$jkel' WHERE id='$id'";

        $result = mysqli_query($koneksi, $query);

        if ($result) {
            header("location:index.php");
        } else {
            echo "
            <script>alert('Data gagal diupdate!')</script>
            ";
        }
    }
    ?>
</body>

</html>