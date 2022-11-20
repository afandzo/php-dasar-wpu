<?php require "db.php";
$id = $_GET["id"];

if (hapusDataWisata($id) > 0) {
  echo "
    <script>
      alert('data berhasil dihapus!');
      document.location.href='index.php';
    </script>
    ";
} else {
  echo "
    <script>
      alert('data gagal dihapus!');
      document.location.href='index.php';
    </script>
    ";
}
