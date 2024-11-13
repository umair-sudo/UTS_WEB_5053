<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['password'];

$message = '';

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($sambung, "select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_assoc($login);

    // cek jika user login sebagai dosen
    if ($data['level'] == "dosen") {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "dosen";
        // alihkan ke halaman dashboard dosen
        header("location:halaman_dosen.php");

        // cek jika user login sebagai mahasiswa
    } else if ($data['level'] == "mahasiswa") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['level'] = "mahasiswa";
        // alihkan ke halaman dashboard mahasiswa
        header("location:halaman_mhs.php");

        // cek jika user login sebagai pengurus
    } else {

        // alihkan ke halaman login kembali
        header("location:login.php?pesan=gagal");
    }
} else {
    $message = "Username dan Password anda salah!";
    $_SESSION["message"] = $message;
    header("location:login.php?pesan=gagal");
}

?>