<?php
session_start();

// Cek apakah form login sudah disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Data dummy untuk validasi (sebaiknya data ini dari database)
    $valid_username = 'admin';
    $valid_password = 'admin123';

    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username dan password
    if ($username == $valid_username && $password == $valid_password) {
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
<html lang="en">
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
    <div id="snackbar"></div>
    <script>
        // Fungsi untuk menampilkan Snackbar
        function showSnackbar(message) {
            var snackbar = document.getElementById("snackbar");
            snackbar.textContent = message;
            snackbar.className = "show";
            setTimeout(function() {
                snackbar.className = snackbar.className.replace("show", "");
            }, 3000); // Snackbar akan hilang setelah 3 detik
        }
    
        // Contoh penggunaan: memanggil fungsi ketika form login di-submit
        document.querySelector("form").addEventListener("submit", function(event) {
            event.preventDefault(); // Menghindari reload halaman
            showSnackbar("Login berhasil!");
            setTimeout(() => {
                window.location.href = "admin.php"; // Redirect setelah 3 detik
            }, 3000);
        });
    </script>    
</body>
</html>
