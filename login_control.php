<?php 

include("config/koneksi.php");
session_start();

if(isset($_POST['login'])){

    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

    $sql = "SELECT * FROM users WHERE username='$username'";

    $stmt = mysqli_query($conn, $sql);

    if(mysqli_num_rows($stmt) > 0) {
        // jika data tersedia, simpan data user kedalam session
        while($user = mysqli_fetch_array($stmt)){
            $_SESSION["user"] = $user;
            $_SESSION["nama"] = $user['nama'];
            $_SESSION['id'] = $user['id'];

            // verifikasi password
            if(password_verify($password, $user["password"])){
                // login sukses, alihkan ke halaman dashboard
                header("Location: santri/dashboard.php");
            } else {
                $_SESSION['login_error'] = "Password anda Salah!";
                header('location:login.php');
            }
        }
    } else {
        $_SESSION['login_error'] = "Email atau Password anda Salah!";
        header('location:login.php');
    }
} else {
    $_SESSION['login_error'] = "Email tidak Terdaftar!";
    header('location:login.php');

}

?>