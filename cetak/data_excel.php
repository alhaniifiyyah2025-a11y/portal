<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data pendaftaran.xls");

include('../config/koneksi.php');

// tabel pendaftar
$all_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar order by id desc");

$html = '
<style>
table, th, td {
    font-size: 12px;
    border: 0.5px solid black;
    border-collapse: collapse;
    padding: 5px;
}
</style>

<img src="../assets/img/lg_ds.png" style="float: left; height: 60px">

<div style="margin-left: 20px">
    <div style="font-size: 18px">Data Pendaftaran Siswa Baru | TAHUN 2020</div>
    <div style="font-size:20px">PONDOK PESANTREN PUTRA-PUTRI ”DARUSSALAM” DUKUHWALUH – PURWOKERTO</div>
    <div style="font-size: 12px">Jl. Sunan Bonang RT 03 RW 06 No. 37, Dukuhwaluh, Kec. Kembaran, Kab. Banyumas, 53182</div>
</div>

<hr>

<div style="font-size: 12px; margin-left: 10px;">&nbsp; Tanggal CETAK: '. date("d-m-Y") .'</div>

<table width="100%" border="1">
<tr>
    <th width="5%">No</th>
    <th width="13%">Nama</th>
    <th width="20%">TTL</th>
    <th width="5%">JK</th>
    <th>Jenis Program</th>
    <th>Alamat</th>
    <th width="7%">Telepon</th>
    <th width="5%">Nilai</th>
    <th width="10%">Status Pendaftaran</th>
    <th width="10%">Status Pembayaran</th>
</tr>';

$no = 1;
while($p = mysqli_fetch_array($all_pendaftar)) { 
    if($p['status_pendaftar'] == 0) {
        $status_daftar = "Baru";
    } else if($p['status_pendaftar'] == 1) {
        $status = "Diterima";
    } else {
        $status = "Ditolak";
    }

    if($p['status_pembayaran'] == 1) {
        $status_pembayaran = "Lunas";
    } else if($p['status_pembayaran'] == 2) {
        $status_pembayaran = "Kurang";
    } else {
        $status_pembayaran = "Belum Ada";
    }

    $html .= '
    <tr>
        <td align="center">'. $no++ . '</td>
        <td>'. $p['nama'] . '</td>
        <td>'. $p['tmpt_lahir'] . ', '. $p['tgl_lahir'] . '</td>
        <td align="center">'. $p['jk'] . '</td>
        <td>'. $p['jenis_program'] . '</td>
        <td>'. $p['alamat'] . '</td>
        <td>'. $p['telepon'] . '</td>
        <td align="center">'. $status_daftar . '</td>
        <td align="center">'. $status_pembayaran . '</td>
    </tr>';

}

$html .= '
</table>';

echo $html;


?>