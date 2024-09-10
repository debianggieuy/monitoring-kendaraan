<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pengguna</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            margin-bottom: 30px;
            background-color: #800080;
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
            background-color: #800080;
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
        footer {
            text-align: center;
            padding: 20px 0;
            background-color: #800080;
            color: white;
            margin-top: 20px;
            border-radius: 0 0 15px 15px;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">PENGGUNA</a>
        <div class="collapse navbar-collapse">
            <div class="navbar-nav">
                <a class="nav-item nav-link text-white" href="index.php">Home</a>
                <a class="nav-item nav-link text-white" href="daftar-pengguna.php">Daftar Pengguna</a>
            </div>
        </div>
    </nav>

    <!-- Form Pengguna -->
    <div class="container">
        <div class="card">
            <div class="card-header">
                Form Pengguna
            </div>
            <div class="card-body">
                <?php
                include 'koneksi.php';

                // Handle possible error reporting
                error_reporting(E_ALL);
                ini_set('display_errors', 1);

                if (isset($_GET['id_user'])) {
                    $id = $_GET['id_user'];
                    $sql = "SELECT * FROM pengguna WHERE id_user='$id'";
                    $hasil = mysqli_query($conn, $sql);
                    if ($hasil) {
                        $pengguna = mysqli_fetch_array($hasil);
                        ?>
                        <form action="process-pengguna.php" method="post">
                            <input type="hidden" name="id_user" value="<?= htmlspecialchars($pengguna['id_user']); ?>" />
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" required value="<?= htmlspecialchars($pengguna['nama']); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Nomor Telepon</label>
                                <input type="text" name="nomor_telepon" class="form-control" value="<?= htmlspecialchars($pengguna['nomor_telepon']); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control"><?= htmlspecialchars($pengguna['alamat']); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block" name="edit_pengguna">Simpan</button>
                        </form>
                        <?php
                    } else {
                        echo "<p>Data pengguna tidak ditemukan.</p>";
                    }
                } else {
                    ?>
                    <form action="process-pengguna.php" method="post">
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" name="nama" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <label>Nomor Telepon</label>
                            <input type="text" name="nomor_telepon" class="form-control" />
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control"></textarea>
                        </div>
                        <button type="submit" class="btn btn-success btn-block" name="daftar_pengguna">Simpan</button>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        © 2024 Sistem Monitoring Pengguna
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
