<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($conn));
}


?>