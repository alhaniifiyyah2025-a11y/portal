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
include("detail_pendaftar_control.php");
include("../layout/header_admin.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-4 text-gray-800">Detail Pendaftar</h1>
  
  <div class="row">
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA DIRI</h6>
        </div>
        <div class="card-body">
          <div class="card-body">
            <div class="col-auto mt-3 text-center">
              <?php
              if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != "") {
                $foto = '../uploads/' . $data_pendaftar['foto'];
              } else {
                $foto = '../assets/img/avatar.jpg';
              }
              ?>
              <img src="<?= $foto ?>" class="img-fluid rounded-circle" alt="menunggu" style="width: 200px;">
            </div>
            <br>
            <h5 class="card-title mb-3 text-center">
              <?= $data_pendaftar['nama'] ?>
            </h5>
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Tempat, Tanggal Lahir</h6>
                <small class="text-muted"><?= $data_pendaftar['tmpt_lahir'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Jenis Kelamin</h6>
                <?php 
                if($data_pendaftar['jenis_kelamin'] == 'L') {
                  $kelamin = "Laki-laki";
                } else {
                  $kelamin = "Perempuan";
                }
                ?>

                <small class="text-muted"><?= $kelamin ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Agama</h6>
                <small class="text-muted">Islam</small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat</h6>
                <small class="text-muted"><?= $data_pendaftar['alamat'] ?></small>
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
    <div class="col-md-6">
      <div class="card shadow mb-4">
        <div class="card-header py-3">
          <h6 class="m-0 font-weight-bold text-primary">DATA ORANG TUA</h6>
        </div>
        <div class="card-body">
          <div class="card-body">         
            <ul class="list-group">
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Ayah</h6>
                <small class="text-muted"><?= $data_nilai['nama_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Tempat, Tanggal Lahir Ayah</h6>
                <small class="text-muted"><?= $data_pendaftar['tempat_lahir_ayah'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tanggal_lahir_ayah'])); ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pendidikan Terakhir Ayah</h6>
                <small class="text-muted"><?= $data_nilai['pendidikan_terakhir_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pekerjaan Ayah</h6>
                <small class="text-muted"><?= $data_nilai['pekerjaan_ayah'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Nama Ibu</h6>
                <small class="text-muted"><?= $data_nilai['nama_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Tempat, Tanggal Lahir</h6>
                <small class="text-muted"><?= $data_pendaftar['tempat_lahir_ibu'] ?>, <?= date("d-m-Y", strtotime($data_pendaftar['tanggal_lahir_ibu'])); ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pendidikan Terakhir Ibu</h6>
                <small class="text-muted"><?= $data_nilai['pendidikan_terakhir_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Pekerjaan Ibu</h6>
                <small class="text-muted"><?= $data_nilai['pekerjaan_ibu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Alamat Orang Tua</h6>
                <small class="text-muted"><?= $data_nilai['alamat_ortu'] ?></small>
              </li>
              <li class="list-group-item">
                <h6 class="mb-0" style="color: black;">Telp/WA Orang Tua</h6>
                <small class="text-muted"><?= $data_nilai['telepon_ortu'] ?></small>
              </li>
            </ul>

            <button type="button" class="btn btn-primary mt-3 btn-block" data-toggle="modal" data-target="#modalvalidasi">
                Validasi Data Pendaftar
            </button>
            <!-- Modal -->
            <div class="modal fade" id="modalvalidasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <form action="<?= $base_url ?>/admin/detailpendaftar.php?id=<?= $id_pendaftar ?>" method="POST">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Konfirmasi data pendaftar?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                          <label for="nilai">Beri Penilaian</label>
                          <select name="nilai" id="nilai" class="form-control" required>
                            <option value="">--Pilih --</option>
                            <option value="1">Terima</option>
                            <option value="2">Tolak</option>
                          </select>
                        </div>
                        <div class="modal-footer">
                            <button name="simpan" value="simpan_nilai" class="btn btn-primary">Simpan</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        </div>
                      </form>
                      </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <a href="pendaftaran.php" class="btn btn-danger">Kembali</a>
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