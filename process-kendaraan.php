<?php
// Koneksi ke database
$servername = "localhost";
$username = "root"; // Default username XAMPP
$password = ""; // Default password XAMPP biasanya kosong
$dbname = "monitoring"; // Ganti dengan nama database yang Anda gunakan

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Periksa koneksi
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Menangani data form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_kendaraan = isset($_POST['id_kendaraan']) ? intval($_POST['id_kendaraan']) : null;
    $plat_nomor = $_POST['plat_nomor'];
    $jenis = $_POST['jenis'];
    $status = $_POST['status'];

    if ($id_kendaraan) {
        // Edit kendaraan
        $sql = "UPDATE kendaraan SET plat_nomor='$plat_nomor', jenis='$jenis', status='$status' WHERE id_kendaraan=$id_kendaraan";
    } else {
        // Tambah kendaraan
        $sql = "INSERT INTO kendaraan (plat_nomor, jenis, status) VALUES ('$plat_nomor', '$jenis', '$status')";
    }

    if (mysqli_query($conn, $sql)) {
        echo "Data kendaraan berhasil " . ($id_kendaraan ? "diperbarui." : "ditambahkan.");
        // Redirect ke daftar kendaraan setelah berhasil
        header("Location: daftar-kendaraan.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}

// Menutup koneksi
mysqli_close($conn);
?>

