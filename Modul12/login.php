<?php
session_start();
include("koneksi.php");

if (isset($_SESSION['username'])) {
    header("Location: index.php");
    exit();
}

$error = "";

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($link, $_POST['username']);
    $password = $_POST['password']; 

    if (!empty($username) && !empty($password)) {
        // PERHATIAN: Pastikan nama tabel akun di database kamu adalah t_user
        $query = "SELECT * FROM t_user WHERE username='$username' AND password='$password'";
        $result = mysqli_query($link, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['username'] = $row['username'];
            header("Location: index.php");
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    } else {
        $error = "Semua field harus diisi!";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Akademik</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="login-page">

    <div class="login-container">
        <div class="login-header">
            <h2>SIAKAD</h2>
            <p>Sistem Informasi Akademik</p>
        </div>

        <?php if (!empty($error)): ?>
            <div class="alert-error"><?php echo $error; ?></div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required autocomplete="off">
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div>

            <button type="submit" name="login" class="btn-login">Masuk</button>
        </form>
    </div>

    <div class="footer login-footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>

</body>
</html>