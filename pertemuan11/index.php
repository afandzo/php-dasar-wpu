<?php
require "db.php";
$wisata = query("SELECT * FROM wisata")
// $queryUser = "SELECT * FROM user";
// $execUser = mysqli_query($conn, $queryUser);
// $dataUser = mysqli_fetch_all($execUser, MYSQLI_ASSOC);
// var_dump($dataUser);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Admin</title>
</head>

<body>
  <center>
    <h1>Daftar Wisata</h1>



    <table border="1" cellpadding="10" cellspacing="0">
      <a href="tambah.php">TAMBAH DATA</a>
      <br><br><br><br>
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Wisata</th>
          <th scope="col">Lokasi</th>
          <th scope="col">Harga Tiket</th>
          <th scope="col">Foto</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0 ?>
        <?php foreach ($wisata as $wst) : ?>
          <?php $no++ ?>
          <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $wst['nama_wisata'] ?></td>
            <td><?= $wst['lokasi'] ?></td>
            <td><?= $wst['harga_tiket'] ?></td>
            <td><img src="gambar/<?= $wst['gambar'] ?>" width="100"></td>
            <td>
              <a href="ubah.php?id=<?= $wst['id'] ?>">UPDATE</a> |
              <a href="hapus.php?id=<?= $wst['id'] ?>" onclick="return confirm('apakah anda akan menghapus data ini?')">DELETE</a>

            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </center>





</body>

</html>