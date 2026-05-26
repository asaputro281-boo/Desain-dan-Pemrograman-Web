<?php
  include("koneksi.php");
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mata Kuliah — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="viewmahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Tambah Data Mata Kuliah</h1>
        <p>Masukkan data mata kuliah baru</p>
    </div>

    <div class="card fade-in" style="max-width: 600px; margin: 20px auto;">
        <div class="form-header" style="border-bottom: 1px solid #f0f0f0; margin-bottom: 20px; padding-bottom: 10px;">
            <h3 style="margin: 0; font-size: 1.2rem; color: #1e293b;">📝 Form Input Mata Kuliah</h3>
        </div>
        
        <form action="proses_inputmatakuliah.php" method="POST">
            <div class="form-group">
                <label for="kodeMK">Kode MK</label>
                <input type="text" name="kodeMK" id="kodeMK" placeholder="Masukkan kode mata kuliah..." required>
            </div>

            <div class="form-group">
                <label for="namaMK">Nama Mata Kuliah</label>
                <input type="text" name="namaMK" id="namaMK" placeholder="Masukkan nama lengkap mata kuliah..." required>
            </div>

            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" name="sks" id="sks" placeholder="Contoh: 3" required>
            </div>

            <div class="form-group">
                <label for="jam">Jam (SKS)</label>
                <input type="text" name="jam" id="jam" placeholder="Contoh: 08:00 - 10:30" required>
            </div>

            <div class="form-actions" style="display: flex; gap: 12px; margin-top: 25px;">
                <button type="submit" name="simpan" class="btn btn-success">
                    💾 Simpan Data
                </button>
                <a href="viewmatakuliah.php" class="btn btn-danger" style="background-color: #ffebe6; color: #ff4d4f; border: none; text-decoration: none; display: inline-flex; align-items: center; justify-content: center;">
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