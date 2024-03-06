<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Update data</title>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

</head>

<body>

  <?php

  $id = $_GET['id'];

  $query = "SELECT * FROM pasien WHERE id = $id";
  $result = mysqli_query($koneksi, $query);
  foreach ($result as $data) {
  ?>

    <section class="row">
      <div class="col-md-6 offset-md-3 align-self-center">
        <h1 class="text-center mt-4">Form Update Pasien</h1>
        <form method="POST">
          <input type="hidden" value="<?= $data['id'] ?>" name="id">
          <div class="mb-3">
            <label for="inputNorm" class="form-label">No RM</label>
            <input type="text" class="form-control" id="inputNorm" name="norm" value="<?= $data['norm'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputNama" class="form-label">Nama</label>
            <input type="text" class="form-control" id="inputNama" name="nama" value="<?= $data['nama'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputAlamat" class="form-label">Alamat</label>
            <input type="text" class="form-control" id="inputAlamat" name="alamat" value="<?= $data['alamat'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputTelp" class="form-label">No Telpon</label>
            <input type="text" class="form-control" id="inputTelp" name="telp" value="<?= $data['telp'] ?>">
          </div>
          <div class="mb-3">
            <label for="inputNik" class="form-label">NIK</label>
            <input type="text" class="form-control" id="inputNik" name="nik" value="<?= $data['nik'] ?>">
          </div>
          <input name="daftar" type="submit" class="btn btn-primary" value="Update">
          <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
        </form>
      </div>
    </section>

  <?php } ?>

  <?php

  if (isset($_POST['daftar'])) {
    $id = $_POST['id'];
    $norm = $_POST['norm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $nik = $_POST['nik'];

    $query = "UPDATE pasien SET norm = '$norm', nama = '$nama', alamat = '$alamat', telp = '$telp', nik = '$nik' WHERE id = '$id'";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
      header("location: index.php");
    } else {
      echo "<script>alert('Data Gagal di update!')</script>";
    }
  }

  ?>

</body>

</html>