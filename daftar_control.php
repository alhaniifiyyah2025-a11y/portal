<?php

include('config/koneksi.php');
session_start();

if(isset($_POST['btn_registrasi'])) {
    // print_r($_POST);
    $nama = filter_input(INPUT_POST, 'nama', FILTER_SANITIZE_STRING);
    $tempat_lahir = filter_input(INPUT_POST, 'tempat_lahir', FILTER_SANITIZE_STRING);
    $tanggal_lahir = date("Y-m-d", strtotime($_POST['tanggal_lahir']));
    $jk = $_POST['jenis_kelamin'];
    $jenis_program = filter_input(INPUT_POST, 'jenis_program', FILTER_SANITIZE_STRING);
    $alamat = filter_input(INPUT_POST, 'alamat', FILTER_SANITIZE_STRING);
    $anak_ke = filter_input(INPUT_POST, 'anak_ke', FILTER_SANITIZE_STRING);
    $jml_saudara = filter_input(INPUT_POST, 'jml_saudara', FILTER_SANITIZE_STRING);
    $asal_sekolah = filter_input(INPUT_POST, 'asal_sekolah', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $telepon = $_POST['telepon'];
    $userpass = $_POST["password"];
    $ulangi_password = $_POST["ulangi_password"];
    $password = password_hash($userpass, PASSWORD_DEFAULT);

    if($userpass != $ulangi_password) {
        echo "Error: Password tidak sama";
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }

    // Insert tabel user
    $sql_user = "INSERT INTO users (nama, username, password, level) values ('$nama', '$email', '$password', 'santri')";
    $result_user = mysqli_query($conn, $sql_user);

    if($result_user){
        $data_user = mysqli_query($conn, "SELECT LAST_INSERT_ID()");
        $date_regis	= date("Y-m-d");
        while($u = mysqli_fetch_array($data_user)){
            $id_user = $u[0];
        }

        // insert table pendaftar
        $sql_pendaftar	= "INSERT INTO pendaftar(id,nama, tmpt_lahir, tgl_lahir, alamat, jk, anak_ke
                           , jml_saudara, asal_sekolah, jenis_program, telepon, foto, users_id, email
                           , status_pendaftar, status_pembayaran, upload_kk, upload_bukti) 
                           VALUES('$id_user','$nama', '$tempat_lahir', '$tanggal_lahir', '$alamat' 
                           , '$jk', '$anak_ke', '$jml_saudara', '$asal_sekolah'
                           , '$jenis_program', '$telepon','','$id_user','$email','0','0','','');";
        $sql_pendaftar .= "INSERT INTO detail_pendaftar(users_id,tanggal_daftar) VALUES('$id_user', '$date_regis')";
        $result_pendaftar = mysqli_multi_query($conn, $sql_pendaftar);

        if($result_pendaftar){
            // jika berhasil
            $_SESSION['pesan_registrasi'] = "Registrasi Berhasil, Login Menggunakan Email dan Password anda!";

            header('location:login.php');

        } else {
            // jika query pendaftar gagal
            echo "Error insert pendaftar ". mysqli_error($conn);
            echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
            die;
        }


    } else {
        // jika query users gagal
        echo "Error insert users: ". mysqli_error($conn);
        echo "<br><br> <button type='button' onclick='history.back();'> Kembali </button>";
        die;
    }

} else {
    header('location:registrasi.php');
}

?>