<?php
session_start();

// Cek apakah pengguna sudah login
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Kota Pintar</title>
    <link rel="stylesheet" href="style.css">
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
                <li><a href="dashboard.php">Dashboard</a></li>
                <li><a href="manage-files.php">Kelola File</a></li>
                <li><a href="manage-news.php">Kelola Berita</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Selamat Datang di Dashboard Admin</h2>
        <p>Anda dapat mengelola berbagai fitur Kota Pintar di sini.</p>

        <!-- Kelola Berita -->
        <section>
            <h3>Kelola Berita</h3>
            <a href="manage-news.php"><button class="popup-button">Kelola Berita</button></a>
        </section>

        <!-- Kelola File -->
        <section>
            <h3>Kelola File</h3>
            <a href="manage-files.php"><button class="popup-button">Kelola File</button></a>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Kota Pintar. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
