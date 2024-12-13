<?php
require 'config.php'; // Pastikan file ini tersedia dan dapat diakses

// Menangani form tambah berita
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['newsTitle'];
    $description = $_POST['newsDescription'];
    $link = $_POST['newsLink'];

    if (!empty($title) && !empty($description) && !empty($link)) {
        $stmt = $pdo->prepare("INSERT INTO news (title, description, link) VALUES (:title, :description, :link)");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':link', $link);
        $stmt->execute();
        $message = "Berita berhasil ditambahkan!";
    } else {
        $message = "Semua field harus diisi!";
    }
}

// Ambil semua data berita
try {
    $stmt = $pdo->query("SELECT * FROM news ORDER BY id DESC");
    $newsData = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage News</title>
    <style>
        /* Reset dan Global Styling */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Arial', sans-serif;
    background-color: #192a3b;
    color: white;
    line-height: 1.6;
}

/* Header Styling */
header {
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

/* Main Content Styling */
main {
    padding: 50px;
    text-align: center;
}

main h2 {
    font-size: 36px;
    margin-bottom: 20px;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
}

main p {
    margin-bottom: 40px;
    font-size: 18px;
}

/* Form Styling */
form {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    margin: 20px auto;
    max-width: 600px;
}

form label {
    display: block;
    margin-bottom: 10px;
    font-weight: bold;
}

form input,
form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: 5px;
    background: rgba(255, 255, 255, 0.1);
    color: white;
}

form button {
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    background: #00aaff;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
    transition: background 0.3s ease-in-out;
}

form button:hover {
    background: #0088cc;
}

/* Berita List Styling */
.news-container {
    background: rgba(255, 255, 255, 0.1);
    padding: 20px;
    border-radius: 10px;
    margin: 20px auto;
    max-width: 800px;
}

.news-item {
    border-bottom: 1px solid rgba(255, 255, 255, 0.2);
    padding: 10px 0;
}

.news-item h4 {
    color: #00aaff;
    margin-bottom: 5px;
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

/* Footer Styling */
footer {
    background: rgba(0, 0, 0, 0.7);
    padding: 20px;
    text-align: center;
    color: white;
    margin-top: 40px;
}
    </style>
</head>
<body>
    <h1>Kelola Berita</h1>
    <?php if (isset($message)): ?>
        <p><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <form method="POST" action="">
        <label for="newsTitle">Judul Berita:</label><br>
        <input type="text" id="newsTitle" name="newsTitle" required><br><br>

        <label for="newsDescription">Deskripsi Berita:</label><br>
        <textarea id="newsDescription" name="newsDescription" required></textarea><br><br>

        <label for="newsLink">Link Berita:</label><br>
        <input type="url" id="newsLink" name="newsLink" required><br><br>

        <button type="submit">Tambah Berita</button>
    </form>

    <h2>Daftar Berita</h2>
    <?php if (!empty($newsData)): ?>
        <ul>
            <?php foreach ($newsData as $news): ?>
                <li>
                    <strong><?php echo htmlspecialchars($news['title']); ?></strong><br>
                    <?php echo htmlspecialchars($news['description']); ?><br>
                    <a href="<?php echo htmlspecialchars($news['link']); ?>" target="_blank">Baca Selengkapnya</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else: ?>
        <p>Tidak ada berita yang tersedia.</p>
    <?php endif; ?>
</body>
</html>
