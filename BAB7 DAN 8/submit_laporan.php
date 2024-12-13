<?php
session_start(); // Mulai sesi

// Panggil file konfigurasi database
require_once 'config.php';

$message = ''; // Inisialisasi variabel untuk pesan

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Periksa apakah variabel POST diatur
    $nama = isset($_POST['nama']) ? trim($_POST['nama']) : '';
    $deskripsi = isset($_POST['laporan']) ? trim($_POST['laporan']) : '';

    if (!empty($nama) && !empty($deskripsi)) {
        try {
            $query = "INSERT INTO laporan (nama, deskripsi) VALUES (:nama, :deskripsi)";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->execute();

            // Set pesan sukses ke sesi
            $_SESSION['message'] = "Laporan berhasil dikirim!";
            header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama
            exit;
        } catch (PDOException $e) {
            $message = "Gagal menyimpan laporan: " . $e->getMessage();
        }
    } else {
        $message = "Harap isi semua kolom!";
    }
}

// Ambil pesan dari sesi jika ada
if (isset($_SESSION['message'])) {
    $message = $_SESSION['message'];
    unset($_SESSION['message']); // Hapus pesan setelah ditampilkan
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kirim Laporan</title>
    <style>
        body {
            font-family: 'Open Sans', sans-serif;
            background: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        .form-container {
            max-width: 600px;
            margin: auto;
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-container h3 {
            margin-bottom: 20px;
            text-align: center;
        }

        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        .form-container button {
            width: 100%;
            padding: 10px;
            background-color: #00aaff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }

        .form-container button:hover {
            background-color: #007acc;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h3>Kirim Laporan Anda</h3>
        <form action="submit_laporan.php" method="post">
            <input type="text" name="nama" placeholder="Nama Anda" required>
            <textarea name="laporan" placeholder="Deskripsikan masalah" rows="4" required></textarea>
            <button type="submit">Kirim Laporan</button>
        </form>
    </div>
</body>
</html>
