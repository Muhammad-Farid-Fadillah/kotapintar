<?php
require 'config.php'; // Pastikan file ini tersedia dan dapat diakses

// Menangani form tambah/edit berita
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['newsTitle'];
    $description = $_POST['newsDescription'];
    $link = $_POST['newsLink'];
    $id = $_POST['newsId'] ?? null;

    if (!empty($title) && !empty($description) && !empty($link)) {
        if ($id) {
            // Jika ID ada, update berita
            $stmt = $pdo->prepare("UPDATE news SET title = :title, description = :description, link = :link WHERE id = :id");
            $stmt->bindParam(':id', $id);
        } else {
            // Jika ID tidak ada, tambah berita baru
            $stmt = $pdo->prepare("INSERT INTO news (title, description, link) VALUES (:title, :description, :link)");
        }
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':link', $link);
        $stmt->execute();
        $message = $id ? "Berita berhasil diperbarui!" : "Berita berhasil ditambahkan!";
    } else {
        $message = "Semua field harus diisi!";
    }
}

// Menangani penghapusan berita
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM news WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();
    $message = "Berita berhasil dihapus!";
}

// Ambil semua data berita
$stmt = $pdo->query("SELECT * FROM news ORDER BY id DESC");
$newsData = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Pastikan $newsData diisi sebelum digunakan
if (!isset($newsData) || empty($newsData)) {
    $newsData = []; // Atur sebagai array kosong jika tidak ada data
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            margin: 0;
            padding: 20px;
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
            margin: 0 10px;
        }
        nav ul li a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
        }
        nav ul li a:hover {
            color: #0056b3;
        }
        .message {
            background-color: #e0ffe0;
            border: 1px solid #4caf50;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            max-width: 600px;
            margin-left: auto;
            margin-right: auto;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input, form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }
        form button:hover {
            background-color: #0056b3;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table th {
            background-color: #007bff;
            color: #ffffff;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        table a {
            text-decoration: none;
            color: #007bff;
        }
        table a:hover {
            text-decoration: underline;
        }
        .action-links {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
    </style>
</head>
<body>
    <h1>Kelola Berita</h1>
    <nav>
        <ul>
                <li><a href="manage-files.php">Kelola File</a></li>
                <li><a href="manage-news.php">Kelola Berita</a></li>
                <li><a href="laporan_masyarakat.php">laporan masyarakat</a></li>
                <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
    <?php if (isset($message)): ?>
        <div class="message"><?php echo htmlspecialchars($message); ?></div>
    <?php endif; ?>
    <form method="POST" action="">
        <input type="hidden" name="newsId" value="<?php echo isset($_GET['edit']) ? htmlspecialchars($_GET['edit']) : ''; ?>">
        <label for="newsTitle">Judul Berita:</label>
        <input type="text" id="newsTitle" name="newsTitle" value="<?php echo isset($_GET['edit']) ? htmlspecialchars($newsData[array_search($_GET['edit'], array_column($newsData, 'id'))]['title']) : ''; ?>" required>
        <label for="newsDescription">Deskripsi Berita:</label>
        <textarea id="newsDescription" name="newsDescription" required><?php echo isset($_GET['edit']) ? htmlspecialchars($newsData[array_search($_GET['edit'], array_column($newsData, 'id'))]['description']) : ''; ?></textarea>
        <label for="newsLink">Link Berita:</label>
        <input type="url" id="newsLink" name="newsLink" value="<?php echo isset($_GET['edit']) ? htmlspecialchars($newsData[array_search($_GET['edit'], array_column($newsData, 'id'))]['link']) : ''; ?>" required>
        <button type="submit"><?php echo isset($_GET['edit']) ? 'Update' : 'Tambah'; ?> Berita</button>
    </form>

    <h2>Daftar Berita</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Link</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($newsData)): ?>
                <?php foreach ($newsData as $news): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($news['id']); ?></td>
                        <td><?php echo htmlspecialchars($news['title']); ?></td>
                        <td><?php echo htmlspecialchars($news['description']); ?></td>
                        <td><a href="<?php echo htmlspecialchars($news['link']); ?>" target="_blank">Baca</a></td>
                        <td class="action-links">
                            <a href="?edit=<?php echo htmlspecialchars($news['id']); ?>"><i class="fas fa-edit"></i> Edit</a>
                            <a href="?delete=<?php echo htmlspecialchars($news['id']); ?>" onclick="return confirm('Yakin ingin menghapus berita ini?')"><i class="fas fa-trash"></i> Hapus</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="5" style="text-align: center;">Tidak ada data berita.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
