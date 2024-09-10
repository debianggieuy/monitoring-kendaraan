<?php
include 'koneksi.php'; // Pastikan koneksi ke database sudah benar

if (isset($_GET['id_pemesanan'])) {
    $id = $_GET['id_pemesanan'];
    $sql = "DELETE FROM pemesanan WHERE id_pemesanan='$id'";
    if ($koneksi->query($sql) === TRUE) {
        echo "Data berhasil dihapus.";
        header('Location: daftar-pemesanan.php');
    } else {
        echo "Error: " . $koneksi->error;
    }
} else {
    echo "ID pemesanan tidak ditemukan.";
}

$koneksi->close(); // Tutup koneksi
?>
