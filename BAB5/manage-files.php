<?php
// Simulasi pengecekan login
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php'); // Arahkan ke halaman login jika belum login
    exit();
}

// Menangani unggahan file
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $file = $_FILES['file'];

    // Validasi file (misalnya hanya file gambar yang diterima)
    if ($file['error'] == 0) {
        $uploadDir = 'uploads/';
        $uploadFile = $uploadDir . basename($file['name']);
        
        if (move_uploaded_file($file['tmp_name'], $uploadFile)) {
            echo '<p>File berhasil diunggah: ' . $file['name'] . '</p>';
        } else {
            echo '<p>Terjadi kesalahan saat mengunggah file.</p>';
        }
    } else {
        echo '<p>Terjadi kesalahan saat mengunggah file.</p>';
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola File - Kota Pintar</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
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

    <main>
        <h2>Kelola File</h2>
        <p>Unggah file yang diperlukan untuk Kota Pintar.</p>

        <!-- Form pengelolaan file -->
        <section>
            <form method="POST" enctype="multipart/form-data">
                <label for="file">Pilih file untuk diunggah:</label>
                <input type="file" name="file" id="file" required>
                <button type="submit">Unggah File</button>
            </form>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Kota Pintar. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
