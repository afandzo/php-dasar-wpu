<?php
require "db.php";

// cek cookie dulu
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
  $id = $_COOKIE['id'];
  $key = $_COOKIE['key'];

  //ambil username berdasarkan id nya
  $result = mysqli_query($conn, "SELECT username  FROM user WHERE id = $id");
  $row = mysqli_fetch_assoc($result);

  //cek cookie dan username
  if ($key === hash('sha256', $row['username'])) {
    $_SESSION['login'] = true;
  }
}

if (!isset($_SESSION["login"])) {
  header("Location:login.php");
  exit;
}

$wisata = query("SELECT * FROM wisata ORDER BY  id ASC");

//jika tombol cari ditekan
if (isset($_POST['cari'])) {
  $wisata = cari($_POST["keyword"]);
}
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
    <a href="logout.php">Logout</a>
    <h1>Daftar Wisata</h1>



    <table border="1" cellpadding="10" cellspacing="0">
      <a href="tambah.php">TAMBAH DATA</a>
      <br><br><br><br>


      <form action="" method="POST">

        <input type="text" name="keyword" size="35" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari">Cari</button>

      </form>

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