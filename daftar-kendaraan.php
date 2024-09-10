<?php
// Sertakan file koneksi
include 'koneksi.php';

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data kendaraan
$query = "SELECT id_kendaraan, plat_nomor, jenis, status FROM kendaraan";
$result = $conn->query($query);

// Debug: Cek apakah query berhasil
if (!$result) {
    die("Query gagal: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kendaraan</title>
    <style>
        /* CSS yang digunakan di daftar kendaraan */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-left: 10px solid #800080; /* Warna ungu */
        }
        h1 {
            text-align: center;
            color: #800080; /* Warna ungu */
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
        }
        th, td {
            padding: 12px;
            text-align: left;
        }
        th {
            background-color: #800080; /* Warna ungu */
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
        td {
            color: #333;
        }
        .action-buttons a {
            padding: 8px 12px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
            margin-right: 5px;
        }
        .edit-button {
            background-color: #4CAF50; /* Hijau untuk edit */
        }
        .delete-button {
            background-color: #f44336; /* Merah untuk delete */
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Kendaraan</h1>
    <a href="form-kendaraan.php" style="display: block; margin-bottom: 20px; text-align: center; background-color: #800080; color: #fff; padding: 10px; text-decoration: none; border-radius: 5px;">Tambah Kendaraan</a>
    <a href="export.php" style="display: block; margin-bottom: 20px; text-align: center; background-color: #800080; color: #fff; padding: 10px; text-decoration: none; border-radius: 5px;">Cetak Data Kendaraan</a>
    <!-- Tampilkan data kendaraan dalam bentuk tabel -->
    <table>
        <thead>
            <tr>
                <th>ID Kendaraan</th>
                <th>Plat Nomor</th>
                <th>Jenis</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Menampilkan data untuk setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_kendaraan'] . "</td>";
                    echo "<td>" . $row['plat_nomor'] . "</td>";
                    echo "<td>" . $row['jenis'] . "</td>";
                    echo "<td>" . $row['status'] . "</td>";
                    echo "<td class='action-buttons'>";
                    echo "<a href='form-kendaraan.php?id_kendaraan=" . $row['id_kendaraan'] . "' class='edit-button'>Edit</a> ";
                    echo "<a href='hapus-kendaraan.php?id_kendaraan=" . $row['id_kendaraan'] . "' class='delete-button' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data kendaraan.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

</body>
</html>

<?php
// Tutup koneksi database
$conn->close();
?>
