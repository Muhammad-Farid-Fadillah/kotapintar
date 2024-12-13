<?php
// Panggil file konfigurasi database
require_once 'config.php';

try {
    // Ambil berita dari tabel `news` di database
    $query = "SELECT title, description, link FROM news ORDER BY id DESC";
    $stmt = $pdo->query($query);
    $beritaData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Gagal mengambil data: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kota Pintar</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: linear-gradient(135deg, #1a2a6c, #b21f1f, #fdbb2d);
            color: white;
            overflow-x: hidden;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
            filter: brightness(50%);
        }

        header {
            background: rgba(0, 0, 0, 0.7);
            padding: 20px 50px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.5);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 60px;
            height: auto;
            margin-right: 15px;
        }

        .logo h1 {
            font-size: 28px;
            letter-spacing: 1px;
            margin: 0;
            font-weight: 500;
        }

        .logo span {
            color: #00aaff;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin-left: 25px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        nav ul li a:hover {
            color: #00aaff;
            transform: scale(1.1);
        }

        main {
            text-align: center;
            padding: 80px 20px;
            z-index: 10;
        }

        main h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #00aaff;
            font-weight: 600;
        }

        #news-container {
            margin: 50px auto;
            padding: 30px;
            max-width: 800px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        .news-item {
            margin-bottom: 25px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
            padding-bottom: 10px;
            transition: transform 0.3s ease;
        }

        .news-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .news-item h4 {
            color: #00aaff;
            font-size: 24px;
            margin-bottom: 10px;
            font-weight: 500;
        }

        .news-item p {
            color: white;
            font-size: 16px;
            margin-bottom: 15px;
            line-height: 1.6;
        }

        .news-item a {
            color: #00aaff;
            font-weight: bold;
            text-decoration: none;
            font-size: 18px;
            transition: color 0.3s ease, transform 0.3s ease;
        }

        .news-item a:hover {
            color: white;
            transform: scale(1.1);
        }

        footer {
            text-align: center;
            padding: 20px;
            background: rgba(0, 0, 0, 0.8);
            color: white;
            font-size: 14px;
        }

        /* Responsiveness */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                text-align: center;
            }

            nav ul {
                flex-direction: column;
                margin-top: 20px;
            }

            nav ul li {
                margin-left: 0;
                margin-top: 10px;
            }

            .logo h1 {
                font-size: 24px;
            }

            #news-container {
                padding: 15px;
                margin: 20px;
                max-width: 100%;
            }

            .news-item h4 {
                font-size: 20px;
            }

            main h2 {
                font-size: 28px;
            }
        }
    </style>
</head>
<body>
    <!-- Video Background -->
    <video class="video-bg" src="malang.mp4" autoplay muted loop></video>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="newlogo.png" alt="Logo Kota Pintar">
            <h1>KOTA <br><span>PINTAR</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="fitur.php">Fitur</a></li>
                <li><a href="data.php">Data</a></li>
                <li><a href="layanan.php">Layanan</a></li>
                <li><a href="#community">Komunitas</a></li>
                <li><a href="login.php" class="login-btn">Admin</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Selamat Datang di Kota Pintar</h2>
        <p>
            Smart City (Kota Pintar) adalah konsep pengelolaan kota yang memanfaatkan teknologi informasi dan komunikasi 
            (TIK) untuk meningkatkan efisiensi layanan publik, kualitas hidup warga, serta keberlanjutan lingkungan.
        </p>

        <!-- Berita -->
        <div id="news-container">
            <h2>Berita Terbaru</h2>
            <?php if (!empty($beritaData)): ?>
                <?php foreach ($beritaData as $berita): ?>
                    <div class="news-item">
                        <h4><?php echo htmlspecialchars($berita['title']); ?></h4>
                        <p><?php echo htmlspecialchars($berita['description']); ?></p>
                        <a href="<?php echo htmlspecialchars($berita['link']); ?>" target="_blank">Baca Selengkapnya</a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Tidak ada berita yang tersedia saat ini.</p>
            <?php endif; ?>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kota Pintar. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
