<?php
// Array Associative
// definisinya sama seperti array numerik, kecuali
// key-nya asalah string yang kita buat sendiri
$siswa = [
  [
    "nama" => "Gilang",
    "nis" => "8081",
    "jurusan" => "RPL",
    "absen" => "21"
  ],
  [
    "nama" => "Afan",
    "nis" => "8082",
    "jurusan" => "RPL",
    "absen" => "22"
  ]
];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Siswa</title>
</head>

<body>
  <?php foreach ($siswa as $sws) : ?>
    <ul>
      <li>Nama : <?= $sws["nama"]; ?></li>
      <li>NIS : <?= $sws["nis"]; ?></li>
      <li>Jurusan : <?= $sws["jurusan"]; ?></li>
      <li>No. Absen : <?= $sws["absen"]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>