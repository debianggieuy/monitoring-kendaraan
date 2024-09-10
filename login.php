<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #6200ea; /* Warna latar belakang ungu */
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh; /* Mengatur tinggi body agar penuh layar */
            margin: 0; /* Menghilangkan margin default */
            color: #fff; /* Warna teks putih untuk kontras dengan latar belakang ungu */
        }

        .container {
            background: #ffffff; /* Warna latar belakang putih untuk formulir */
            padding: 30px; /* Jarak di dalam kontainer */
            border-radius: 8px; /* Sudut melengkung pada kontainer */
            box-shadow: 0 4px 8px rgba(0,0,0,0.2); /* Bayangan lebih menonjol di sekitar kontainer */
            width: 100%;
            max-width: 360px; /* Lebar maksimal kontainer */
            text-align: center; /* Menyusun teks di tengah */
        }

        h2 {
            margin-top: 0; /* Menghilangkan margin atas */
            font-size: 26px; /* Ukuran font untuk judul */
            color: #333; /* Warna teks gelap untuk judul */
        }

        form {
            display: flex;
            flex-direction: column; /* Menyusun elemen form secara vertikal */
            gap: 15px; /* Jarak antara elemen form */
        }

        label {
            font-size: 14px; /* Ukuran font untuk label */
            color: #555; /* Warna teks label yang lebih terang */
            margin-bottom: 5px; /* Jarak bawah label */
            text-align: left; /* Menyusun teks label ke kiri */
        }

        input[type="text"], 
        input[type="password"] {
            padding: 12px; /* Jarak di dalam input field */
            border: 1px solid #ddd; /* Garis batas abu-abu terang */
            border-radius: 4px; /* Sudut melengkung pada input field */
            font-size: 16px; /* Ukuran font di dalam input field */
            width: 100%; /* Lebar input field penuh kontainer */
        }

        input[type="submit"] {
            background-color: #6200ea; /* Warna ungu untuk tombol submit */
            color: white; /* Warna teks tombol putih */
            border: none; /* Menghilangkan batas tombol */
            padding: 12px; /* Jarak di dalam tombol */
            border-radius: 4px; /* Sudut melengkung pada tombol */
            font-size: 16px; /* Ukuran font untuk teks tombol */
            cursor: pointer; /* Menunjukkan bahwa tombol dapat diklik */
            box-shadow: 0 4px 6px rgba(0,0,0,0.2); /* Bayangan untuk efek timbul */
            transition: background-color 0.2s, box-shadow 0.2s; /* Efek transisi saat hover */
        }

        input[type="submit"]:hover {
            background-color: #3700b3; /* Warna ungu lebih gelap saat hover */
            box-shadow: 0 6px 8px rgba(0,0,0,0.3); /* Bayangan lebih dalam saat hover */
        }

        p {
            margin-top: 15px; /* Jarak atas paragraf */
            font-size: 14px; /* Ukuran font untuk paragraf */
        }

        a {
            color: #6200ea; /* Warna ungu yang sama dengan tombol untuk link */
            text-decoration: none; /* Menghilangkan garis bawah pada link */
            font-weight: bold; /* Teks link ditebalkan */
        }

        a:hover {
            text-decoration: underline; /* Menambahkan garis bawah saat hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <form action="login-post.php" method="POST">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Username" required>
            
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Password" required>
            
            <input type="submit" value="Login">
        </form>
        <p>Belum punya akun? <a href="register.php">Register</a></p>
    </div>
</body>
</html>
