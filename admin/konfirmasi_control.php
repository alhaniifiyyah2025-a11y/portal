<?php

require_once("../config/auto_load.php");
// tabel pendaftar
$all_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($conn));
}
// ubah status pendaftar
if(isset($_GET['action']) && $_GET['action'] == 'konfirmasi') {

    $id_pendaftar = $_GET['id'];
    $query_status = mysqli_query($conn, "SELECT * FROM pendaftar where id = '$id_pendaftar'");

    if(mysqli_num_rows($query_status)){

        $data_pendaftar = mysqli_fetch_array($query_status);
        $id_user = $data_pendaftar['users_id'];
        $sql_status = " UPDATE pendaftar set status_pendaftar= '1' where users_id='$id_user'";
        $query_status = mysqli_query($conn,$sql_status);
        // berhasil
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        header('location:konfirmasi.php');
    } else {
        echo "Gagal Update status pendaftar"; die;
    }
}
if(isset($_POST['action']) && $_POST['action'] == 'tolak') {

    $id_pendaftar = $_GET['id'];
    $query_status = mysqli_query($conn, "SELECT * FROM pendaftar where id = '$id_pendaftar'");

    if(mysqli_num_rows($query_status)){

        $data_pendaftar = mysqli_fetch_array($query_status);
        $id_user = $data_pendaftar['users_id'];
        $sql_status = " UPDATE pendaftar set status_pendaftar= '2' where users_id='$id_user'";
        $query_status = mysqli_query($conn,$sql_status);
        // berhasil
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        header('location:konfirmasi.php');
    } else {
        echo "Gagal Update status pendaftar"; die;
    }
}

?>