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
include("dashboard_control.php");
include("../layout/header.php");
?>


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-12 text-gray-800">Dashboard</h1>
  <?php if(isset($_SESSION['pesan_sukses'])) { ?>

  <div class="alert alert-success">
    <?= $_SESSION['pesan_sukses'] ?>
  </div>

  <?php } 
  unset($_SESSION['pesan_sukses']);

  ?>
  <div class="row">
  
    <div class="col-md-6">
      <div class="row">
      <!-- Card Pengumuman -->
      <?php if(isset($status) && $status == 0) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Seleksi</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">Proses Penilaian</h5>
                    <div class="col-auto">
                      <i class="fas fa-spinner text-warning mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Terima kasih telah melakukan pendaftaran di Pondok Pesantren Darrusalam. Pengumuman pada tanggal: </p>
                    <span class="badge badge-danger" style="font-size: 20px;">5 Agustus 2020</span>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">PONDOK PESANTREN DARRUSALAM</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } else if(isset($status) && $status == 1) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Seleksi</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">ANDA LOLOS</h5>
                    <div class="col-auto">
                      <i class="far fa-check-circle text-success mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Selamat anda lolos seleksi di Pondok Pesantren Darrusalam. Silahkan lengkapi syarat pendaftaran dan pembayaran </p>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">PONDOK PESANTREN DARRUSALAM</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
        <?php } else if(isset($status) && $status == 2) { ?>
          <div class="col-md-12">
            <div class="card shadow mb-4">
              <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Pengumuman Hasil Seleksi</h6>
              </div>
              <div class="card-body">
                <div class="card text-center">
                  <div class="card-body">
                    <h5 class="card-title mb-3">ANDA TIDAK LOLOS</h5>
                    <div class="col-auto">
                      <i class="fa fa-times text-danger mb-3" style="font-size: 90px;"></i>
                    </div>
                    <p class="card-text">Anda Belum lolos. Terima kasih telah mengikuti seleksi dengan baik. </p>
                  </div>
                  <div class="card-footer text-muted">
                    <marquee style="margin-bottom: -5px;">PONDOK PESANTREN DARRUSALAM</marquee>
                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php } ?>

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

  <!-- Card Data Diri -->
  <div class="col-md-6">
      <div class="row">
        <div class="col-md-12">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
            </div>
            <div class="card-body">
              <div class="card-body">
                <div class="col-auto mt-3 text-center">
                  <?php
                  if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                    $foto = '../uploads/' . $data_pendaftar['foto'];
                  } else {
                    $foto = '../assets/img/avatar.jpg';
                  }
                  ?>
                  <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="menunggu" style="width: 200px; height: 200px;">
                </div>
                <br>
                <div class="text-right">
                    <a href="editprofil.php" class="btn btn-warning btn-sm">Edit Profil</a>
                    <a href="<?= $base_url ?>/cetak/detail_cetak.php?id=<?= $data_pendaftar['id'] ?>" class="btn btn-success btn-sm float-left" target="_blank">Cetak Data Diri</a>
                </div>
                <h5 class="card-title mb-3 text-center">
                  <?= $data_pendaftar['nama'] ?>
                </h5>
                <ul class="list-group">
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Tempat, Tanggal Lahir</h6>
                    <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Alamat</h6>
                    <small class="text-muted"><?= $data_pendaftar['alamat'] ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Jenis Kelamin</h6>
                      <?php 
                      if($data_pendaftar['jk'] == 'L') {
                        $kelamin = "Laki-laki";
                      } else {
                        $kelamin = "Perempuan";
                      }
                      ?>
                    <small class="text-muted"><?= $kelamin ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Anak Ke</h6>
                    <small class="text-muted"><?= $data_pendaftar['anak_ke'] ?> Dari <?= $data_pendaftar['jml_saudara'] ?> Saudara</small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Asal Sekolah</h6>
                    <small class="text-muted"><?= $data_pendaftar['asal_sekolah'] ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Jenis Program</h6>
                    <small class="text-muted"><?= $data_pendaftar['jenis_program'] ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Email</h6>
                    <small class="text-muted"><?= $data_pendaftar['email'] ?></small>
                  </li>
                  <li class="list-group-item">
                    <h6 class="mb-0" style="color: black;">Telepon</h6>
                    <small class="text-muted"><?= $data_pendaftar['telepon'] ?></small>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<?php
include("../layout/footer.php");
?>

</body>

</html>