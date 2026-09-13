
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
include("pembayaran_control.php");
include("../layout/header_admin.php");
?>


<!-- End of Topbar -->

<!-- Begin Page Content -->
<body>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pendaftar</h1>
    <hr class="mt-3">
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-12">
                            <?php if(isset($_SESSION['pesan_sukses'])) { ?>
                                    <div class="alert alert-info"><?= $_SESSION['pesan_sukses'] ?></div>
                            <?php }
                            
                            unset($_SESSION['pesan_sukses']);
                            ?>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length">
                                <label>Show 
                                    <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-11">
                            <div class="table-responsive">
                                <form>
                                <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_desc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="No: activate to sort column ascending" aria-sort="descending" style="width: 10px;">No</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Nama: activate to sort column ascending" style="width: 60px;">Nama</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 50px;">Alamat</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 50px;">Jenis Kelamin</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Email: activate to sort column ascending" style="width: 50px;">Program</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" style="width: 31px;">Status Pembayaran</th>
                                            <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Aksi: activate to sort column ascending" style="width: 68px;">Aksi</th>
                                        </tr>
                                    </thead> 
                                    <tfoot>
                                        <tr>
                                            <th rowspan="1" colspan="1">No</th>
                                            <th rowspan="1" colspan="1">Nama</th>
                                            <th rowspan="1" colspan="1">Alamat</th>
                                            <th rowspan="1" colspan="1">Jenis Kelamin</th>
                                            <th rowspan="1" colspan="1">Program</th>
                                            <th rowspan="1" colspan="1">Status Pembayaran</th>
                                            <th rowspan="1" colspan="1">Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <?php
                                        $no = 1;
                                        $sql_pendaftar = "SELECT * FROM pendaftar";
                                        $result_pendaftar = mysqli_query($conn, $sql_pendaftar);
                                        while($p = mysqli_fetch_array($result_pendaftar)) { 
                                    ?>
                                    <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1"><?= $no++ ?></td>
                                            <td><?= $p['nama'] ?></td>
                                            <td><?= $p['alamat'] ?></td>
                                            <td><?= $p['jk'] ?></td>
                                            <td><?= $p['jenis_program'] ?></td>
                                            <?php
                                                if($p['status_pembayaran'] == 1) {
                                                    $status = '<span class="badge badge-info">ADA BUKTI</span>';

                                                } else if ($p['status_pembayaran'] == 2) {
                                                    $status = '<span class="badge badge-success">LUNAS</span>';

                                                } else if ($p['status_pembayaran'] == 3) {
                                                    $status = '<span class="badge badge-danger">BELUM LUNAS</span>';

                                                } else {
                                                    $status = '<span class="badge badge-warning">BELUM ADA BUKTI</span>';
                                                }
                                                
                                            ?>
                                            <td><?= $status ?></td>
                                            <td>
                                                <a href="pembayaran_control.php?action=lunas&id=<?= $p['id'] ?>" name="lunas" value="simpan_lunas" class="btn btn-success">Lunas</button>
                                                <a href="pembayaran_control.php?action=belum_lunas&id=<?= $p['id'] ?>" name="belum" value="simpan_menunggu" class="btn btn-danger">Belum Lunas</button>

                                            </td>
                                        </tr>
                                    </tbody>
                                    <?php }
                                        if(mysqli_num_rows($result_pendaftar) == 0) {
                                        echo "<tr><td colspan='8' align='center'><b>Belum Ada pendaftar baru</b></td></tr>";
                                        }
                                    ?>
                                </table>
                                </form>
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


<!-- End of Main Content -->

<?php
include("../layout/footer.php");

?>

</body>
</html>