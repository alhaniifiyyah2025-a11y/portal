<?php

// tabel pendaftar
$all_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar");

// cek hasil
if(!$all_pendaftar) {
    die('Query Error : '. mysqli_error($conn));
}

if(isset($_GET['action']) && $_GET['action'] == "hapus") {
    $id_pendaftar = $_GET['id'];
    $query_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar where id = '$id_pendaftar'");

    if(mysqli_num_rows($query_pendaftar)){

        $data_pendaftar = mysqli_fetch_array($query_pendaftar);
        $id_user = $data_pendaftar['users_id'];

        // hapus detail
        $sql_hapus_detail = mysqli_query($conn," DELETE FROM detail_pendaftar where users_id = '$id_pendaftar'");

        // hapus foto pendaftar
        unlink('../uploads/'. $data_pendaftar['foto']);
        unlink('../uploads/'. $data_pendaftar['upload_kk']);
        unlink('../uploads/'. $data_pendaftar['upload_bukti']);
        $sql_hapus_pendaftar = mysqli_query($conn," DELETE FROM pendaftar where id = '$id_pendaftar'");

        // hapus akun
        $sql_hapus_user = mysqli_query($conn," DELETE FROM users where id = '$id_user'");

        if(!$sql_hapus_nilai || !$sql_hapus_pendaftar || !$sql_hapus_user) {
            die('Query Error: '. mysqli_error($conn));
        }

        // simpan session
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        // header('location:pendaftaran.php');

    } else {
        die('Data pendaftar tidak ditemukan!');
    }
}
?>