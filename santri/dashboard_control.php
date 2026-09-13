<?php

$id_user = $_SESSION['id'];
$sql_pendaftar = "SELECT * FROM pendaftar where users_id = '$id_user'";
$result_pendaftar = mysqli_query($conn, $sql_pendaftar);

if(mysqli_num_rows($result_pendaftar)){

    $data_pendaftar = mysqli_fetch_array($result_pendaftar);
    $id_pendaftar = $data_pendaftar['id'];
    $status = $data_pendaftar['status_pendaftar'];

} else  {
    //tidak menampilkan apapun
}
?>