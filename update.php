<?php

include "./config.php";

$username = @$_GET["username"];
$query = mysqli_query($sambung, "SELECT * from user where username='$username'");

$username = mysqli_fetch_assoc($query);

if (mysqli_num_rows($query) < 1) {
    die("data tidak ditemukan...");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Edit Nilai Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
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

        .card {
            border-radius: 15px;
        }

        .navbar {
            background-color: #6c757d;
        }
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center text-white mb-4">
            <h4>Dosen Dashboard</h4>
        </div>
        <!-- <a href="halaman_dosen.php">Rekapitulasi Nilai</a> -->
        <a href="halaman_tambah_mhs.php">Tambah Mahasiswa</a>
        <a href="logout.php" class="text-danger mt-4 text-center">Log Out</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <nav class="navbar navbar-dark mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Edit Nilai Mahasiswa</span>
            </div>
        </nav>

        <!-- Form Card -->
        <div class="card card-body bg-light">
            <h2 class="text-center mb-4">Form Edit Nilai Mahasiswa</h2>
            <form action="./ctrl_update.php" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">Mahasiswa</label>
                    <input type="text" id="username" name="username" class="form-control"
                        value="<?php echo $username['username']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="diskusi" class="form-label">Diskusi (14%)</label>
                    <input type="number" id="diskusi" name="diskusi" class="form-control"
                        value="<?php echo $username['diskusi']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="praktikum" class="form-label">Praktikum (26%)</label>
                    <input type="number" id="praktikum" name="praktikum" class="form-control"
                        value="<?php echo $username['praktikum']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="responsi" class="form-label">Responsi (15%)</label>
                    <input type="number" id="responsi" name="responsi" class="form-control"
                        value="<?php echo $username['responsi']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="uts" class="form-label">UTS (20%)</label>
                    <input type="number" id="uts" name="uts" class="form-control"
                        value="<?php echo $username['uts']; ?>" required>
                </div>
                <div class="mb-3">
                    <label for="uas" class="form-label">UAS (25%)</label>
                    <input type="number" id="uas" name="uas" class="form-control"
                        value="<?php echo $username['uas']; ?>" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" name="edit" class="btn btn-primary">Simpan</button>
                    <a href="halaman_dosen.php" class="btn btn-danger">Kembali</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>