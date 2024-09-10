<?php
// Ambil data dari formulir
$username = $_POST['username'];
$password = $_POST['password'];

// Koneksi ke database
$servername = "localhost";
$dbusername = "root";
$dbpassword = ""; // Password MySQL, jika ada
$dbname = "monitoring"; // Nama database yang sesuai

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare statement untuk memeriksa username
$stmt = $conn->prepare("SELECT password FROM user WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$stmt->store_result();

// Cek apakah username ada
if ($stmt->num_rows === 1) {
    // Bind result dan fetch data
    $stmt->bind_result($hashed_password);
    $stmt->fetch();

    // Verifikasi password
    if (password_verify($password, $hashed_password)) {
        // Password benar, login berhasil
        session_start();
        $_SESSION['username'] = $username; // Simpan username di session
        header("Location: index.php"); // Redirect ke halaman utama
        exit();
    } else {
        // Password salah
        echo "Username atau password salah.";
    }
} else {
    // Username tidak ditemukan
    echo "Username tidak ditemukan.";
}

// Tutup statement dan koneksi
$stmt->close();
$conn->close();
?>
