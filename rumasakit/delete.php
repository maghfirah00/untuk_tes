<?php

include "koneksi.php";

$id = $_GET['id'];
$query = "DELETE FROM pasien WHERE id = $id";
$result = mysqli_query($koneksi, $query);
if ($result) {
  header("location: index.php");
}
