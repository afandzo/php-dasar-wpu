<?php
require "db.php";

if (isset($_POST["register"])) {
  if (register($_POST) > 0) {
    echo "
    <script>
      alert('user baru berhasil dibuat!');
    </script>
    ";
  } else {
    echo mysqli_error($conn);
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    label {
      display: block;
    }
  </style>
  <title>Halama Registrasi</title>
</head>

<body>
  <h1>Halaman Registrasi</h1>

  <form action="" method="post">
    <ul>
      <li>
        <label for="username">Username :</label>
        <input type="text" name="username" id="username" required>
      </li>
      <li>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password" required>
      </li>
      <li>
        <label for="password2">Konfirmasi Password :</label>
        <input type="password" name="password2" id="password2" required>
      </li>
      <li>
        <button type="submit" name="register">Register</button>
      </li>
    </ul>
  </form>
</body>

</html>