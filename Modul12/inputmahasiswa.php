<?php
  include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Tambah Data Mahasiswa</h1>
        <p>Masukkan data mahasiswa baru</p>
    </div>

    <div class="card fade-in" style="max-width: 600px; margin: 20px auto;">
        <div class="form-header" style="border-bottom: 1px solid #f0f0f0; margin-bottom: 20px; padding-bottom: 10px;">
            <h3 style="margin: 0; font-size: 1.2rem; color: #1e293b;">📝 Form Input Mahasiswa</h3>
        </div>
        
        <form action="proses_inputmahasiswa.php" method="POST">
            <div class="form-group">
                <label for="npm">NPM</label>
                <input type="text" name="npm" id="npm" placeholder="Masukkan NPM mahasiswa..." required>
            </div>

            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs" placeholder="Masukkan nama lengkap mahasiswa..." required>
            </div>

            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" name="prodi" id="prodi" placeholder="Masukkan program studi..." required>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" placeholder="Masukkan alamat lengkap..." required>
            </div>

            <div class="form-group">
                <label for="noHP">No HP</label>
                <input type="text" name="noHP" id="noHP" placeholder="Contoh: 081222333444" required>
            </div>

            <div class="form-actions" style="display: flex; gap: 12px; margin-top: 25px;">
                <button type="submit" name="simpan" class="btn btn-success">
                    💾 Simpan Data
                </button>
                <a href="viewmahasiswa.php" class="btn btn-danger" style="background-color: #ffebe6; color: #ff4d4f; border: none; text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
                    ← Batal
                </a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>