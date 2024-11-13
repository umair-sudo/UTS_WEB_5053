<?php

include "./config.php";

if (isset($_POST["edit"])) {
    $username = $_POST["username"];
    $diskusi = @$_POST['diskusi'];
    $praktikum = @$_POST['praktikum'];
    $responsi = @$_POST['responsi'];
    $uts = @$_POST['uts'];
    $uas = @$_POST['uas'];

    $sql = "UPDATE user SET username='$username', diskusi='$diskusi', praktikum='$praktikum', responsi='$responsi', uts='$uts', uas='$uas' WHERE username='$username'";
    $query = mysqli_query($sambung, $sql);

    if ($query) {
        header("Location: ./halaman_dosen.php");
    } else {
        die("Gagal menyimpan perubahan");
    }
} else {
    die("Akses Dilarang");
}
?>