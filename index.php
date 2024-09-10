<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Kendaraan</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        /* General body style */
        body {
            background-color: #f7f9fc;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
        }

        /* Navbar */
        .navbar {
            background-color: #007bff;
            padding: 1rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            color: white;
            font-size: 1.5rem;
        }

        .navbar-nav .nav-item .nav-link {
            color: white;
            font-size: 1rem;
            margin-right: 1rem;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-item .nav-link:hover {
            color: #ffdd57;
        }

        /* Footer */
        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
        }

        footer p {
            margin: 0;
            font-size: 1rem;
        }

        /* Custom Button */
        .btn-custom {
            background-color: #ffdd57;
            color: #007bff;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 25px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #007bff;
            color: white;
        }

        /* Log section (float right and styling) */
        .log {
            float: right;
            margin-right: 20px;
        }

        .log a {
            color: white;
            font-size: 1rem;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        .log a:hover {
            color: #ffdd57;
        }

        /* General reset for lists and anchor tags */
        ul, li, a {
            list-style-type: none;
            text-decoration: none;
        }

        /* Container styling */
        .content {
            padding: 20px;
            margin-top: 20px;
        }

        .content h1 {
            font-size: 2.5rem;
            color: #007bff;
            font-weight: bold;
            margin-bottom: 30px;
        }

        .content p {
            font-size: 1.2rem;
            color: #333;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="#">Monitoring Kendaraan</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Beranda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form-pengguna.php">Pengguna</a>
                </li>
    
                <li class="nav-item">
                    <a class="nav-link" href="form-kendaraan.php"> Kendaraan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="form-pemesanan.php">Pemesanan</a>
                </li>
                <li class="nav-item log">
                    <a href="login.php">Login</a>
                </li>
            </ul>
        </div>
    </nav>

    <!-- Content Section -->
    <div class="container content">
        <h1>Selamat Datang di Website Monitoring Kendaraan</h1>
        <p>
            Website ini dirancang untuk memonitor kendaraan Anda dengan lebih detail dan efisien. 
        <a href="form-pengguna.php" class="btn btn-custom">Mulai Sekarang</a>
    </div>

    <!-- Footer -->
    <footer>
        <p>© 2024 Monitoring Kendaraan. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
