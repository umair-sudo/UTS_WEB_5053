<?php

// Import koneksi Mysql
require "./config.php";

// Mulai Session akses
session_start();

// Ambil parameter sebagai kunci clausa where
$username = @$_GET["username"];

//lakukan pengecekan apakah get username null atau tidak
if (empty($username)) {
    header("location: ./halaman_dosen.php");
} else {
    //Deklarasi Query Delete
    $query = "DELETE FROM user where username='$username'";

    //eksekusi Query
    mysqli_query($sambung, $query);

    if ($query) {
        header("location: halaman_dosen.php");
    } else {
        die("Gagal Menghapus Data");
    }
}

?>