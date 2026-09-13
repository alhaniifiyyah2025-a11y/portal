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
include("dashboard_control.php");
include("../layout/header_admin.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-info text-uppercase mb-1">Pendaftar Masuk</div>
                            <div class="h7 mb-0 mr-3 font-weight-bold">
                                <?= mysqli_num_rows($jml_pendaftar) ?> Orang
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300" style="font-size:60px;"></i>
                        </div>
                    </div>
                </div>
            </div> 
        </div>

        <div class="col-md-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-success text-uppercase mb-1">Diterima</div>
                            <div class="h7 mb-0 mr-3 font-weight-bold">
                                <?= mysqli_num_rows($jml_terima) ?> Orang
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300" style="font-size:60px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-danger text-uppercase mb-1">Ditolak</div>
                            <div class="h7 mb-0 mr-3 font-weight-bold">
                                <?= mysqli_num_rows($jml_tolak) ?> Orang
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300" style="font-size:60px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 mt-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 font-weight-bold text-warning text-uppercase mb-1">Belum diverifikasi</div>
                            <div class="h7 mb-0 mr-3 font-weight-bold">
                                <?= mysqli_num_rows($all_pendaftar) ?> Orang
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300" style="font-size:60px;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <hr class="mt-3">
    <h3 class="text-gray-800">Data Pendaftar Baru</h3>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <table class="table table-bordered table-hover">
          <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Jenis Kelamin</td>
            <td>Alamat</td>
            <td>Asal Sekolah</td>
            <td>Jenis Program</td>
            <td>Status</td>
          </tr>

          <?php
          $no = 1;
          while($p = mysqli_fetch_array($all_pendaftar)) { ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $p['nama'] ?></td>
            <td><?= $p['jk'] ?></td>
            <td><?= $p['alamat'] ?></td>
            <td><?= $p['asal_sekolah'] ?></td>
            <td><?= $p['jenis_program'] ?></td>
            <td><span class="badge badge-info">BARU</span></td>
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