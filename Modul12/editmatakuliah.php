<?php
  // memanggil file koneksi.php untuk membuat koneksi berbasis OOP
  include 'koneksi.php';

  // mengecek apakah di url ada nilai GET kodeMK
  if (isset($_GET['kodeMK'])) {
    // membuat objek database dan mengambil koneksinya
    $db = new Database();
    $con = $db->getConnection();
    
    // ambil nilai kodeMK dari url dan disimpan dalam variabel $kodeMK
    $kodeMK = $_GET["kodeMK"];

    // menampilkan data t_matakuliah menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("SELECT * FROM t_matakuliah WHERE kodeMK = ?");
    $stmt->bind_param("s", $kodeMK); // "s" digunakan karena kodeMK bertipe data String/Varchar
    
    // mengecek apakah query gagal dieksekusi
    if (!$stmt->execute()) {
        die("Query Error: " . $stmt->error);
    }
    
    // mengambil hasil eksekusi query
    $result = $stmt->get_result();
    $data = $result->fetch_assoc();
    
    // mengecek apakah data mata kuliah ditemukan di database
    if (!$data) {
        $stmt->close();
        header("location:viewmatakuliah.php");
        exit;
    }
    
    // menutup statement setelah data berhasil disimpan dalam array $data
    $stmt->close();
  } else {
    // apabila tidak ada data GET kodeMK akan di-redirect ke viewmatakuliah.php
    header("location:viewmatakuliah.php");
    exit;
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Mata Kuliah (OOP) — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA OOP <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">🏠 Dashboard</a></li>
            <li><a href="viewdosen.php">👨‍🏫 Dosen</a></li>
            <li><a href="viewmahasiswa.php">🎓 Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">📚 Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Edit Data Mata Kuliah (OOP)</h1>
        <p>Ubah informasi data mata kuliah</p>
    </div>

    <div class="card form-card fade-in">
        <div class="form-title">✏️ Edit Data Mata Kuliah</div>
        <form action="proses_editmatakuliah.php" method="post">
            <input type="hidden" name="kodeMK" value="<?php echo htmlspecialchars($data['kodeMK']); ?>">
            
            <div class="form-group">
                <label for="namaMK">Nama Mata Kuliah</label>
                <input type="text" name="namaMK" id="namaMK" value="<?php echo htmlspecialchars($data['namaMK']); ?>" required>
            </div>
            <div class="form-group">
                <label for="sks">SKS</label>
                <input type="number" name="sks" id="sks" value="<?php echo htmlspecialchars($data['sks']); ?>" required>
            </div>
            <div class="form-group">
                <label for="jam">Jam</label>
                <input type="number" name="jam" id="jam" value="<?php echo htmlspecialchars($data['jam']); ?>" required>
            </div>
            <div class="form-actions">
                <button type="submit" name="edit" class="btn btn-success">💾 Update Data</button>
                <a href="viewmatakuliah.php" class="btn btn-danger">← Batal</a>
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