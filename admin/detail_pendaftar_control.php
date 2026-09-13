<?php
$id_user = $_SESSION['id'];
$sql_pendaftar = "SELECT * FROM pendaftar JOIN detail_pendaftar where pendaftar.users_id = '$id_user'";
$result_pendaftar = mysqli_query($conn, $sql_pendaftar);

// cek hasil
if(!$result_pendaftar) {
    die('Query Error : '. mysqli_error($conn));
}

// ubah status nilai
if(isset($_POST['simpan']) && $_POST['simpan'] == 'simpan_nilai') {

    $status = $_POST['nilai'];

    $sql_status = "UPDATE pendaftar set status_pendaftar='$status' where users_id='$id_user'";
    $query_status = mysqli_query($conn,$sql_status);

    if($query_status) {
        // berhasil
        $_SESSION['pesan_sukses'] = "Status Pendaftar berhasil diubah";
        header('location:pendaftaran.php');
    } else {
        echo "Gagal Update status pendaftar"; die;
    }
}

?>