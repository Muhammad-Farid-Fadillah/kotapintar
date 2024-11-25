<?php
    // Start the session (if needed, for user login or other session-based actions)
    // session_start(); 
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fitur Kota Pintar</title>
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
            overflow-x: hidden; /* Disable horizontal scroll */
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
            animation: fadeIn 1.5s ease-in-out;
        }

        main .features {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            margin-top: 50px;
        }

        .feature-card {
            background: rgba(0, 0, 0, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.2);
            padding: 20px;
            width: 250px;
            border-radius: 10px;
            text-align: center;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
        }

        .feature-card i {
            font-size: 50px;
            margin-bottom: 15px;
            color: #00aaff;
        }

        .feature-card h3 {
            font-size: 20px;
            margin-bottom: 10px;
            text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.5);
        }

        .feature-card p {
            font-size: 14px;
            line-height: 1.5;
        }

        /* Footer */
        footer {
            background: rgba(0, 0, 0, 0.8);
            padding: 20px;
            text-align: center;
            color: white;
            font-size: 14px;
        }

        /* Responsif */
        @media (max-width: 768px) {
            main h2 {
                font-size: 28px;
            }

            .feature-card {
                width: 90%;
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
                <li><a href="dashboard.php">Beranda</a></li>
                <li><a href="#data">Data</a></li>
                <li><a href="Layanan.php">Layanan</a></li>
                <li><a href="#news">Berita</a></li>
                <li><a href="#community">Komunitas</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Fitur Unggulan Kota Pintar</h2>
        <div class="features">
            <div class="feature-card">
                <i class="fas fa-map-marked-alt"></i>
                <h3>Peta Interaktif</h3>
                <p>Memudahkan pencarian lokasi penting seperti fasilitas kesehatan, transportasi, dan area publik.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-bus"></i>
                <h3>Smart Transport</h3>
                <p>Sistem informasi transportasi real-time untuk mengatur perjalanan Anda dengan efisien.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-trash-alt"></i>
                <h3>Manajemen Sampah</h3>
                <p>Pantau jadwal pengumpulan sampah dan pelaporan masalah kebersihan kota.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-lightbulb"></i>
                <h3>Efisiensi Energi</h3>
                <p>Sistem pengelolaan energi untuk mengurangi konsumsi dan meningkatkan keberlanjutan.</p>
            </div>
            <div class="feature-card">
                <i class="fas fa-users"></i>
                <h3>Partisipasi Warga</h3>
                <p>Platform pelaporan dan diskusi untuk meningkatkan keterlibatan masyarakat.</p>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        &copy; 2024 Kota Pintar. All rights reserved.
    </footer>
</body>
</html>
