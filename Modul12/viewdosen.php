<?php
  // memanggil file koneksi.php untuk membuat koneksi berbasis OOP
  include("koneksi.php");
  $db = new Database();
  $con = $db->getConnection();

  // Fitur pencarian berbasis OOP dan Prepared Statement
  $search = "";
  if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = $_GET['search'];
      // Menyiapkan statement untuk pencarian data
      $stmt = $con->prepare("SELECT * FROM t_dosen WHERE namaDosen LIKE ? ORDER BY idDosen ASC");
      $searchParam = "%$search%";
      $stmt->bind_param("s", $searchParam);
  } else {
      // Menyiapkan statement jika tidak ada pencarian (tampil semua data)
      $stmt = $con->prepare("SELECT * FROM t_dosen ORDER BY idDosen ASC");
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen (OOP) — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIA OOP <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php" class="active">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Dosen</h1>
        <p>Kelola data dosen dengan implementasi Object-Oriented Programming</p>
    </div>

    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewdosen.php">
                <input type="text" name="search" placeholder="🔍 Cari berdasarkan nama dosen..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputdosen.php" class="btn btn-primary">+ Tambah Dosen</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Dosen</th>
                    <th>No HP</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  // Eksekusi prepared statement yang sudah disiapkan di atas
                  $stmt->execute();
                  $result = $stmt->get_result();

                  // Mengecek apakah baris data ditemukan
                  if ($result->num_rows > 0) {
                      // Ambil data dalam bentuk array asosiatif menggunakan fetch_assoc()
                      while ($data = $result->fetch_assoc()) {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($data['idDosen']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['namaDosen']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                          echo '<td class="action-links">
                              <a href="editdosen.php?idDosen='.$data['idDosen'].'" class="btn btn-warning btn-sm">✏️ Edit</a>
                              <a href="hapusdosen.php?idDosen='.$data['idDosen'].'" class="btn btn-danger btn-sm"
                                  onclick="return confirm(\'Anda yakin akan menghapus data?\')">🗑️ Hapus</a>
                          </td>';
                          echo "</tr>";
                      }
                  } else {
                      echo '<tr><td colspan="4"><div class="empty-state"><div class="icon">📭</div><p>Belum ada data dosen' . ($search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '') . '</p></div></td></tr>';
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
  // Menutup statement dan koneksi di akhir siklus halaman setelah HTML selesai dimuat
  if (isset($stmt)) {
      $stmt->close();
  }
  if (isset($con)) {
      $con->close();
  }
?>