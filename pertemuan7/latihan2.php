<?php
//cek apakah ada data di $_GET
if (
  !isset($_GET["nama"]) ||
  !isset($_GET["nis"]) ||
  !isset($_GET["jurusan"]) ||
  !isset($_GET["absen"])
) {
  //redirect
  header("Location: latihan1.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Detail Siswa</title>
</head>

<body>
  <ul>
    <li>Nama : <?= $_GET["nama"]; ?></li>
    <li>NIS : <?= $_GET["nis"]; ?></li>
    <li>Jurusan : <?= $_GET["jurusan"]; ?></li>
    <li>No. Absen : <?= $_GET["absen"]; ?></li>
  </ul>
  <a href="latihan1.php">Kembali</a>
</body>

</html>