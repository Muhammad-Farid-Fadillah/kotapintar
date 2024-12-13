<?php
// Menghubungkan ke database
include('config.php');

// Query untuk mengambil semua data
// $query = "SELECT * FROM features";
// $stmt = $pdo->query($query);
// $features = $stmt->fetchAll();
// ?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Kota Pintar</title>
</head>
<body>
    <h2>Fitur Kota Pintar</h2>
    <a href="add_feature.php">Tambah Fitur</a>
    <table>
        <thead>
            <tr>
                <th>Icon</th>
                <th>Judul</th>
                <th>Deskripsi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($features as $feature): ?>
                <tr>
                    <td><i class="fas <?php echo $feature['icon']; ?>"></i></td>
                    <td><?php echo htmlspecialchars($feature['title']); ?></td>
                    <td><?php echo htmlspecialchars($feature['description']); ?></td>
                    <td>
                        <a href="edit_feature.php?id=<?php echo $feature['id']; ?>">Edit</a>
                        <a href="delete_feature.php?id=<?php echo $feature['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
