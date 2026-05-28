<?php
  // memanggil file koneksi.php untuk membuat koneksi berbasis OOP
  include 'koneksi.php';

  // mengecek apakah di url ada nilai GET npm
  if (isset($_GET['npm'])) {
    // membuat objek database dan mengambil koneksinya
    $db = new Database();
    $con = $db->getConnection();
    
    // ambil nilai npm dari url dan disimpan dalam variabel $npm
    $npm = $_GET["npm"];

    // menampilkan data t_mahasiswa menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("SELECT * FROM t_mahasiswa WHERE npm = ?");
    $stmt->bind_param("s", $npm); // "s" karena NPM umumnya bertipe data String/Varchar
    
    // mengecek apakah query gagal dieksekusi
    if (!$stmt->execute()) {
        die("Query Error: " . $stmt->error);
    }
    
    // mengambil hasil eksekusi query
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    // mengecek apakah data mahasiswa ditemukan di database
    if (!$data) {
        $stmt->close();
        header("location:viewmahasiswa.php");
        exit;
    }
    
    // menutup statement setelah data berhasil disimpan dalam array $data
    $stmt->close();
  } else {
    // apabila tidak ada data GET npm akan di-redirect ke viewmahasiswa.php
    header("location:viewmahasiswa.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mahasiswa (OOP) — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA OOP <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Edit Data Mahasiswa (OOP)</h1>
        <p>Ubah informasi data mahasiswa</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">✏️ Edit Data Mahasiswa</div>
        <form action="proses_editmahasiswa.php" method="post">
            <input type="hidden" name="npm" value="<?php echo htmlspecialchars($data['npm']); ?>">
            
            <div class="form-group">
                <label for="namaMhs">Nama Mahasiswa</label>
                <input type="text" name="namaMhs" id="namaMhs" value="<?php echo htmlspecialchars($data['namaMhs']); ?>" required>
            </div>
            <div class="form-group">
                <label for="prodi">Program Studi</label>
                <input type="text" name="prodi" id="prodi" value="<?php echo htmlspecialchars($data['prodi']); ?>" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <input type="text" name="alamat" id="alamat" value="<?php echo htmlspecialchars($data['alamat']); ?>" required>
            </div>
            <div class="form-group">
                <label for="noHP">No HP</label>
                <input type="tel" name="noHP" id="noHP" value="<?php echo htmlspecialchars($data['noHP']); ?>" required>
            </div>
            <div class="form-actions">
                <button type="submit" name="edit" class="btn btn-success">💾 Update Data</button>
                <a href="viewmahasiswa.php" class="btn btn-danger">← Batal</a>
            </div>
        </form>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
<?php 
  // Menutup koneksi database di paling akhir setelah semua HTML selesai dimuat
  if (isset($con)) {
      $con->close(); 
  }
?>