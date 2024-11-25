<?php
// Mulai sesi, jika ingin mengelola sesi pengguna (misalnya, memeriksa apakah pengguna sudah login)
session_start();

// Cek jika pengguna belum login, redirect ke halaman login
// if (!isset($_SESSION['username'])) {
//     header("Location: login.php");
//     exit();
// }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang Kota Pintar</title>
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
            line-height: 1.6;
            overflow-x: hidden; /* Menghindari scrollbar horizontal */
            height: 100vh;
        }

        /* Video Background */
        .video-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1; /* Membuat video berada di belakang konten */
        }

        /* Header styling */
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
            z-index: 1;
            position: relative;
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
    <!-- Video Background -->
    <video class="video-bg" src="2.mp4" autoplay muted loop></video>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="newlogo.png" alt="Logo Kota Pintar">
            <h1>KOTA <br><span>PINTAR</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="dashboard.php">Beranda</a></li>
                <li><a href="tentang.php" class="active">Tentang</a></li>
                <li><a href="layanan.php">Layanan</a></li>
                <li><a href="kontak.php">Kontak</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Tentang Kota Pintar</h2>
        <p>Kota Pintar adalah konsep kota masa depan yang menggabungkan teknologi untuk meningkatkan kualitas hidup warganya. Dengan layanan berbasis teknologi, Kota Pintar menciptakan lingkungan yang lebih efisien, aman, dan nyaman.</p>
        
        <!-- Visi dan Misi -->
        <section>
            <h3>Visi dan Misi</h3>
            <p>Visi kami adalah menjadikan kota ini sebagai tempat yang lebih pintar, dengan layanan yang memanfaatkan teknologi untuk kemudahan hidup sehari-hari. Misi kami adalah meningkatkan efisiensi, kenyamanan, dan keamanan dengan solusi berbasis teknologi untuk setiap warga kota.</p>
        </section>

        <!-- Tujuan -->
        <section>
            <h3>Tujuan</h3>
            <p>Melalui implementasi sistem teknologi yang inovatif, kami bertujuan untuk:</p>
            <ul>
                <li>Meningkatkan konektivitas antarwarga kota.</li>
                <li>Memberikan solusi transportasi yang efisien.</li>
                <li>Meningkatkan kualitas keamanan dan pemantauan lingkungan.</li>
                <li>Memfasilitasi akses informasi publik secara cepat dan akurat.</li>
            </ul>
        </section>

        <!-- Teknologi yang Digunakan -->
        <section>
            <h3>Teknologi yang Digunakan</h3>
            <p>Di Kota Pintar, kami memanfaatkan berbagai teknologi canggih, seperti IoT (Internet of Things), AI (Kecerdasan Buatan), dan big data untuk memberikan layanan terbaik kepada warga. Teknologi-teknologi ini membantu kami mengelola sumber daya kota dengan lebih efisien dan efektif.</p>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kota Pintar. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
