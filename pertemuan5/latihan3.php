<?php
$siswa = [
  ["Gilang", "8081", "RPL", "21"],
  ["Afandi", "8082", "RPL", "22"],
  ["Muhammad", "8083", "RPL", "23"],
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
  <h1>Daftar Siswa</h1>

  <?php foreach ($siswa as $sws) : ?>
    <ul>
      <li>Nama : <?= $sws[0]; ?></li>
      <li>NIS : <?= $sws[1]; ?></li>
      <li>Jurusan : <?= $sws[2]; ?></li>
      <li>No. Absen : <?= $sws[3]; ?></li>
    </ul>
  <?php endforeach; ?>
</body>

</html>