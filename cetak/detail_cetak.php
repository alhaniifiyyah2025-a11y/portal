<?php

// Require composer autoload
include('../config/koneksi.php');
require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
$html = '<style>
table, th, td {
    font-size: 12px;
    border-collapse: collapse;
    padding: 5px;
}
.judul {
    margin-bottom: 0px;
    font-size:16px;
    font-weight: bold;
}
</style>

<img src="../assets/img/header.jpg" style="height: 75px;">

<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">

<div style="font-size: 12px; margin-left: 10px;">&nbsp; Tanggal CETAK: '. date("d-m-Y") .'</div>';

$id_pendaftar = $_GET['id'];

$sql_pendaftar = "SELECT * FROM pendaftar JOIN detail_pendaftar ON pendaftar.users_id = detail_pendaftar.users_id 
                  where pendaftar.users_id = '$id_pendaftar'";
$result_pendaftar = mysqli_query($conn, $sql_pendaftar);
$data_pendaftar = mysqli_fetch_array($result_pendaftar);

// cek hasil
if(!$result_pendaftar) {
    die('Query Error : '. mysqli_error($koneksi));
}


if($data_pendaftar['foto'] != '') {
    $gambar = '../uploads/' . $data_pendaftar['foto'];
} else {
    $gambar = '../assets/img/avatar.jpg';
}

if($data_pendaftar['upload_bukti'] != '') {
    $bukti = '../uploads/' . $data_pendaftar['foto'];
} else {
    $bukti = '../assets/img/avatar.jpg';
}

if($data_pendaftar['upload_kk'] != '') {
    $kk = '../uploads/' . $data_pendaftar['foto'];
} else {
    $kk = '../assets/img/avatar.jpg';
}

if($data_pendaftar['jk'] == 'L') {
    $kelamin = "Laki-Laki";
} else {
    $kelamin = "Perempuan";
}

if($data_pendaftar['status_pendaftar'] == 0) {
    $status = "Pendaftaran Belum Dinilai";
} else if($data_pendaftar['status_pendaftar'] == 1) {
    $status = "LOLOS PENDAFTARAN";
} else {
    $status = "TIDAK LOLOS PENDAFTARAN";
}

if($data_pendaftar['status_pembayaran'] == 1) {
    $status_pembayaran = "Lunas";
} else if($data_pendaftar['status_pembayaran'] == 2) {
    $status_pembayaran = "Kurang";
} else {
    $status_pembayaran = "Belum Ada";
}

$html .= '
<h3 class="judul">A. DETAIL PENDAFTAR</h3>
<table width="100%">
    <tr>
        <td width="18%">Nama</td>
        <td width="1%">:</td>
        <td width="60%">' . $data_pendaftar['nama'] . '</td>
        <td rowspan="7" align="right"><img src="'. $gambar .'" width="130px" height="150px"></td>
    </tr>
    <tr>
        <td>TTL</td>
        <td>:</td>
        <td>'. $data_pendaftar['tmpt_lahir'] .', '. $data_pendaftar['tgl_lahir'] .'</td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td>'. $kelamin .'</td>
    </tr>
    <tr>
        <td>Anak Ke</td>
        <td>:</td>
        <td>'. $data_pendaftar['anak_ke'] .' Dari '. $data_pendaftar['jml_saudara'] .' Saudara</td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td>'. $data_pendaftar['alamat'] .'</td>
    </tr>
    <tr>
        <td>Asal Sekolah</td>
        <td>:</td>
        <td>'. $data_pendaftar['asal_sekolah'] .'</td>
    </tr>
    <tr>
        <td>Program</td>
        <td>:</td>
        <td>'. $data_pendaftar['jenis_program'] .'</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>:</td>
        <td>'. $data_pendaftar['email'] .'</td>
    </tr>
    <tr>
        <td>Telepon</td>
        <td>:</td>
        <td>'. $data_pendaftar['telepon'] .'</td>
    </tr>
</table>

<h3 class="judul">B. Data Orang Tua</h3>
<table width="100%">
    <tr>
        <td width="5%">Nama Ayah</td>
        <td width="1%">:</td>
        <td width="60%">'. $data_pendaftar['nama_ayah'] .'</td>
    </tr>
    <tr>
        <td>TTL Ayah</td>
        <td>:</td>
        <td>'. $data_pendaftar['tempat_lahir_ayah'] .', '. $data_pendaftar['tanggal_lahir_ayah'] .'</td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir Ayah</td>
        <td>:</td>
        <td>'. $data_pendaftar['pendidikan_terakhir_ayah'] .'</td>
    </tr>
    <tr>
        <td>Pekerjaan Ayah</td>
        <td>:</td>
        <td>'. $data_pendaftar['pekerjaan_ayah'] .'</td>
    </tr>
    <tr>
        <td>Nama Ibu</td>
        <td>:</td>
        <td>'. $data_pendaftar['nama_ibu'] .'</td>
    </tr>
    <tr>
        <td>TTL Ibu</td>
        <td>:</td>
        <td>'. $data_pendaftar['tempat_lahir_ibu'] .', '. $data_pendaftar['tanggal_lahir_ibu'] .'</td>
    </tr>
    <tr>
        <td>Pendidikan Terakhir Ibu</td>
        <td>:</td>
        <td>'. $data_pendaftar['pendidikan_terakhir_ibu'] .'</td>
    </tr>
    <tr>
        <td>Pekerjaan Ibu</td>
        <td>:</td>
        <td>'. $data_pendaftar['pekerjaan_ibu'] .'</td>
    </tr>
    <tr>
        <td>Alamat Orang Tua</td>
        <td>:</td>
        <td>'. $data_pendaftar['alamat_ortu'] .'</td>
    </tr>
    <tr>
        <td>Telepon/WA Ortu</td>
        <td>:</td>
        <td>'. $data_pendaftar['telepon_ortu'] .'</td>
    </tr>
</table>
';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('data pendaftar.pdf', 'I');
?>

