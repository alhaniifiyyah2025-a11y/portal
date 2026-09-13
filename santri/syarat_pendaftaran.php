<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard - Aplikasi Pendaftaran Santri</title>

  <link rel="icon" type="image/png" href="assets/img/lg_ds.png">

  <!-- Custom fonts for this template-->
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<!--ini header-->
<?php
include("../config/auto_load.php");
include("../layout/header.php");
?>

<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-12 text-gray-800">Dashboard</h1>
  <div class="row">
    <div class="col-md-6">
      <div class="row">
        <!-- Card Syarat -->
            <div class="col-md-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Persyaratan Pendaftaran</h6>
                    </div>
                    <div class="card-body">
                        <p>Berikut adalah syarat pendaftaran santri baru yang harus dipenuhi :</p>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Mengisi Formulir Pendaftaran 
                            <a href="editprofil.php" class="fas fa-upload "></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Fotocopy Kartu Keluarga
                            <span class="badge badge-info badge-pill">1 Lembar</span>
                            <a href="upload_kk.php" class="fas fa-upload "></a>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                            Foto Resmi 3 x 4
                            <a href="editprofil.php" class="fas fa-upload "></a>
                            </li>
                        </ul>
                        <p class="text-danger mt-3">*Catatan : Tunggu konfirmasi admin paling lambat dua hari kerja untuk verifikasi file.</p>
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->
  </div>
</div>
<!-- End of Main Content -->

<?php
include("../layout/footer.php");
?>

</body>

</html>