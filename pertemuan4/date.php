<?php
// ====DATE====
// echo date("l");
// echo date("d");
// echo date("M");
// echo date("m"); //bulan dalam  bentuk angka
// echo date("l, d-M-Y");

// ====TIME====
// UNIX Timestamp / EPOCH time //detik yang sudah berlalu sejak 1 januari 1970
// echo time();
// echo date("l", time() + 60 * 60 * 24 * 100); //kedepan
// echo date("l", time() - 60 * 60 * 24 * 100); //kebelakang
// echo date("d M Y", time() - 60 * 60 * 24 * 100);


// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// echo date("l", mktime(0, 0, 0, 4, 3, 2006));


// trstotime
echo date("l", strtotime("3 april 2006"));
