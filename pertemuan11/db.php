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
  $gambar = htmlspecialchars($data["gambar"]);

  $query = "INSERT INTO wisata VALUE ('','$nama','$lokasi','$harga','$gambar')";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
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
  $gambar = htmlspecialchars($data["gambar"]);

  $query = "UPDATE wisata SET nama_wisata = '$nama', lokasi = '$lokasi', harga_tiket = '$harga', gambar = '$gambar' WHERE id = $id";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}
