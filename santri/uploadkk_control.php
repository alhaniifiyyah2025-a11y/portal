<?php  

require_once("../config/koneksi.php");
require_once("../config/auto_load.php");
$id_user = $_SESSION['id'];
$sql_pendaftar = "SELECT * FROM pendaftar where users_id = '$id_user'";
$result_pendaftar = mysqli_query($conn, $sql_pendaftar);
if(mysqli_num_rows($result_pendaftar)){
  $data_pendaftar = mysqli_fetch_array($result_pendaftar);
  $id_pendaftar = $data_pendaftar['id'];
  $nama = $data_pendaftar['nama'];
  // GAMBAR
  if (isset($_POST['upload'])) {

    $ekstensi_diperbolehkan = array('png','jpg','jpeg','PDF');
    $nama_gambar = $_FILES['gambar']['name'];
    // profile.png
    $x = explode('.', $nama_gambar);
    $ekstensi = strtolower(end($x));
    $ukuran	= $_FILES['gambar']['size'];
    $file_tmp = $_FILES['gambar']['tmp_name'];

    $ubah_nama = $nama . '.' . $ekstensi;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
      if($ukuran < 1044070) {
        move_uploaded_file($file_tmp, '../uploads/'. $ubah_nama);

        $sql_update_profil = "UPDATE pendaftar set upload_kk = '$ubah_nama' where id='$id_pendaftar'";
        $query_update = mysqli_query($conn, $sql_update_profil);

        if($query_update) {
          $_SESSION['pesan_upload'] = "Upload Kartu Keluarga Berhasil";
          header('location:upload_kk.php');    
        } else {
          $_SESSION['pesan_upload'] = "Upload Kartu Keluarga Gagal";
          die();
          header('location:upload_kk.php');
        }
      } else {
        $_SESSION['pesan_upload'] = "Gambar terlalu besar";
        die();
        header('location:upload_kk.php');    
      }
    } else {
      $_SESSION['pesan_upload'] = "Ekstensi tidak diperbolehkan";
      die();
      header('location:upload_kk.php');    
    }
  }
}
?>