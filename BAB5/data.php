<?php
// Mengaktifkan sesi untuk penggunaan variabel dinamis jika diperlukan
session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kota Pintar</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body { font-family: 'Arial', sans-serif; color: white; line-height: 1.6; overflow-x: hidden; }

        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(0, 0, 0, 0.7);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .logo { display: flex; align-items: center; }
        .logo img { width: 60px; height: auto; margin-right: 15px; }
        .logo h1 { font-size: 24px; letter-spacing: 2px; line-height: 1.2; }
        .logo span { color: #00aaff; }

        nav ul {
            list-style: none;
            display: flex;
        }
        nav ul li { margin: 0 20px; }
        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
            font-size: 18px;
        }
        nav ul li a.active,
        nav ul li a:hover { color: #00aaff; }

        main {
            padding: 50px 20px;
            text-align: center;
        }

        main h2 { font-size: 36px; margin-bottom: 20px; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7); }
        main p { font-size: 16px; margin-bottom: 40px; }

        section {
            margin-bottom: 50px;
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        section:hover { transform: translateY(-10px); box-shadow: 0 15px 30px rgba(0, 0, 0, 0.8); }

        section h3 { font-size: 24px; margin-bottom: 15px; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5); }
        section p { font-size: 14px; margin-bottom: 15px; line-height: 1.5; }

        footer {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            header { flex-direction: column; align-items: flex-start; }
            nav ul { flex-direction: column; gap: 10px; }
            main h2 { font-size: 28px; }
            section { padding: 20px; }
        }
    </style>
</head>
<body>
    <video class="video-bg" src="2.mp4" autoplay muted loop></video>

    <header>
        <div class="logo">
            <img src="newlogo.png" alt="Logo Kota Pintar">
            <h1>KOTA <br><span>PINTAR</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Beranda</a></li>
                <li><a href="tentang.php">Tentang</a></li>
                <li><a href="layanan.php">Layanan</a></li>
                <li><a href="data.php" class="active">Data</a></li>
                <li><a href="kontak.php">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Data Kota Pintar</h2>
        <p>Berikut adalah data-data penting yang terkait dengan kota pintar:</p>

        <?php
        // Data untuk kategori yang ada
        $sections = [
            ["title" => "Statistik Populasi", "description" => "Jumlah penduduk yang tinggal di kota pintar, dengan perincian berdasarkan usia, jenis kelamin, dan pekerjaan."],
            ["title" => "Data Transportasi", "description" => "Informasi tentang penggunaan kendaraan umum, lalu lintas, dan infrastruktur transportasi."],
            ["title" => "Data Lingkungan", "description" => "Data kualitas udara, suhu, dan kelembapan serta laporan lingkungan lainnya."],
            ["title" => "Statistik Keamanan", "description" => "Data kejahatan dan laporan keamanan di sekitar kota."]
        ];

        // Loop untuk menampilkan data setiap kategori
        foreach ($sections as $section) {
            echo "<section>
                    <h3>{$section['title']}</h3>
                    <p>{$section['description']}</p>
                  </section>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Kota Pintar. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
