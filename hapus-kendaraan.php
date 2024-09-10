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

// Mengambil ID kendaraan dari query string
if (isset($_GET['id_kendaraan'])) {
    $id_kendaraan = intval($_GET['id_kendaraan']); // Pastikan ID adalah integer

    // Hapus semua pemesanan yang menggunakan kendaraan ini
    $sql_delete_pemesanan = "DELETE FROM pemesanan WHERE id_kendaraan = $id_kendaraan";
    mysqli_query($conn, $sql_delete_pemesanan);

    // Query untuk menghapus kendaraan
    $sql_delete_kendaraan = "DELETE FROM kendaraan WHERE id_kendaraan = $id_kendaraan";
    if (mysqli_query($conn, $sql_delete_kendaraan)) {
        header("Location: daftar-kendaraan.php"); // Redirect setelah penghapusan
        exit();
    } else {
        echo "Error: " . $sql_delete_kendaraan . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID kendaraan tidak diberikan.";
}

// Tutup koneksi
mysqli_close($conn);
?>
