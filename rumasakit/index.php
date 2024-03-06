<?php
include "koneksi.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Halaman Utama</title>

  <!-- Bootstrap CSS -->
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous"> -->
  <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <section class="row">
    <div class="col-md-6 offset-md-3 align-self-center">
      <h1 class="text-center">Form Pasien</h1>
      <a href="tambah.php" class="btn btn-primary mb-2">Tambah</a>
      <table class="table table-striped table-bordered">
        <thead>
          <tr>
            <th scope="col">No RM</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">No Telpon</th>
            <th scope="col">NIK</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <?php
        $no = 1;
        $query = "SELECT * FROM pasien";
        $result = mysqli_query($koneksi, $query);
        ?>
        <tbody>
          <?php
          foreach ($result as $data) {
            echo "
                <tr>
                  <td>" . $data["norm"] . "</td>
                  <td>" . $data["nama"] . "</td>
                  <td>" . $data["alamat"] . "</td>
                  <td>" . $data["telp"] . "</td>
                  <td>" . $data["nik"] . "</td>
                  <td> 
                    <a href='update.php?id=" . $data["id"] . "' type='button' class='btn btn-success'>Update</a>
                    <a href='delete.php?id=" . $data["id"] . "' type='button' class='btn btn-danger' onlick='return confirm('Yakin ingin menghapus data?')'>Delete</a>
                  </td>
                </tr>  
              ";
          }
          ?>
        </tbody>
      </table>
    </div>
  </section>
</body>

</html>