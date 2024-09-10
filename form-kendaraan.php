<?php
// Sertakan file koneksi
include 'koneksi.php';

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Variabel untuk menyimpan data kendaraan jika ada ID kendaraan
$id_kendaraan = '';
$plat_nomor = '';
$jenis = '';
$status = '';

// Mengecek apakah ada ID kendaraan yang diteruskan untuk edit
if (isset($_GET['id_kendaraan'])) {
    $id_kendaraan = intval($_GET['id_kendaraan']);
    
    // Query untuk mengambil data kendaraan
    $query = "SELECT plat_nomor, jenis, status FROM kendaraan WHERE id_kendaraan = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param('i', $id_kendaraan);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        $plat_nomor = $data['plat_nomor'];
        $jenis = $data['jenis'];
        $status = $data['status'];
    } else {
        die("Data tidak ditemukan.");
    }
    $stmt->close();
}

// Proses form jika dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $plat_nomor = $_POST['plat_nomor'];
    $jenis = $_POST['jenis'];
    $status = $_POST['status'];
    
    if ($id_kendaraan) {
        // Update data kendaraan
        $query = "UPDATE kendaraan SET plat_nomor = ?, jenis = ?, status = ? WHERE id_kendaraan = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sssi', $plat_nomor, $jenis, $status, $id_kendaraan);
    } else {
        // Insert data kendaraan
        $query = "INSERT INTO kendaraan (plat_nomor, jenis, status) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param('sss', $plat_nomor, $jenis, $status);
    }
    
    if ($stmt->execute()) {
        header("Location: daftar-kendaraan.php");
    } else {
        echo "Terjadi kesalahan: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Kendaraan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #800080; /* Warna ungu */
            padding: 10px;
            color: #fff;
            text-align: center;
        }
        .navbar a {
            color: #fff;
            text-decoration: none;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #6a006a; /* Warna ungu gelap */
            border-radius: 5px;
        }
        .navbar a:hover {
            background-color: #4a004a; /* Warna ungu lebih gelap */
        }
        .container {
            width: 50%;
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
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            margin-bottom: 10px;
        }
        input, select {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #800080; /* Warna ungu */
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #6a006a; /* Warna ungu gelap */
        }
    </style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <a href="index.php">Home</a>
    <a href="daftar-kendaraan.php">Daftar Kendaraan</a>
</div>

<div class="container">
    <h1><?php echo $id_kendaraan ? 'Edit Kendaraan' : 'Tambah Kendaraan'; ?></h1>
    <form action="" method="post">
        
        <label for="plat_nomor">Plat Nomor:</label>
        <input type="text" id="plat_nomor" name="plat_nomor" value="<?php echo htmlspecialchars($plat_nomor); ?>" required>
        
        <label for="jenis">Jenis:</label>
        <input type="text" id="jenis" name="jenis" value="<?php echo htmlspecialchars($jenis); ?>" required>
        
        <label for="status">Status:</label>
        <select id="status" name="status" required>
            <option value="milik" <?php echo $status == 'milik' ? 'selected' : ''; ?>>Milik</option>
            <option value="sewa" <?php echo $status == 'sewa' ? 'selected' : ''; ?>>Sewa</option>
        </select>
        
        <button type="submit"><?php echo $id_kendaraan ? 'Update' : 'Tambah'; ?></button>
    </form>
</div>

</body>
</html>
