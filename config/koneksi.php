<?php

$host = "localhost";
$username = "root";
$password = "";
$database = "pendaftaran-santri";

$conn = mysqli_connect($host, $username, $password, $database);

if($conn->connect_error){
    echo "Koneksi database gagal: ". mysqli_connect_error();
    die;
} else {
    // echo "Koneksi database berhasil";
}

?>