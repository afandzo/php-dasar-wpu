<?php
include "db.php";

//cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])) {




  //cek apak(ah data berhasil ditambahkan atau tidak
  if (tambah($_POST) > 0) {
    echo "
    <script>
      alert('data berhasil ditambahkan!');
      document.location.href='index.php';
    </script>
    ";
  } else {
    echo "
    <script>
      alert('data gagal ditambahkan!');
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
  <title>Halaman Tambah</title>
</head>

<body>
  <h1>Tambabh Data Wisata</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="nama">Nama Wisata :</label>
        <input type="text" name="nama_wisata" id="nama" required>
      </li>
      <li>
        <label for="lokasi">Lokasi :</label>
        <input type="text" name="lokasi" id="lokasi" required>
      </li>
      <li>
        <label for="harga">Harga :</label>
        <input type="text" name="harga_tiket" id="harga" required>
      </li>
      <li>
        <label for="gambar">Gambar :</label>
        <input type="text" name="gambar" id="gambar" required>
      </li>
      <li>
        <button type="submit" name="submit">Tambah Data</button>
      </li>
    </ul>
  </form>
</body>

</html>