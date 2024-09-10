<?php
// Sertakan file koneksi
include 'koneksi.php';  // Pastikan jalur file koneksi.php benar

// Escape input untuk mencegah SQL Injection
$id_user = mysqli_real_escape_string($conn, $_POST['id_user']);
$nama = mysqli_real_escape_string($conn, $_POST['nama']);
$nomor_telepon = mysqli_real_escape_string($conn, $_POST['nomor_telepon']);
$alamat = mysqli_real_escape_string($conn, $_POST['alamat']);

// Cek apakah id_user ada untuk menentukan apakah melakukan update atau insert
if (isset($_POST['edit_pengguna'])) {
    // Update
    $query = "UPDATE pengguna SET nama='$nama', nomor_telepon='$nomor_telepon', alamat='$alamat' WHERE id_user='$id_user'";
} else {
    // Insert
    $query = "INSERT INTO pengguna (nama, nomor_telepon, alamat) VALUES ('$nama', '$nomor_telepon', '$alamat')";
}

if ($conn->query($query) === TRUE) {
    echo "Data berhasil disimpan!";
    header("Location: daftar-pengguna.php"); // Redirect ke daftar pengguna setelah berhasil
    exit();
} else {
    echo "Error: " . $query . "<br>" . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
