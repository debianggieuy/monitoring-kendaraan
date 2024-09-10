<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

// Menjalankan query untuk mengambil data pemesanan
$query = "SELECT * FROM pemesanan";
$result = $koneksi->query($query); // Menggunakan variabel $koneksi
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Pemesanan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f0f4f8;
            font-family: 'Arial', sans-serif;
            margin: 20px;
            color: #333;
        }
        h1 {
            color: #6a0dad; /* Warna ungu untuk konsistensi dengan form */
            text-align: center;
            margin-bottom: 30px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 10px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            background-color: #fff;
        }
        a {
            text-decoration: none;
            color: #6a0dad; /* Warna ungu untuk konsistensi dengan form */
        }
        a:hover {
            text-decoration: underline;
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
    <h1>Daftar Pemesanan</h1>
    <table>
        <thead>
            <tr>
                <th>ID Pemesanan</th>
                <th>ID User</th>
                <th>ID Kendaraan</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['id_pemesanan']); ?></td>
                    <td><?php echo htmlspecialchars($row['id_user']); ?></td>
                    <td><?php echo htmlspecialchars($row['id_kendaraan']); ?></td>
                    <td><?php echo htmlspecialchars($row['tanggal']); ?></td>
                    <td><?php echo htmlspecialchars($row['status']); ?></td>
                    <td>
                        <a href="form-pemesanan.php?id_pemesanan=<?php echo urlencode($row['id_pemesanan']); ?>">Edit</a>
                        <a href="hapus-pemesanan.php?id_pemesanan=<?php echo urlencode($row['id_pemesanan']); ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <!-- Footer -->
    <footer>
        © 2024 Sistem Monitoring Pemesanan
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
