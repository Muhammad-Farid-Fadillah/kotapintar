<?php
// Simulasi pengecekan login
// session_start();
// if (!isset($_SESSION['admin_logged_in'])) {
//     header('Location: login.php'); // Arahkan ke halaman login jika belum login
//     exit();
// }

// Menghapus berita berdasarkan index
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['index'])) {
    $index = $_POST['index'];
    unset($_SESSION['news'][$index]); // Hapus berita dari session

    // Arahkan kembali ke halaman kelola berita
    header('Location: manage-news.php');
    exit();
}
