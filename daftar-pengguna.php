<?php
// Sertakan file koneksi
include 'koneksi.php';

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data pengguna
$query = "SELECT id_user, nama, nomor_telepon, alamat FROM pengguna";
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
    <title>Daftar Pengguna</title>
    <style>
        /* CSS untuk daftar pengguna */
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
        .add-button {
            display: block;
            margin-bottom: 20px;
            text-align: center;
            background-color: #800080; /* Warna ungu */
            color: #fff;
            padding: 10px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Daftar Pengguna</h1>
    <a href="form-pengguna.php" class="add-button">Tambah Pengguna</a>

    <!-- Tampilkan data pengguna dalam bentuk tabel -->
    <table>
        <thead>
            <tr>
                <th>ID Pengguna</th>
                <th>Nama</th>
                <th>Nomor Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Menampilkan data untuk setiap baris
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id_user']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['nomor_telepon']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['alamat']) . "</td>";
                    echo "<td class='action-buttons'>";
                    echo "<a href='form-pengguna.php?id_user=" . urlencode($row['id_user']) . "' class='edit-button'>Edit</a> ";
                    echo "<a href='hapus-pengguna.php?id_user=" . urlencode($row['id_user']) . "' class='delete-button' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\");'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data pengguna.</td></tr>";
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
