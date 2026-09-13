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

    </head>

<!--ini header-->
<?php
include('../config/auto_load.php');
include('uploadbukti_control.php');
include("../layout/header.php");
?>


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-12 text-gray-800">Konfirmasi Pembayaran</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Konfirmasi Pembayaran</h6>
        </div>
        <div class="card-body">
            <?php 
                if(isset($_SESSION['pesan_bukti'])) { 
            ?>
            <div class="alert alert-warning">
            <?= $_SESSION['pesan_bukti'] ?>
            </div>
            <?php
                }
            ?>
            <div class="row">
            <form class="user" method="POST" action="<?= $base_url ?>/santri/uploadbukti_control.php" enctype="multipart/form-data">
                    <div class="form-group floating-label mt-5" style="margin-left: 20px;">
                        <label class="col-sm-12">Bukti Pembayaran(PDF, JPEG, PNG) : </label>
                        <label class="btn btn-success" for="my-file-selector2">
                            <input id="my-file-selector2" name="gambar" type="file" style="display:none" onchange="$('#upload-file-info2').html(this.files[0].name)">
                            Upload Bukti Pembayaran(PDF, JPEG, PNG)
                        </label>
                        <span class='label label-info' id="upload-file-info2"></span>
                    </div>
                </div>
                <hr>
                <button type="submit" name="upload" class="btn btn-success blue pull-right mt-1 mb-3"><i class="fa fa-upload"></i> Upload File</button>
                </form>
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