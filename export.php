<?php
// Import koneksi ke database
include 'koneksi.php';  // Pastikan file koneksi.php ada di folder yang sama
?>
<html>
<head>
    <title>MONITORING KENDARAAN</title>
    <!-- Tambahkan tag CSS dan JavaScript untuk DataTables di sini -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
</head>
<body>

<div class="container">
    <h2>MONITORING KENDARAAN</h2>
    <h4>(Inventory)</h4>
    <div class="data-tables datatable-dark">

        <!-- Tabel Daftar Kendaraan -->
        <h5>Daftar Kendaraan</h5>
        <table id="daftarKendaraan" class="table table-striped table-bordered">
            <thead>
                <tr>
                    <th>ID Kendaraan</th>
                    <th>Jenis</th>
                    <th>Plat Nomor</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Query untuk mengambil data dari tabel kendaraan
                $kendaraan = mysqli_query($conn, "SELECT * FROM kendaraan");
                if (!$kendaraan) {
                    die("Query gagal: " . mysqli_error($conn));
                }

                // Menampilkan data dari tabel kendaraan
                while ($row = mysqli_fetch_assoc($kendaraan)) {
                    echo "<tr>
                            <td>{$row['id_kendaraan']}</td>
                            <td>{$row['jenis']}</td>
                            <td>{$row['plat_nomor']}</td>
                            <td>{$row['status']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Inisialisasi DataTables dengan fitur Export -->
<script>
$(document).ready(function() {
    $('#daftarKendaraan').DataTable({
        dom: 'Bfrtip',  // Untuk menambahkan tombol di atas tabel
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
});
</script>

</body>
</html>

