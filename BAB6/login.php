<?php
session_start();

// Include file koneksi database
include('config.php');

// Cek apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk memeriksa apakah username dan password ada di database
    $sql = "SELECT * FROM pengguna WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username);  // Bind parameter untuk username
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Cek apakah username ditemukan dan passwordnya cocok
    if ($user && MD5($password) == $user['password']) {
        // Set session dan arahkan ke halaman admin
        $_SESSION['username'] = $username;
        header('Location: admin.php');
        exit();
    } else {
        // Jika login gagal, tampilkan pesan error
        $error_message = 'Username atau Password salah!';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <main>
        <section id="login" class="section">
            <!-- Menambahkan gambar di atas input username -->
            <img src="newlogo.png" alt="Login Image" class="login-image">
            <div class="login-box">
                <h2>Login Admin</h2>
                
                <!-- Form login -->
                <form action="login.php" method="POST">
                    <input type="text" name="username" placeholder="Username" required>
                    <input type="password" name="password" placeholder="Password" required>
                    <button type="submit">Login</button>
                </form>

                <!-- Menampilkan pesan error jika login gagal -->
                <?php if (isset($error_message)): ?>
                    <p style="color: red; text-align: center;"><?php echo $error_message; ?></p>
                <?php endif; ?>
            </div>
        </section>
    </main>
</body>
</html>
