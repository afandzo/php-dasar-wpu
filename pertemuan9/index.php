<?php
require "db.php";
$dataUser = query("SELECT * FROM user")
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
  <title>Halaman Login</title>
</head>

<body>
  <h1>Daftar Siswa</h1>

  <table border="1" cellpadding="10" cellspacing="0">
    <tr>
      <th>No.</th>
      <th>Aksi</th>
      <th>Nama</th>
      <th>Username</th>
      <th>Password</th>
      <th>Role</th>
    </tr>
    <?php $no = 0 ?>
    <?php foreach ($dataUser as $user) : ?>
      <?php $no++ ?>
      <tr>
        <td><?= $no ?></td>
        <td>
          <a href="">Edit</a> | <a href="">Delete</a>
        </td>
        <td><?= $user['nama'] ?></td>
        <td><?= $user['username'] ?></td>
        <td><?= $user['password'] ?></td>
        <td><?= $user['role'] ?></td>


      </tr>
    <?php endforeach; ?>
  </table>
</body>

</html>