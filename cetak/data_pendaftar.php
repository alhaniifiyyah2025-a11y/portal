<?php

// Require composer autoload
include('../config/koneksi.php');
require_once '../vendor/autoload.php';
// Create an instance of the class:
$mpdf = new \Mpdf\Mpdf(['format' => 'A4']);
$html = '<style>
table, th, td {
    font-size: 12px;
    border: 1px solid black;
    border-collapse: collapse;
    padding: 5px;
}
</style>

<img src="../assets/img/header.jpg" style="height: 75px;">

<hr style="border: 0.5px solid black; margin: 10px 5px 10px 5px;">

<div style="font-size: 12px; margin-left: 10px;">&nbsp; Tanggal CETAK: '. date("d-m-Y") .'</div>

<table width="100%" border="1">
<tr>
    <th width="5%">No</th>
    <th width="13%">Nama</th>
    <th width="10%">TTL</th>
    <th width="5%">JK</th>
    <th width="10%">Jenis Program</th>
    <th width="15%">Alamat</th>
    <th width="8%">Telepon</th>
    <th width="12%">Status Pendaftaran</th>
    <th width="12%">Status Pembayaran</th>
</tr>';

$all_pendaftar = mysqli_query($conn, "SELECT * FROM pendaftar order by id desc");

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
        $status_bayar = "Lunas";
    } else if($p['status_pembayaran'] == 2) {
        $status_bayar = "Kurang";
    } else {
        $status_bayar = "Belum Ada";
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
        <td align="center">'. $status_bayar . '</td>
    </tr>';

}

$html .= '
</table>';
// Write some HTML code:
$mpdf->WriteHTML($html);

// Output a PDF file directly to the browser
$mpdf->Output('data pendaftar.pdf', 'I');
?>