<?php  

include '../config/koneksi.php';

if (isset($_POST['upload'])) {
    $targetfolderBase   = "../uploads/";

    $fileNameKk   = date("h-m-s").basename( $_FILES['kk']['name']);
    $fileNameFoto   = date("h-m-s").basename( $_FILES['foto2r']['name']);
    $fileNameBukti   = date("h-m-s").basename( $_FILES['bukti']['name']);

    $targetfolder   = $targetfolderBase . $fileNameKk;
    $targetfolder2  = $targetfolderBase . $fileNameFoto;
    $targetfolder3  = $targetfolderBase . $fileNameBukti;
    
    
    $ok=1;

    $file_type=$_FILES['kk']['type'];
    $file_type2=$_FILES['foto2r']['type'];
    $file_type3=$_FILES['bukti']['type'];


    if ($file_type=="application/pdf" || $file_type=="image/png" || $file_type=="image/jpeg") {

         if(move_uploaded_file($_FILES['kk']['tmp_name'], $targetfolder))

         {

            $query  = "UPDATE pendaftaran SET upload_kk='$fileNameKk' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
             echo "<div class='alert alert-success alert-dismissable'>
              <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
              <strong>Berhasil!</strong> Upload Kartu Keluarga(PDF, JPEG, PNG).
            </div>";   
            }
             
         }

         else {

         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Kartu Keluarga(PDF, JPEG, PNG).
        </div>";

         }

        }

    else {

     echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Kartu Keluarga harus format(.PDF, JPEG, PNG).
        </div>";

    }

    if ($file_type2=="application/pdf" || $file_type2=="image/png" || $file_type2=="image/jpeg") {
        if(move_uploaded_file($_FILES['foto2r']['tmp_name'], $targetfolder2))

         {

            $query  = "UPDATE pendaftaran SET upload_foto='$fileNameFoto' WHERE id=$id";

            $exec   = mysqli_query($conn, $query);

            if ($exec) {
                echo "<div class='alert alert-success alert-dismissable'>
                  <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                  <strong>Berhasil!</strong> Upload Foto(PDF, JPEG, PNG).
                </div>";                
            }


         }

         else {

         echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Foto(PDF, JPEG, PNG).
        </div>";

         }
    }else{
        echo "<div class='alert alert-danger alert-dismissable'>
          <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
          <strong>Gagal!</strong> Upload Foto harus format(PDF, JPEG, PNG).
        </div>";
    }
  

    
    
}
?>