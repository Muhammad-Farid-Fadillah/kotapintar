<?php

// Sertakan file koneksi database
include('config.php');

// Sertakan library Dompdf
// 1. Pastikan file autoload.inc.php ditemukan
if (file_exists('dompdf/autoload.inc.php')) {
    require_once('dompdf/autoload.inc.php');
    echo 'Dompdf berhasil diload!';
} else {
    die('File autoload.inc.php tidak ditemukan!');
}
exit;





use Dompdf\Dompdf;

// Inisialisasi Dompdf
$dompdf = new Dompdf();

// Query untuk mengambil data laporan
$query = mysqli_query($koneksi, "SELECT * FROM laporan");

// Membuat template HTML untuk laporan
$html = '<center><h3>Data Laporan</h3></center><hr/><br>';
$html .= '<table border="1" width="100%" cellspacing="0" cellpadding="5">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Deskripsi</th>
                <th>Tanggal Pelaporan</th>
            </tr>';

$no = 1;
while ($laporan = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . htmlspecialchars($laporan['nama']) . "</td>
                <td>" . htmlspecialchars($laporan['deskripsi']) . "</td>
                <td>" . date('d-m-Y H:i', strtotime($laporan['tanggal'])) . "</td>
            </tr>";
    $no++;
}
$html .= "</table>";

// Muat HTML ke Dompdf
$dompdf->loadHtml($html);

// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'portrait');

// Render HTML menjadi PDF
$dompdf->render();

// Output file PDF ke browser
$dompdf->stream('laporan-masyarakat.pdf');
?>
