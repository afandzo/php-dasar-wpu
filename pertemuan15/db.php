<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'phpdasar');

function query($query)
{
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}



//Fungsi tambah data wisata
function tambahDataWisata($data)
{
  global $conn;
  $nama = htmlspecialchars($data["nama_wisata"]);
  $lokasi = htmlspecialchars($data["lokasi"]);
  $harga = htmlspecialchars($data["harga_tiket"]);
  // $gambar = htmlspecialchars($data["gambar"]);

  //upload gambar 
  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO wisata VALUE ('','$nama','$lokasi','$harga','$gambar')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function upload()
{
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang dihapus
  if ($error === 4) {
    echo
    "<script>
      alert('pilih gambar terlebih dahulu!');
    </script>";
    return false;
  }

  //cek apakah file yang diupload gambar atau bukan
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo
    "<script>
      alert('yang anda upload bukan gambar!');
    </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile > 1000000) {
    echo
    "<script>
      alert('ukuran gambar terlalu besar!');
    </script>";
    return false;
  }

  //lolos pengecekan, gambar siap diupload
  //generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  move_uploaded_file($tmpName, 'gambar/' . $namaFileBaru);

  return $namaFileBaru;
}




//fungsi hapus data wisata
function hapusDataWisata($id)
{
  global $conn;
  mysqli_query($conn, " DELETE FROM wisata WHERE id = $id");

  return mysqli_affected_rows(($conn));
}


//fungsi update data wisata
function ubahDataWisata($data)
{
  global $conn;
  $id = $data["id"];
  $nama = htmlspecialchars($data["nama_wisata"]);
  $lokasi = htmlspecialchars($data["lokasi"]);
  $harga = htmlspecialchars($data["harga_tiket"]);
  $gambarLama = htmlspecialchars($data["gambarLama"]);

  //cek apakah user memilih gambar baru atau tidak
  if ($_FILES['gambar']['error'] === 4) {
    $gambar = $gambarLama;
  } else {
    $gambar = upload();
  }



  $query = "UPDATE wisata SET nama_wisata = '$nama', lokasi = '$lokasi', harga_tiket = '$harga', gambar = '$gambar' WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


//fungsi searching data
function cari($keyword)
{
  $query = "SELECT * FROM wisata WHERE nama_wisata LIKE '%$keyword%' OR lokasi LIKE '%$keyword%' OR harga_tiket LIKE '%$keyword%' ";
  return query($query);
}



//fungsi registrasi
function register($data)
{
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn, $data["password"]);
  $password2 = mysqli_real_escape_string($conn, $data["password2"]);

  //cek username sudah ada atau belum
  $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
  if (mysqli_fetch_assoc($result)) {
    echo "
    <script>
      alert('username sudah terdaftar!');
    </script>
    ";
    return false;
  }

  //cek konfirmasi password
  if ($password !== $password2) {
    echo "
    <script>
      alert('konfirmasi password tidak sesuai!');
    </script>
    ";
    return false;
  }

  //enkripsi password
  $password = password_hash($password, PASSWORD_DEFAULT);

  //tambahkan user baru ke database
  mysqli_query($conn, "INSERT INTO user VALUE('','$username','$password')");

  return mysqli_affected_rows($conn);
}
