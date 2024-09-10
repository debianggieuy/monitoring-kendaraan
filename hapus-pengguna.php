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

// Mengambil ID pengguna dari query string
if (isset($_GET['id_user'])) {
    $id_user = intval($_GET['id_user']); // Pastikan ID adalah integer

    // Query untuk menghapus pengguna
    $sql = "DELETE FROM pengguna WHERE id_user = $id_user";

    if (mysqli_query($conn, $sql)) {
        echo "Pengguna dengan ID $id_user berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
} else {
    echo "ID pengguna tidak diberikan.";
}

// Menutup koneksi
mysqli_close($conn);
?>
