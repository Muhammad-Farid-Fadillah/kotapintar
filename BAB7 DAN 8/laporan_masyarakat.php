<?php
// Panggil file konfigurasi database
require_once 'config.php';

// Proses penghapusan data jika form dikirim
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['hapus_id'])) {
    $hapusId = $_POST['hapus_id'];
    try {
        $query = "DELETE FROM laporan WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $hapusId);
        $stmt->execute();
        // Redirect untuk memperbarui tampilan
        header("Location: laporan_masyarakat.php");
        exit;
    } catch (PDOException $e) {
        die("Gagal menghapus data: " . $e->getMessage());
    }
}

try {
    // Ambil semua laporan dari database
    $query = "SELECT * FROM laporan ORDER BY tanggal DESC";
    $stmt = $pdo->query($query);
    $laporanData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gagal mengambil data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Masyarakat</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        nav ul {
            list-style-type: none;
            padding: 0;
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }
        nav ul li {
            margin: 0 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        nav ul li a:hover {
            color: #0056b3;
        }
        .container {
            max-width: 800px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        .laporan-item {
            border-bottom: 1px solid #ddd;
            padding: 10px 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .laporan-item:last-child {
            border-bottom: none;
        }

        .laporan-item p {
            margin: 5px 0;
        }

        .laporan-item .tanggal {
            color: #888;
            font-size: 14px;
        }

        .laporan-item form {
            margin: 0;
        }

        .laporan-item button {
            background-color: #ff4d4d;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 4px;
            cursor: pointer;
        }

        .laporan-item button:hover {
            background-color: #e60000;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="manage-files.php">Kelola File</a></li>
            <li><a href="manage-news.php">Kelola Berita</a></li>
            <li><a href="laporan_masyarakat.php">Laporan Masyarakat</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    
    <div class="container">
        <h2>Daftar Laporan Masyarakat</h2>
        <!-- Tombol Cetak PDF -->
    <div style="text-align: right; margin-bottom: 20px;">
        <a href="cetak_pdf.php" target="_blank" style="
            background-color: #007bff; 
            color: white; 
            text-decoration: none; 
            padding: 10px 15px; 
            border-radius: 5px; 
            font-weight: bold;">
            Cetak PDF
        </a>
    </div>
        <?php if (!empty($laporanData)): ?>
            <?php foreach ($laporanData as $laporan): ?>
                <div class="laporan-item">
                    <div>
                        <p><strong>Nama:</strong> <?php echo htmlspecialchars($laporan['nama']); ?></p>
                        <p><strong>Laporan:</strong> <?php echo nl2br(htmlspecialchars($laporan['deskripsi'])); ?></p>
                        <p class="tanggal"><em>Tanggal: <?php echo date('d M Y, H:i', strtotime($laporan['tanggal'])); ?></em></p>
                    </div>
                    <form method="post">
                        <input type="hidden" name="hapus_id" value="<?php echo $laporan['id']; ?>">
                        <button type="submit">Hapus</button>
                    </form>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p>Tidak ada laporan yang tersedia saat ini.</p>
        <?php endif; ?>
    </div>
</body>
</html>
