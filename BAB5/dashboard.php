<?php
// Simulasi pengambilan berita dari database atau file
$beritaData = [
    [
        "title" => "Teknologi Baru untuk Smart City",
        "description" => "Inovasi baru hadir untuk mendukung transformasi digital di Kota Pintar.",
        "link" => "https://example.com/berita/1"
    ],
    [
        "title" => "Malang Terapkan Sistem Pemantauan Cerdas",
        "description" => "Kota Malang mulai menerapkan sensor cerdas untuk meningkatkan keamanan warga.",
        "link" => "https://example.com/berita/2"
    ],
    [
        "title" => "Smart City di Indonesia Meningkat",
        "description" => "Laporan terbaru menunjukkan pertumbuhan pesat penerapan Smart City di Indonesia.",
        "link" => "https://example.com/berita/3"
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kota Pintar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Reset dan global styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            color: white;
            position: relative;
            overflow-x: hidden;
            overflow-y: auto; /* Izinkan scroll secara vertikal */
        }

        /* Video Background */
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }

        /* Header styling */
        header {
            position: relative;
            z-index: 1;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(0, 0, 0, 0.7);
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
            font-size: 24px;
            letter-spacing: 2px;
            line-height: 1.2;
        }

        .logo span {
            color: #00aaff;
        }

        nav ul {
            list-style: none;
            display: flex;
        }

        nav ul li {
            margin: 0 20px;
        }

        nav ul li a {
            text-decoration: none;
            color: white;
            font-weight: bold;
            transition: color 0.3s ease-in-out;
            font-size: 18px;
        }

        nav ul li a:hover {
            color: #00aaff;
        }

        /* Main Content */
        main {
            text-align: center;
            padding: 100px 20px;
        }

        main h2 {
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        main h3 {
            font-size: 20px;
            line-height: 1.6;
            max-width: 800px;
            margin: 0 auto 40px auto;
        }

        /* Berita styling */
        #news-container {
            margin-top: 30px;
            text-align: left;
            background: rgba(255, 255, 255, 0.1);
            padding: 20px;
            border-radius: 10px;
        }

        .news-item {
            margin-bottom: 20px;
            padding: 10px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .news-item h4 {
            margin-bottom: 5px;
            font-size: 18px;
            color: #00aaff;
        }

        .news-item p {
            margin-bottom: 5px;
        }

        .news-item a {
            color: #00aaff;
            text-decoration: none;
            font-weight: bold;
        }

        .news-item a:hover {
            text-decoration: underline;
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
                <li><a href="#news">Berita</a></li>
                <li><a href="#community">Komunitas</a></li>
                <li><a href="login.php" class="login-btn">Admin</a></li>
            </ul>
        </nav>        
    </header>

    <!-- Main Content -->
    <main>
        <h2>Selamat Datang di Kota Pintar</h2>
        <h3>
            Smart City (Kota Pintar) adalah konsep pengelolaan kota yang memanfaatkan teknologi 
            informasi dan komunikasi (TIK) untuk meningkatkan efisiensi layanan publik, kualitas hidup warga, 
            serta keberlanjutan lingkungan. Bersama, mari wujudkan masa depan yang lebih cerah dan cerdas di Kota Malang.
        </h3>

        <!-- Kontainer berita -->
        <section id="news">
            <h3>Berita Terbaru</h3>
            <div id="news-container">
                <?php
                // Menampilkan berita dari array
                if (empty($beritaData)) {
                    echo '<p>Tidak ada berita untuk ditampilkan.</p>';
                } else {
                    foreach ($beritaData as $berita) {
                        echo '<div class="news-item">';
                        echo '<h4>' . htmlspecialchars($berita['title']) . '</h4>';
                        echo '<p>' . htmlspecialchars($berita['description']) . '</p>';
                        echo '<a href="' . htmlspecialchars($berita['link']) . '" target="_blank">Selengkapnya</a>';
                        echo '</div>';
                    }
                }
                ?>
            </div>
        </section>
    </main>

    <!-- JavaScript -->
    <script>
        // Simulasi data berita JSON jika diperlukan untuk interaktivitas tambahan di frontend
        const beritaData = [
            {
                "title": "Teknologi Baru untuk Smart City",
                "description": "Inovasi baru hadir untuk mendukung transformasi digital di Kota Pintar.",
                "link": "https://example.com/berita/1"
            },
            {
                "title": "Malang Terapkan Sistem Pemantauan Cerdas",
                "description": "Kota Malang mulai menerapkan sensor cerdas untuk meningkatkan keamanan warga.",
                "link": "https://example.com/berita/2"
            },
            {
                "title": "Smart City di Indonesia Meningkat",
                "description": "Laporan terbaru menunjukkan pertumbuhan pesat penerapan Smart City di Indonesia.",
                "link": "https://example.com/berita/3"
            }
        ];

        // Fungsi untuk memuat berita jika menggunakan API atau sumber eksternal
        async function loadNews() {
            const newsContainer = document.getElementById('news-container');
            try {
                // Simulasi pengambilan data (menggantikan fetch API)
                await new Promise(resolve => setTimeout(resolve, 5000)); // Simulasi loading

                // Hapus teks loading
                newsContainer.innerHTML = '';

                // Loop untuk menampilkan setiap berita
                beritaData.forEach(item => {
                    const newsItem = document.createElement('div');
                    newsItem.classList.add('news-item');
                    newsItem.innerHTML = `
                        <h4>${item.title}</h4>
                        <p>${item.description}</p>
                        <a href="${item.link}" target="_blank">Selengkapnya</a>
                    `;
                    newsContainer.appendChild(newsItem);
                });
            } catch (error) {
                // Tangani error
                newsContainer.innerHTML = '<p>Gagal memuat berita. Silakan coba lagi nanti.</p>';
                console.error('Error:', error);
            }
        }

        // Panggil fungsi loadNews setelah halaman selesai dimuat (optional jika menggunakan frontend JS)
        document.addEventListener('DOMContentLoaded', loadNews);
    </script>
</body>
</html>
