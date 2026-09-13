<!DOCTYPE html>
<div lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>User Profil - Aplikasi Pendaftaran Santri</title>

        <link rel="icon" type="image/png" href="assets/img/lg_ds.png">

        <!-- Custom fonts for this template-->
        <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">
          <!-- css datepicker -->
        <link href="../assets/vendor/datepicker/css/bootstrap-datepicker.css" rel="stylesheet">


    </head>

    <!--ini header-->
    <?php
    include('../config/auto_load.php');
    include('editprofil_control.php');
    include("../layout/header.php");
    $id_user = $_SESSION['id'];
    $sql_pendaftar = "SELECT * FROM pendaftar, detail_pendaftar
                  where pendaftar.users_id = '$id_user'";
    $result_pendaftar = mysqli_query($conn, $sql_pendaftar);
    if(mysqli_num_rows($result_pendaftar)){
    $data_pendaftar = mysqli_fetch_array($result_pendaftar);
    }
    ?>


    <!-- End of Topbar -->

    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="card shadow mb-4"> 
            <div class="card-body md-8">
                <form class="user" method="POST" action="<?= $base_url ?>/santri/editprofil_control.php" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-8">
                            <h3 class="h3 mb-3 text-black-400">Edit Data Diri</h3>
                            <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" placeholder="Masukkan Nama" name="nama" value="<?= $data_pendaftar['nama'] ?>">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="tmpt_lahir">Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmpt_lahir" placeholder="Tempat lahir" name="tmpt_lahir" value="<?= $data_pendaftar['tmpt_lahir'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="tgl_lahir">Tanggal Lahir</label>
                                    <input type="text" class="form-control datepicker" id="tgl_lahir" placeholder="Tanggal Lahir" name="tgl_lahir" value="<?= date("d-m-Y", strtotime($data_pendaftar['tgl_lahir'])); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Jenis Kelamin</label>
                                    <?php
                                    $laki = "";
                                    $perempuan = "";

                                    if($data_pendaftar['jk'] == "L") {
                                        $laki = "checked";
                                    } else {
                                        $perempuan = "checked";
                                    }
                                    ?>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="lk" value="L" <?= $laki ?>>
                                        <label class="form-check-label" for="lk">Laki Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jk" id="pr" value="P" <?= $perempuan ?>>
                                        <label class="form-check-label" for="pr">Perempuan</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="jenis_program">Jenis Program</label>
                                    <select name="jenis_program" id="jenis_program" class="form-control">
                                        <option value="">Pilih Program</option>
                                        <option value="islam" <?php if($data_pendaftar['jenis_program'] == 'Bahasa Arab'){ echo "selected"; } ?>>Bahasa Arab</option>
                                        <option value="kristen" <?php if($data_pendaftar['jenis_program'] == 'Bahasa Inggris'){ echo "selected"; } ?>>Bahasa Inggris</option>
                                        <option value="katolik" <?php if($data_pendaftar['jenis_program'] == 'Kitab'){ echo "selected"; } ?>>Kitab</option>
                                        <option value="hindu" <?php if($data_pendaftar['jenis_program'] == 'Tahfidz'){ echo "selected"; } ?>>Tahfidz</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="anak_ke">Anak Ke -</label>
                                    <input type="text" class="form-control" id="anak_ke" placeholder="" name="anak_ke" value="<?= $data_pendaftar['anak_ke'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="jml_saudara">Dari </label>
                                    <input type="text" class="form-control" id="jml_saudara" placeholder="" name="jml_saudara" value="<?= $data_pendaftar['jml_saudara'] ?>">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input name="asal_sekolah" id="asal_sekolah" class="form-control" value="<?= $data_pendaftar['asal_sekolah']; ?>">
                            </div>
                            
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea type="text" class="form-control" id="alamat" placeholder="Masukkan Alamat" name="alamat" value=""><?= $data_pendaftar['alamat'] ?></textarea>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="email">Email</label>
                                    <input name="email" type="email" class="form-control" id="email" placeholder="Email" value="<?= $data_pendaftar['email'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon">Telepon</label>
                                    <input name="telepon" type="text" class="form-control" id="telepon" placeholder="Telepon" value="<?= $data_pendaftar['telepon'] ?>">
                                </div>
                            </div>
                            <hr><br>
                            <h3 class="h3 mb-3 text-black-400">Edit Data Orang Tua</h3>
                            <div class="form-group">
                                <label for="nama_ayah">Nama Ayah</label>
                                <input type="text" class="form-control" id="nama_ayah" placeholder="Masukkan Nama Ayah" name="nama_ayah" value="<?= $data_pendaftar['nama_ayah'] ?>">
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="tempat_lahir_ayah">Tempat Lahir Ayah</label>
                                    <input type="text" class="form-control" id="tempat_lahir_ayah" placeholder="Tempat lahir Ayah" name="tempat_lahir_ayah" value="<?= $data_pendaftar['tempat_lahir_ayah'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir_ayah">Tanggal Lahir Ayah</label>
                                    <input type="text" class="form-control datepicker" id="tanggal_lahir_ayah" placeholder="Tanggal Lahir Ayah" name="tanggal_lahir_ayah" value="<?= date("d-m-Y", strtotime($data_pendaftar['tanggal_lahir_ayah'])); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="pendidikan_terakhir_ayah">Pendidikan Terakhir Ayah</label>
                                    <input name="pendidikan_terakhir_ayah" type="text" class="form-control" id="pendidikan_terakhir_ayah" placeholder="Pendididkan Terakhir Ayah" value="<?= $data_pendaftar['pendidikan_terakhir_ayah'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="pekerjaan_ayah">Pekerjaan Ayah</label>
                                    <input name="pekerjaan_ayah" type="text" class="form-control" id="pekerjaan_ayah" placeholder="Pekerjaan Ayah" value="<?= $data_pendaftar['pekerjaan_ayah'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="nama_ibu">Nama Ibu</label>
                                <input type="text" class="form-control" id="nama_ibu" placeholder="Masukkan Nama Ibu" name="nama_ibu" value="<?= $data_pendaftar['nama_ibu'] ?>">
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="tempat_lahir_ibu">Tempat Lahir Ibu</label>
                                    <input type="text" class="form-control" id="tempat_lahir_ibu" placeholder="Tempat lahir Ibu" name="tempat_lahir_ibu" value="<?= $data_pendaftar['tempat_lahir_ibu'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="tanggal_lahir_ibu">Tanggal Lahir Ibu</label>
                                    <input type="text" class="form-control datepicker" id="tanggal_lahir_ibu" placeholder="Tanggal Lahir Ibu" name="tanggal_lahir_ibu" value="<?= date("d-m-Y", strtotime($data_pendaftar['tanggal_lahir_ibu'])); ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="pendidikan_terakhir_ibu">Pendidikan Terakhir Ibu</label>
                                    <input name="pendidikan_terakhir_ibu" type="text" class="form-control" id="pendidikan_terakhir_ibu" placeholder="Pendidikan Terakhir Ibu" value="<?= $data_pendaftar['pendidikan_terakhir_ibu'] ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="pekerjaan_ibu">Pekerjaan Ibu</label>
                                    <input name="pekerjaan_ibu" type="text" class="form-control" id="pekerjaan_ibu" placeholder="Pekerjaan Ibu" value="<?= $data_pendaftar['pekerjaan_ibu'] ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="alamat_ortu">Alamat Orang Tua</label>
                                    <textarea name="alamat_ortu" type="alamat_ortu" class="form-control" id="alamat_ortu" placeholder="Alamat Orang Tua" value=""><?= $data_pendaftar['alamat_ortu'] ?></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="telepon_ortu">Telepon/WA Orang Tua</label>
                                    <input name="telepon_ortu" type="text" class="form-control" id="telepon_ortu" placeholder="Telepon/WA Orang Tua" value="<?= $data_pendaftar['telepon_ortu'] ?>">
                                </div>
                            </div>    
                        </div>

                        <div class="col-md-4">
                            <label>FOTO 3x4</label>
                            <?php
                            if(isset($data_pendaftar['foto']) && $data_pendaftar['foto'] != '') {
                                $foto = '../uploads/' . $data_pendaftar['foto'];
                            } else {
                                $foto = '../assets/img/avatar.jpg';
                            }
                            ?>
                            <img src="<?= $foto ?>" alt="foto profil" class="img-fluid">
                            <input type="file" name="gambar" class="form-control mt-2">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="btn_simpan" value="simpan_profil" class="btn btn-primary mb-5">Ubah</button>
                            <a href="dashboard.php" class="btn btn-danger mb-5">Kembali</a>
                        </div>
                    </div>
                </form>
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