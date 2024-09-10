<?php
$servername = "localhost";  
$username = "root";  
$password = "";  
$dbname = "monitoring";  
// Membuat koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

// Mengecek apakah koneksi berhasil
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
