<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            margin-bottom: 30px;
            background-color: #007bff;
        }
        .navbar-brand {
            font-weight: bold;
            font-size: 1.5em;
            color: white;
        }
        .card {
            border-radius: 15px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
            background-color: white;
            margin-bottom: 30px;
        }
        .card-header {
            background-color: #007bff;
            color: white;
            text-align: center;
            font-size: 1.3em;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
            padding: 20px;
        }
        .form-control {
            border-radius: 8px;
            padding: 12px;
            font-size: 1em;
        }
        .btn {
            border-radius: 30px;
            font-size: 1.1em;
            padding: 10px 25px;
        }
        h4 {
            font-weight: bold;
            margin-bottom: 15px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #007bff;
            color: white;
            margin-top: 20px;
            border-radius: 0 0 15px 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">PEMESANAN</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-item nav-link text-white" href="index.php">Home</a>
                <a class="nav-item nav-link text-white" href="daftar-pemesanan.php">Daftar Pemesanan</a>
            </div>
        </div>
    </nav>

    <!-- Form Pemesanan -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                Form Pemesanan
            </div>
            <div class="card-body">
                <?php
                include 'koneksi.php';

                // Handle possible error reporting
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                if (isset($_GET['id_pemesanan'])) {
                    $id = $_GET['id_pemesanan'];
                    $sql = "SELECT * FROM pemesanan WHERE id_pemesanan='$id'";
                    $hasil = mysqli_query($koneksi, $sql);
                    if ($hasil) {
                        $pemesanan = mysqli_fetch_array($hasil);
                        ?>
                        <form action="process-pemesanan.php" method="post">
                            <div class="form-group">
                                <label>ID Pemesanan</label>
                                <input type="text" name="id_pemesanan" class="form-control" required value="<?= htmlspecialchars($pemesanan['id_pemesanan']); ?>" readonly />
                            </div>
                            <div class="form-group">
                                <label>ID User</label>
                                <input type="number" name="id_user" class="form-control" required value="<?= htmlspecialchars($pemesanan['id_user']); ?>" />
                            </div>
                            <div class="form-group">
                                <label>ID Kendaraan</label>
                                <input type="number" name="id_kendaraan" class="form-control" required value="<?= htmlspecialchars($pemesanan['id_kendaraan']); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" name="tanggal" class="form-control" required value="<?= htmlspecialchars($pemesanan['tanggal']); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Status Pemesanan</label>
                                <select name="status" class="form-control" required>
                                    <option value="pending" <?= ($pemesanan['status'] == 'pending') ? 'selected' : ''; ?>>Pending</option>
                                    <option value="approved" <?= ($pemesanan['status'] == 'approved') ? 'selected' : ''; ?>>Approved</option>
                                    <option value="rejected" <?= ($pemesanan['status'] == 'rejected') ? 'selected' : ''; ?>>Rejected</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="edit_pemesanan">Simpan</button>
                        </form>
                        <?php
                    } else {
                        echo "<p>Data pemesanan tidak ditemukan.</p>";
                    }
                } else {
                    ?>
                    <form action="process-pemesanan.php" method="post">
                        <div class="form-group">
                            <label>ID User</label>
                            <input type="number" name="id_user" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>ID Kendaraan</label>
                            <input type="number" name="id_kendaraan" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Tanggal</label>
                            <input type="date" name="tanggal" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Status Pemesanan</label>
                            <select name="status" class="form-control" required>
                                <option value="pending">Pending</option>
                                <option value="approved">Approved</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="daftar-pemesanan">Simpan</button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 Sistem Monitoring Pemesanan
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
