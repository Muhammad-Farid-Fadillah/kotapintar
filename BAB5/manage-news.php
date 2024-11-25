<?php
// Simulasi pengecekan login
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php'); // Arahkan ke halaman login jika belum login
    exit();
}

// Menangani form tambah berita
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newsTitle'])) {
    // Ambil data dari form
    $title = $_POST['newsTitle'];
    $description = $_POST['newsDescription'];
    $link = $_POST['newsLink'];

    // Simulasi penyimpanan berita ke database (atau file)
    // Di sini kita hanya menyimpannya ke file atau session sebagai simulasi
    $_SESSION['news'][] = ['title' => $title, 'description' => $description, 'link' => $link];

    // Arahkan kembali ke halaman untuk refresh
    header('Location: manage-news.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita - Kota Pintar</title>
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
        <h2>Kelola Berita</h2>
        <p>Tambah atau hapus berita dari Kota Pintar.</p>

        <!-- Form untuk menambah berita -->
        <section>
            <h3>Tambah Berita</h3>
            <form method="POST">
                <label for="newsTitle">Judul Berita:</label>
                <input type="text" id="newsTitle" name="newsTitle" required>

                <label for="newsDescription">Deskripsi:</label>
                <textarea id="newsDescription" name="newsDescription" required></textarea>

                <label for="newsLink">Link Berita:</label>
                <input type="url" id="newsLink" name="newsLink" required>

                <button type="submit">Simpan Berita</button>
            </form>
        </section>

        <!-- Daftar Berita -->
        <section>
            <h3>Daftar Berita</h3>
            <?php if (isset($_SESSION['news']) && !empty($_SESSION['news'])): ?>
                <ul>
                    <?php foreach ($_SESSION['news'] as $index => $news): ?>
                        <li>
                            <h4><?php echo htmlspecialchars($news['title']); ?></h4>
                            <p><?php echo htmlspecialchars($news['description']); ?></p>
                            <a href="<?php echo htmlspecialchars($news['link']); ?>" target="_blank">Baca Selengkapnya</a>
                            <form method="POST" action="delete-news.php" style="display:inline;">
                                <input type="hidden" name="index" value="<?php echo $index; ?>">
                                <button type="submit">Hapus</button>
                            </form>
                        </li>
                    <?php endforeach; ?>
                </ul>
            <?php else: ?>
                <p>Tidak ada berita.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        <p>&copy; 2024 Kota Pintar. Semua Hak Dilindungi.</p>
    </footer>
</body>
</html>
