<?php

session_start();

$username = @$_SESSION['username'];
$password = @$_SESSION['password'];

$akses = @$_SESSION["akses"];

require "./config.php";

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Halaman Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script language="JavaScript" type="text/javascript">
        function Hapus() {
            return confirm('Apakah anda yakin ingin menghapus?');
        }
    </script>
    <style>
        body {
            background-color: #f5f5f5;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            padding-top: 1rem;
        }

        .sidebar a {
            color: #ffffff;
            font-size: 1rem;
            display: block;
            padding: 1rem;
            text-decoration: none;
            transition: background-color 0.3s;
        }

        .sidebar a:hover {
            background-color: #495057;
        }

        .main-content {
            margin-left: 250px;
            padding: 2rem;
        }

        .navbar {
            background-color: #6c757d;
        }

        .card {
            border-radius: 15px;
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .logout-btn {
            background-color: #dc3545;
            color: #ffffff;
            border: none;
            transition: background-color 0.3s;
            margin-bottom: 100px;
        }

        .logout-btn:hover {
            background-color: #c82333;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center text-white mb-3">
            <h4>Dosen Dashboard</h4>
        </div>
        <!-- <a href="halaman_dosen.php">Rekapitulasi Nilai</a> -->
        <a href="halaman_tambah_mhs.php">Tambah Mahasiswa</a>
        <a href="logout.php" class="logout-btn mt-4 text-center">Log Out</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <nav class="navbar navbar-dark">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">REKAPITULASI NILAI KULIAH</span>
                <span class="text-white">Selamat Datang di Halaman Dosen</span>
            </div>
        </nav>

        <!-- Content Section -->
        <div class="card card-body mt-4 bg-light">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="card-title">Daftar Nilai Mahasiswa</h5>
                <a href="halaman_tambah_mhs.php" class="btn btn-warning" style="border-radius: 7px;">Tambah Mahasiswa</a>
            </div>

            <?php
            $sql = "SELECT * FROM user WHERE level = 'mahasiswa'";
            $query = mysqli_query($sambung, $sql);
            ?>

            <div class="table-responsive">
                <table class="table table-hover table-striped table-bordered text-center">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Mahasiswa</th>
                            <th scope="col">Diskusi (14%)</th>
                            <th scope="col">Praktikum (26%)</th>
                            <th scope="col">Responsi (15%)</th>
                            <th scope="col">UTS (20%)</th>
                            <th scope="col">UAS (25%)</th>
                            <th scope="col">Total Nilai</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        while ($db_uts_5035 = mysqli_fetch_array($query)) {
                            $total_nilai =
                                ($db_uts_5035['diskusi'] * 0.14) +
                                ($db_uts_5035['praktikum'] * 0.26) +
                                ($db_uts_5035['responsi'] * 0.15) +
                                ($db_uts_5035['uts'] * 0.20) +
                                ($db_uts_5035['uas'] * 0.25);

                            echo "<tr>";
                            echo "<td>$i</td>";
                            echo "<td>" . $db_uts_5035["username"] . "</td>";
                            echo "<td>" . $db_uts_5035["diskusi"] . "</td>";
                            echo "<td>" . $db_uts_5035["praktikum"] . "</td>";
                            echo "<td>" . $db_uts_5035["responsi"] . "</td>";
                            echo "<td>" . $db_uts_5035["uts"] . "</td>";
                            echo "<td>" . $db_uts_5035["uas"] . "</td>";
                            echo "<td>" . number_format($total_nilai, 2) . "</td>";
                            echo "<td>
                                    <a href='./update.php?username={$db_uts_5035['username']}' class='btn btn-sm btn-primary me-2'>Edit</a>
                                    <a href='./delete.php?username={$db_uts_5035['username']}' onclick='return Hapus()' class='btn btn-sm btn-danger'>Hapus</a>
                                  </td>";
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>