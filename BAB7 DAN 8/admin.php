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
</head>
<body>
<style>
body {
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    background-color: #f8f9fa;
    color: #495057;
    margin: 0;
    padding: 20px;
}
.logo img {
    width: 120px; /* Ukuran logo */
    margin-right: 10px;
}

.logo h1 {
    color: rgb(32, 29, 29);
    font-size: 28px;
    margin: 0;
}

header {
    color: #ffffff;
    padding: 20px;
    text-align: center;
}

header h1 {
    margin: 0;
}

h1, h2 {
    color: #007bff;
    text-align: center;
}

nav ul {
    list-style-type: none;
    padding: 0;
    display: flex;
    justify-content: center;
    margin-bottom: 20px;
}

nav ul li {
    margin: 0 15px;
}

nav ul li a {
    text-decoration: none;
    color: #007bff;
    font-weight: bold;
}

nav ul li a:hover {
    color: #0056b3;
}

section {
    background-color: #fff;
    padding: 15px;
    border-radius: 8px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

section h3 {
    margin-top: 0;
}

button {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 15px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

button:hover {
    background-color: #0056b3;
}

footer {
    text-align: center;
    margin-top: 20px;
    font-size: 14px;
    color: #6c757d;
}
</style>

    <!-- Header -->
    <header>
        <div class="logo">
            <img src="newlogo.png" alt="Logo Kota Pintar">
            <h1>KOTA <br><span>PINTAR</span></h1>
        </div>
        <nav>
            <ul>
                <li><a href="manage-files.php">Kelola File</a></li>
                <li><a href="manage-news.php">Kelola Berita</a></li>
                <li><a href="laporan_masyarakat.php">laporan masyarakat</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main>
        <h2>Selamat Datang di Dashboard Admin</h2>

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
