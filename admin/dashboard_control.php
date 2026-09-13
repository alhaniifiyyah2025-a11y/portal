<?php

// tabel pendaftar baru
$all_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar WHERE status_pendaftar = 0");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($conn));
}

// jml pendaftar
$jml_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar");

// cek hasil
if(!$jml_pendaftar) {
    die('Query Error : '. mysqli_error($conn));
}

// jml LOLOS
$jml_terima = mysqli_query($conn, "SELECT * FROM pendaftar WHERE status_pendaftar = 1");

// cek hasil
if(!$jml_terima) {
    die('Query Error : '. mysqli_error($conn));
}
// jml LOLOS
$jml_tolak = mysqli_query($conn, "SELECT * FROM pendaftar WHERE status_pendaftar = 2");

// cek hasil
if(!$jml_tolak) {
    die('Query Error : '. mysqli_error($conn));
}

?>