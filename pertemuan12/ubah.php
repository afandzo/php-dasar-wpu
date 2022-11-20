<?php
require "db.php";

//ambil data di url
$id = $_GET['id'];
//query data wisata berdasarkan id
$wst = query("SELECT * FROM wisata WHERE id = $id")[0];
// var_dump($wst['nama_wisata']);

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {
  //cek apakah data berhasil ditambahkan atau tidak
  if (ubahDataWisata($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil diubah!');
      document.location.href='index.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('data gagal diubah!');
      document.location.href='index.php';
    </script>
    ";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Halaman Update</title>
</head>

<body>
  <h1>Update Data Wisata</h1>

  <form action="" method="post">
    <input type="hidden" name="id" value="<?= $wst['id'] ?>">
    <ul>
      <li>
        <label for="nama">Nama Wisata :</label>
        <input type="text" name="nama_wisata" id="nama" required value="<?= $wst['nama_wisata'] ?>">
      </li>
      <li>
        <label for="lokasi">Lokasi :</label>
        <input type="text" name="lokasi" id="lokasi" required value="<?= $wst['lokasi'] ?>">
      </li>
      <li>
        <label for="harga">Harga :</label>
        <input type="text" name="harga_tiket" id="harga" required value="<?= $wst['harga_tiket'] ?>">
      </li>
      <li>
        <label for="gambar">Gambar :</label>
        <input type="text" name="gambar" id="gambar" required value="<?= $wst['gambar'] ?>">
      </li>
      <li>
        <button type="submit" name="submit">Updaet Data</button>
      </li>
    </ul>
  </form>
</body>

</html>