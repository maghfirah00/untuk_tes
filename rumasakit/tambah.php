<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Tambah data</title>

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center">
      <h1 class="text-center">Form Pasien</h1>
      <a href="index.php" type="button" class="btn btn-info text-white">Kembali</a>
      <form method="POST" id="myFormId">
        <div class="mb-3">
          <label for="inputNorm" class="form-label">No RM</label>
          <input type="text" class="form-control" id="inputNorm" name="norm">
        </div>
        <div class="mb-3">
          <label for="inputNama" class="form-label">Nama</label>
          <input type="text" class="form-control" id="inputNama" name="nama">
        </div>
        <div class="mb-3">
          <label for="inputAlamat" class="form-label">Alamat</label>
          <input type="text" class="form-control" id="inputAlamat" name="alamat">
        </div>
        <div class="mb-3">
          <label for="inputTelp" class="form-label">No Telpon</label>
          <input type="text" class="form-control" id="inputTelp" name="telp">
        </div>
        <div class="mb-3">
          <label for="inputNik" class="form-label">NIK</label>
          <input type="text" class="form-control" id="inputNik" name="nik">
        </div>
        <input name="reset" type="reset" class="btn btn-primary" value="Batal" onclick="resetForm('myFormId'); return false;" />
        <input name="daftar" type="submit" class="btn btn-primary" value="Simpan">
        <a href="index.php" type="button" class="btn btn-primary">Bridging</a>
      </form>
    </div>
  </section>

  <?php

  if (isset($_POST['daftar'])) {
    $norm = $_POST['norm'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $telp = $_POST['telp'];
    $nik = $_POST['nik'];

    $query = "INSERT INTO pasien (norm, nama, alamat, telp, nik) VALUES('" . $norm . "', '" . $nama . "', '" . $alamat . "','" . $telp . "','" . $nik . "')";

    $result = mysqli_query($koneksi, $query);

    if ($result) {
      header("location: index.php");
    } else {
      echo "<script>alert('Data Gagal di tambahkan!')</script>";
    }
  }

  ?>

  <script type="text/javascript">
    function resetForm(myFormId) {
      var myForm = document.getElementById(myFormId);

      for (var i = 0; i < myForm.elements.length; i++) {
        if ('submit' != myForm.elements[i].type && 'reset' != myForm.elements[i].type) {
          myForm.elements[i].checked = false;
          myForm.elements[i].value = '';
          myForm.elements[i].selectedIndex = 0;
        }
      }
    }
  </script>
</body>

</html>