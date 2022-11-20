<?php
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
  <title>GET</title>
</head>

<body>
  <?php foreach ($siswa as $sws) : ?>
    <ul>
      <a href="latihan2.php?nama=<?= $sws["nama"]; ?>&nis=<?= $sws["nis"] ?>&jurusan=<?= $sws["jurusan"] ?>&absen=<?= $sws["absen"] ?>">
        <li>Nama : <?= $sws["nama"]; ?></li>
      </a>
    </ul>
  <?php endforeach; ?>

</body>

</html>