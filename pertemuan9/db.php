<?php

session_start();

$conn = mysqli_connect('localhost', 'root', '', 'laundry');

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
// if (!$conn) {
//   echo mysqli_connect_error();
//   exit;
// }
