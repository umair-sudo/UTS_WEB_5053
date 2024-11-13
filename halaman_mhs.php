<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Halaman Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #343a40;
            color: #ffffff;
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

        .table {
            background-color: #ffffff;
            border-radius: 10px;
        }
    </style>
</head>

<body>

    <?php
    session_start();
    require "./config.php";
    $username = $_SESSION['username'];
    if ($_SESSION['level'] == "") {
        header("location:index.php");
    }
    ?>

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="text-center mb-4">
            <h4>Mahasiswa Dashboard</h4>
        </div>
        <a href="halaman_mahasiswa.php">Dashboard</a>
        <a href="profile.php">Profile</a>
        <a href="logout.php" class="text-danger mt-4 text-center">Log Out</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Header -->
        <nav class="navbar navbar-dark mb-4">
            <div class="container-fluid">
                <span class="navbar-brand mb-0 h1">Rekapitulasi Nilai</span>
            </div>
        </nav>

        <!-- Table Card -->
        <div class="card p-4">
            <h3 class="text-center mb-4">Nilai Mahasiswa</h3>
            <div class="table-responsive">
                <table class="table table-hover table-striped text-center">
                    <thead class="table-dark">
                        <tr>
                            <th>Nomer</th>
                            <th>Mahasiswa</th>
                            <th>Diskusi (14%)</th>
                            <th>Praktikum (26%)</th>
                            <th>Responsi (15%)</th>
                            <th>UTS (20%)</th>
                            <th>UAS (25%)</th>
                            <th>Total Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = mysqli_query($sambung, "select * from user where username='$username'");
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
                            echo "</tr>";
                            $i++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-3 text-center">
                <a href="logout.php" class="btn btn-danger">Log Out</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>