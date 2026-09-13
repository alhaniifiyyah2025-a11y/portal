<?php

session_start();

$base_url = "http://localhost/psbb";

if(isset($_SESSION['user'])) {
    include("koneksi.php");
} else {
    $_SESSION['login_error'] = "Silahkan Login untuk masuk kedalam sistem";
    header('location:'. $base_url . '/login.php');
}

?>