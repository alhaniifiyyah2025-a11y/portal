<?php
require_once("../config/koneksi.php");
require_once("../config/auto_load.php");
$id_user = $_SESSION['id'];
$sql_pendaftar = "SELECT * FROM pendaftar JOIN detail_pendaftar ON pendaftar.users_id = detail_pendaftar.users_id 
                  where pendaftar.users_id = '$id_user'";
$result_pendaftar = mysqli_query($conn, $sql_pendaftar);

if(mysqli_num_rows($result_pendaftar)){

    $data_pendaftar = mysqli_fetch_array($result_pendaftar);

    if(isset($_POST['btn_simpan']) && $_POST['btn_simpan'] == 'simpan_profil') {
        
        $id_pendaftar = $data_pendaftar['id'];
        $nama = $_POST['nama'];
        $tempat_lahir = $_POST['tmpt_lahir'];
        $tanggal_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
        $jenis_kelamin = $_POST['jk'];
        $agama = $_POST['jenis_program'];
        $anak_ke = $_POST['anak_ke'];
        $jml_saudara = $_POST['jml_saudara'];
        $asal_sekolah = $_POST['asal_sekolah'];
        $alamat = $_POST['alamat'];
        $email = $_POST['email'];
        $telepon = $_POST['telepon'];

        $nama_ayah = $_POST['nama_ayah'];
        $tempat_lahir_ayah = $_POST['tempat_lahir_ayah'];
        $tanggal_lahir_ayah = date("Y-m-d", strtotime($_POST['tanggal_lahir_ayah']));
        $pendidikan_terakhir_ayah = $_POST['pendidikan_terakhir_ayah'];
        $pekerjaan_ayah = $_POST['pekerjaan_ayah'];
        $nama_ibu = $_POST['nama_ibu'];
        $tempat_lahir_ibu = $_POST['tempat_lahir_ibu'];
        $tanggal_lahir_ibu = date("Y-m-d", strtotime($_POST['tanggal_lahir_ibu']));
        $pendidikan_terakhir_ibu = $_POST['pendidikan_terakhir_ibu'];
        $pekerjaan_ibu = $_POST['pekerjaan_ibu'];
        $alamat_ortu = $_POST['alamat_ortu'];
        $telepon_ortu = $_POST['telepon_ortu'];

        // GAMBAR
        if($_FILES['gambar']['name'] != '') {

            $ekstensi_diperbolehkan = array('png','jpg');
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

                    $sql_update_profil = "UPDATE pendaftar set foto = '$ubah_nama' where id='$id_pendaftar'";
                    $query_update = mysqli_query($conn, $sql_update_profil);

                    if($query_update) {

                    } else {
                        echo "GAGAL UPLOAD"; die;
                    }

                } else {
                    echo "Gambar terlalu besar"; die;
                }

            } else {
                echo " ekstensi tidak diperbolehkan"; die;
            }


        }


        $sql_update_profil = "UPDATE pendaftar set nama='$nama', tmpt_lahir='$tmpt_lahir', tgl_lahir='$tgl_lahir', 
                             jk='$jk', anak_ke='$anak_ke', jml_saudara='$jml_saudara', alamat='$alamat', asal_sekolah='$asal_sekolah', 
                             jenis_program='$jenis_program', email='$email', telepon='$telepon' where id='$id_pendaftar'";
        
        $sql_update_profil = "UPDATE detail_pendaftar set nama_ayah='$nama_ayah', tempat_lahir_ayah='$tempat_lahir_ayah'
                             , tanggal_lahir_ayah='$tanggal_lahir_ayah', pendidikan_terakhir_ayah='$pendidikan_terakhir_ayah'
                             , pekerjaan_ayah='$pekerjaan_ayah', nama_ibu='$nama_ibu', tempat_lahir_ibu='$tempat_lahir_ibu'
                             , tanggal_lahir_ibu='$tanggal_lahir_ibu', pendidikan_terakhir_ibu='$pendidikan_terakhir_ibu'
                             , pekerjaan_ibu='$pekerjaan_ibu', alamat_ortu='$alamat_ortu', telepon_ortu='$telepon_ortu' 
                             where id='$id_pendaftar'";
        
        $sql_update_profil2 = "UPDATE users set username='$email' WHERE id='$id_pendaftar'";

        $query_update_profil = mysqli_query($conn, $sql_update_profil);
        $query_update_profil1 = mysqli_query($conn, $sql_update_profil1);
        $query_update_profil2 = mysqli_query($conn, $sql_update_profil2);

        if($query_update_profil) {
            // berhasil
            $_SESSION['pesan_sukses'] = "Edit Profil Sukses!";
            
            header('location:dashboard.php');
        } else {
            echo "gagal update data profil"; die;
        }
        if($query_update_profil1) {
            // berhasil
            $_SESSION['pesan_sukses'] = "Edit Profil Sukses!";
            
            header('location:dashboard.php');
        } else {
            echo "gagal update data profil"; die;
        }
        if($query_update_profil2) {
            // berhasil
            $_SESSION['pesan_sukses'] = "Edit Profil Sukses!";
            
            header('location:dashboard.php');
        } else {
            echo "gagal update data profil"; die;
        }

    }

}

?>