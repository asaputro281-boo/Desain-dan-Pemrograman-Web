<?php
  include("koneksi.php");

  // Fitur pencarian mahasiswa
  $search = "";
  $whereClause = "";
  if (isset($_GET['cari']) && !empty($_GET['cari'])) {
      $search = mysqli_real_escape_string($link, $_GET['cari']);
      $whereClause = " WHERE namaMhs LIKE '%$search%'";
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIAKAD <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php" class="active">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Mahasiswa</h1>
        <p>Kelola data mahasiswa di sistem informasi akademik</p>
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
                    <th>Aksi</th> </tr>
            </thead>
            <tbody>
                <?php
                  // Jalankan query untuk menampilkan data mahasiswa diurutkan berdasarkan NPM
                  $query = "SELECT * FROM t_mahasiswa" . $whereClause . " ORDER BY npm ASC";
                  $result = mysqli_query($link, $query);

                  // Mengecek apakah ada error ketika menjalankan query
                  if(!$result) {
                      die ("Query Error: ".mysqli_errno($link).
                      " - ".mysqli_error($link));
                  }

                  if (mysqli_num_rows($result) > 0) {
                      // Hasil query dicetak dengan perulangan while
                      while ($data = mysqli_fetch_assoc($result))
                      {
                          echo "<tr>";
                          echo "<td>" . htmlspecialchars($data['npm']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['namaMhs']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['prodi']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['alamat']) . "</td>";
                          echo "<td>" . htmlspecialchars($data['noHP']) . "</td>";
                          
                          // Menampilkan tombol Edit dan Hapus sesuai parameter NPM mahasiswa
                          echo '<td class="action-links">
                              <a href="editmahasiswa.php?npm='.$data['npm'].'" class="btn btn-warning btn-sm">✏️ Edit</a>
                              <a href="hapusmahasiswa.php?npm='.$data['npm'].'" class="btn btn-danger btn-sm"
                                  onclick="return confirm(\'Anda yakin akan menghapus data?\')">🗑️ Hapus</a>
                          </td>';
                          
                          echo "</tr>";
                      }
                  } else {
                      // colspan diubah menjadi 6 karena jumlah kolom bertambah setelah ada kolom aksi
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