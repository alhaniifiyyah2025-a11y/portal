<?php
session_start();
session_unset("user");

$_SESSION['login_error'] = "Anda berhasil Logout";

header('location:login.php');
?>