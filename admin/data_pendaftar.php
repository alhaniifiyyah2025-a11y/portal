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


<!-- End of Topbar -->

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Data Pendaftar</h1>
    <hr class="mt-3">
    <div class="card shadow mb-4">
    <div class="card-body">
            <div class="table-responsive">
                <div id="dataTable_wrapper" class="dataTables_wrapper dt-bootstrap4">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="dataTables_length" id="dataTable_length"><label>Show <select name="dataTable_length" aria-controls="dataTable" class="custom-select custom-select-sm form-control form-control-sm">
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select> entries</label></div>
                        </div>
                        <div class="col-sm-12 col-md-6">
                            <div id="dataTable_filter" class="dataTables_filter"><label>Search:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="dataTable"></label></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 30px;">NO</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 50px;">Nama</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 63px;">Jenis Kelamin</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 31px;">Alamat</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 68px;">Jenis Program</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 67px;">Status</th>
                                        <th class="sorting" tabindex="0" aria-controls="dataTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 67px;">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>

                                <?php
                                    $no = 1;
                                    while($p = mysqli_fetch_array($all_pendaftar)) { 
                                ?>

                                <tr role="row" class="odd">
                                    <td class="sorting_1"><?= $no++ ?></td>
                                    <td><?= $p['nama'] ?></td>
                                    <td><?= $p['jk'] ?></td>
                                    <td><?= $p['alamat'] ?></td>
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
                                    <td>
                                        <a href="detail_pendaftar.php?id=<?= $p['id'] ?>" class="btn btn-primary btn-sm mb-1">Cek</a> 
                                        <a href="" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#modalHapus_<?= $p['id'] ?>">Hapus</a>
                                    </td>
                                </tr>

                                <!-- Modal -->
                                <div class="modal fade" id="modalHapus_<?= $p['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Apakah Anda yakin ?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Anda akan menghapus data pendaftar atas nama "<?= $p['nama'] ?>". <br>
                                            
                                            <b> DATA AKAN DIHAPUS PERMANEN.<b></p>
                                        </div>
                                        <div class="modal-footer">
                                            <a href="<?= $base_url ?>/admin/data_pendaftar.php?action=hapus&id=<?= $p['id'] ?>" class="btn btn-danger">Hapus</a>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                <?php }
                                if(mysqli_num_rows($all_pendaftar) == 0) {
                                    echo "<tr><td colspan='8' align='center'><b>Belum Ada pendaftar baru</b></td></tr>";
                                }
                                ?>
                                </tbody>
                            </table>
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