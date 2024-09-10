<?php
// Include file koneksi database
include 'koneksi.php'; 

// Pastikan request method adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // Periksa apakah koneksi ke database berhasil
    if (!isset($koneksi)) {
        die("Koneksi database tidak berhasil.");
    }

    // Ambil data dari form
    $id_user = $_POST['id_user'];
    $id_kendaraan = $_POST['id_kendaraan'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    // Periksa apakah id_kendaraan ada di tabel kendaraan
    $result = $koneksi->query("SELECT COUNT(*) as count FROM kendaraan WHERE id_kendaraan = $id_kendaraan");
    $row = $result->fetch_assoc();
    if ($row['count'] == 0) {
        die("ID Kendaraan tidak ditemukan.");
    }

    // Pastikan semua data dari form tidak kosong
    if (!empty($id_user) && !empty($id_kendaraan) && !empty($tanggal) && !empty($status)) {

        // Cek apakah ini update pemesanan (apakah terdapat id_pemesanan)
        if (isset($_POST['id_pemesanan'])) {
            $id_pemesanan = $_POST['id_pemesanan'];

            // Query untuk update pemesanan
            $query = "UPDATE pemesanan SET id_user = ?, id_kendaraan = ?, tanggal = ?, status = ? WHERE id_pemesanan = ?";
            $stmt = $koneksi->prepare($query);

            // Periksa jika prepare statement gagal
            if ($stmt === false) {
                die("Prepare failed: " . $koneksi->error);
            }

            // Bind parameter untuk update pemesanan
            $stmt->bind_param("iisss", $id_user, $id_kendaraan, $tanggal, $status, $id_pemesanan);
        } else {

            // Query untuk insert pemesanan baru
            $query = "INSERT INTO pemesanan (id_user, id_kendaraan, tanggal, status) VALUES (?, ?, ?, ?)";
            $stmt = $koneksi->prepare($query);

            // Periksa jika prepare statement gagal
            if ($stmt === false) {
                die("Prepare failed: " . $koneksi->error);
            }

            // Bind parameter untuk insert pemesanan baru
            $stmt->bind_param("iiss", $id_user, $id_kendaraan, $tanggal, $status);
        }

        // Eksekusi statement
        if ($stmt->execute()) {
            // Redirect ke halaman daftar pemesanan setelah berhasil
            header('Location: daftar-pemesanan.php');
            exit();
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Semua field harus diisi!";
    }
}
?>
