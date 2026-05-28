<?php
  // memanggil file koneksi.php untuk membuat koneksi berbasis OOP
  include("koneksi.php");
  $db = new Database();
  $con = $db->getConnection();

  // Fitur pencarian berbasis OOP dan Prepared Statement
  $search = "";
  if (isset($_GET['cari']) && !empty($_GET['cari'])) {
      $search = $_GET['cari'];
      // Menyiapkan statement untuk pencarian data berdasarkan nama mahasiswa
      $stmt = $con->prepare("SELECT * FROM t_mahasiswa WHERE namaMhs LIKE ? ORDER BY npm ASC");
      $searchParam = "%$search%";
      $stmt->bind_param("s", $searchParam);
  } else {
      // Menyiapkan statement jika tidak ada pencarian (tampil semua data mahasiswa)
      $stmt = $con->prepare("SELECT * FROM t_mahasiswa ORDER BY npm ASC");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa (OOP) — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA OOP <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Mahasiswa</h1>
        <p>Kelola data mahasiswa dengan implementasi Object-Oriented Programming</p>
    </div>

    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewmahasiswa.php">
                <input type="text" name="cari" placeholder="🔍 Cari berdasarkan nama mahasiswa..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputmahasiswa.php" class="btn btn-primary">+ Tambah Mahasiswa</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>NPM</th>
                    <th>Nama Mahasiswa</th>
                    <th>Prodi</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  // Eksekusi prepared statement yang sudah dideklarasikan di atas
                  $stmt->execute();
                  $result = $stmt->get_result();

                  // Mengecek apakah baris data ditemukan
                  if ($result->num_rows > 0) {
                      // Mengambil data baris per baris dalam bentuk array asosiatif
                      while ($data = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($data['npm']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['prodi']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                          echo '<td class="action-links">
                              <a href="editmahasiswa.php?npm='.$data['npm'].'" class="btn btn-warning btn-sm">✏️ Edit</a>
                              <a href="hapusmahasiswa.php?npm='.$data['npm'].'" class="btn btn-danger btn-sm"
                                  onclick="return confirm(\'Anda yakin akan menghapus data?\')">🗑️ Hapus</a>
                          </td>';
                          echo "</tr>";
                      }
                  } else {
                      echo '<tr><td colspan="6"><div class="empty-state"><div class="icon">📭</div><p>Belum ada data mahasiswa' . ($search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '') . '</p></div></td></tr>';
                  }
                ?>
            </tbody>
        </table>
    </div>

    <div class="footer">
        &copy; <?php echo date('Y'); ?> Sistem Informasi Akademik
    </div>
</body>
</html>
<?php 
  // Menutup statement dan koneksi secara aman di akhir siklus halaman setelah komponen HTML selesai dimuat
  if (isset($stmt)) {
      $stmt->close();
  }
  if (isset($con)) {
      $con->close();
  }
?>