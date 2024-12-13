<?php
    // Start PHP session if needed
    // session_start();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Kota Pintar</title>
    <style>
        /* Reset dan global styling */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom, #1a1a1a, #333);
            color: white;
            line-height: 1.6;
        }

        /* Header styling */
        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 50px;
            background: rgba(0, 0, 0, 0.8);
            position: sticky;
            top: 0;
            z-index: 1000;
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

        nav ul li a.active,
        nav ul li a:hover {
            color: #00aaff;
        }

        /* Main Content */
        main {
            padding: 50px 20px;
            text-align: center;
        }

        main h2 {
            font-size: 36px;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
        }

        main p {
            font-size: 16px;
            margin-bottom: 40px;
        }

        /* Section Styling */
        section {
            margin-bottom: 50px;
            background: rgba(0, 0, 0, 0.7);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        section:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.8);
        }

        section h3 {
            font-size: 24px;
            margin-bottom: 15px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        section p {
            font-size: 14px;
            margin-bottom: 15px;
            line-height: 1.5;
        }

        section iframe,
        section video {
            border: none;
            margin-top: 10px;
            border-radius: 10px;
        }

        section button {
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: #00aaff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        section button:hover {
            background: #0077cc;
        }

        section a.button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            font-weight: bold;
            color: white;
            background: #00aaff;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        section a.button:hover {
            background: #0077cc;
        }

        /* Footer styling */
        footer {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 14px;
        }

        /* Responsif */
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                align-items: flex-start;
            }

            nav ul {
                flex-direction: column;
                gap: 10px;
            }

            main h2 {
                font-size: 28px;
            }

            section {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="logo">
            <img src="newlogo.png" alt="Logo Kota Pintar">
            <h1>KOTA <br><span>PINTAR</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Beranda</a></li>
                <li><a href="fitur.php">Fitur</a></li>
                <li><a href="data.php">Data</a></li>
                <li><a href="#community">Komunitas</a></li>
                <li><a href="login.php" class="login-btn">Admin</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Layanan Kota Pintar</h2>
        <p>Kami menyediakan berbagai layanan berbasis teknologi untuk memudahkan kehidupan warga dan meningkatkan efisiensi kota. Berikut adalah layanan unggulan kami:</p>
        
        <!-- Transportasi Cerdas -->
        <section>
            <h3>Transportasi Cerdas</h3>
            <p>Informasi real-time tentang jadwal bus, rute perjalanan, dan pelacakan kendaraan umum.</p>
            <iframe src="https://www.google.com/maps/embed" style="width: 100%; height: 300px; border: 0;" allowfullscreen="" loading="lazy"></iframe>
        </section>

        <!-- Keamanan Lingkungan -->
        <section>
            <h3>Keamanan Lingkungan</h3>
            <p>Pantau keamanan lingkungan Anda dengan layanan CCTV kota dan pelaporan online.</p>
            <button onclick="alert('Hubungi 112 untuk pelaporan darurat.')">Lapor Kejadian</button>
        </section>

        <!-- Informasi Publik -->
        <section>
            <h3>Informasi Publik</h3>
            <p>Prakiraan cuaca, kualitas udara, dan informasi acara kota tersedia untuk Anda.</p>
            <a class="weatherwidget-io" href="https://forecast7.com/en/n8d24112d72/malang/" data-label_1="MALANG" data-label_2="WEATHER" data-theme="original" >MALANG WEATHER</a>
            <script>
                !function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src='https://weatherwidget.io/js/widget.min.js';fjs.parentNode.insertBefore(js,fjs);}}(document,'script','weatherwidget-io-js');
            </script>
        </section>

        <!-- Integrasi Rumah Pintar -->
        <section>
            <h3>Integrasi Rumah Pintar</h3>
            <p>Optimalkan energi dan kenyamanan rumah Anda dengan teknologi kota pintar.</p>
            <video controls style="width: 100%; height: auto;">
                <source src="smart_home_demo.mp4" type="video/mp4">
                Browser Anda tidak mendukung video.
            </video>
        </section>

        <!-- Pendidikan Digital -->
        <section>
            <h3>Pendidikan Digital</h3>
            <p>Akses platform e-learning dan daftar kursus untuk meningkatkan pengetahuan Anda.</p>
            <a href="https://elearningkotapintar.com" target="_blank" class="button">Akses E-Learning</a>
        </section>
    </main>
    

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kota Pintar. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
