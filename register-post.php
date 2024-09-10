<?php
// Ambil data dari formulir
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validasi input
    if (empty($username) || empty($email) || empty($password)) {
        echo "Semua kolom wajib diisi!";
        exit();
    }

    // Koneksi ke database
    $servername = "localhost";
    $dbusername = "root";
    $dbpassword = ""; // Password MySQL, jika ada
    $dbname = "monitoring"; // Nama database yang sesuai

    // Membuat koneksi
    $conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Prepare statement untuk memeriksa apakah username atau email sudah ada
    $stmt = $conn->prepare("SELECT id_user FROM user WHERE username = ? OR email = ?");
    $stmt->bind_param("ss", $username, $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        echo "Username atau email sudah terdaftar. Silakan pilih yang lain.";
    } else {
        // Enkripsi password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        // Prepare statement untuk insert data ke tabel user
        $stmt = $conn->prepare("INSERT INTO user (username, email, password) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $username, $email, $hashed_password);

        if ($stmt->execute()) {
            // Tampilkan pesan sukses dan arahkan ke login
            echo "<script>alert('Registrasi berhasil! Anda akan diarahkan ke halaman login.');</script>";
            echo "<script>setTimeout(function(){ window.location.href = 'login.php'; }, 2000);</script>";
        } else {
            echo "Error: " . $stmt->error;
        }
    }

    // Tutup statement dan koneksi
    $stmt->close();
    $conn->close();
}
?>

