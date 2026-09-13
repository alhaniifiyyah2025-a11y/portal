<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard - Aplikasi Pendaftaran Santri</title>

    <link rel="icon" type="image/png" href="../assets/img/lg_ds.png">

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!--ini header-->
<?php
include("../config/auto_load.php");
include("laporan_control.php");
include("../layout/header_admin.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Laporan Pendaftaran</h1>
  
  <a href="<?= $base_url ?>/cetak/data_pendaftar.php" class="btn btn-warning btn-sm mb-3" target="_blank">Cetak Data Pendaftar PDF</a> 
  <a href="<?= $base_url ?>/cetak/data_excel.php" class="btn btn-success btn-sm mb-3" target="_blank">Cetak Data Pendaftar EXCEL</a> 

  <div class="row">
    <div class="col-md-12">
      <table class="table table-bordered table-hover">
        <tr role="row" class="odd">
            <td class="sorting_1">No</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>Asal Sekolah</td>
            <td>Jenis Program</td>
            <td>Status Pendaftaran</td>
            <td>Status Pembayaran</td>
            <td>Actions</td>
        </tr>

        <?php
        $no = 1;
        while($p = mysqli_fetch_array($all_pendaftar)) { ?>

        <tr role="row" class="odd">
            <td class="sorting_1"><?= $no++ ?></td>
            <td><?= $p['nama'] ?></td>
            <td><?= $p['jk'] ?></td>
            <td><?= $p['alamat'] ?></td>
            <td><?= $p['asal_sekolah'] ?></td>
            <td><?= $p['jenis_program'] ?></td>
            <?php
                if($p['status_pendaftar'] == 0) {
                    $status = '<span class="badge badge-info">BARU</span>';

                } else if ($p['status_pendaftar'] == 1) {
                    $status = '<span class="badge badge-success">DITERIMA</span>';

                } else if ($p['status_pendaftar'] == 2) {
                    $status = '<span class="badge badge-danger">DITOLAK</span>';
                }
            ?>
            <td><?= $status ?></td>
            <?php
                if($p['status_pembayaran'] == 1) {
                    $status_bayar = '<span class="badge badge-info">ADA BUKTI</span>';

                } else if ($p['status_pembayaran'] == 2) {
                    $status_bayar = '<span class="badge badge-success">LUNAS</span>';

                } else if ($p['status_pembayaran'] == 3) {
                    $status_bayar = '<span class="badge badge-danger">BELUM LUNAS</span>';

                } else {
                    $status_bayar = '<span class="badge badge-warning">BELUM ADA BUKTI</span>';
                }
                                                
            ?>
            <td><?= $status_bayar ?></td>
            
            <td>
                <a href="<?= $base_url ?>/cetak/detail_cetak.php?id=<?= $p['id'] ?>" class="btn btn-warning btn-sm" target="_blank">Cetak</a> 
            </td>
        </tr>

        <?php }
        
        
        if(mysqli_num_rows($all_pendaftar) == 0) {
          echo "<tr><td colspan='8' align='center'><b>Belum Ada pendaftar baru</b></td></tr>";
        }

        ?>

      </table>
    </div>
  </div>
</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<?php
include("../layout/footer.php");

?>
<!-- plugins -->
<script src="../assets/vendor/chart.js/Chart.min.js"></script>
<script src="../assets/js/demo/chart-area-demo.js"></script>
<script src="../assets/js/demo/chart-pie-demo.js"></script>

</body>

</html>