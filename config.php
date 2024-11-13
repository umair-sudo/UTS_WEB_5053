<?php

$server = "localhost";
$username = "root";
$password = "";
$nama_database = "uts_5053";

$sambung = mysqli_connect($server, $username, $password, $nama_database);
if (!$sambung) {
    die("eror gaes:" . mysqli_connect_error());
}

?>