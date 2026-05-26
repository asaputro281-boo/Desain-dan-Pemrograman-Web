<?php
  include("koneksi.php");

  // Fitur pencarian mata kuliah
  $search = "";
  $whereClause = "";
  if (isset($_GET['cari']) && !empty($_GET['cari'])) {
      $search = mysqli_real_escape_string($link, $_GET['cari']);
      $whereClause = " WHERE namaMK LIKE '%$search%'";
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mata Kuliah — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav class="navbar">
        <div class="brand">SIAKAD <span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php">Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php" class="active">Mata Kuliah</a></li>
        </ul>
    </nav>

    <div class="page-header fade-in">
        <h1>Data Mata Kuliah</h1>
        <p>Kelola data mata kuliah di sistem informasi akademik</p>
    </div>

    <div class="card fade-in">
        <div class="actions-bar">
            <form class="search-bar" method="GET" action="viewmatakuliah.php">
                <input type="text" name="cari" placeholder="🔍 Cari berdasarkan nama matakuliah..." value="<?php echo htmlspecialchars($search); ?>">
                <button type="submit">Cari</button>
            </form>
            <a href="inputmatakuliah.php" class="btn btn-primary">+ Tambah Matakuliah</a>
        </div>

        <?php if (isset($_GET['msg'])): ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($_GET['msg']); ?></div>
        <?php endif; ?>

        <table class="data-table">
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama Matakuliah</th>
                    <th>SKS</th>
                    <th>Jam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                  // Jalankan query untuk menampilkan semua data diurutkan berdasarkan kodeMK
                  $query = "SELECT * FROM t_matakuliah" . $whereClause . " ORDER BY kodeMK ASC";
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
                          echo "<td>" . htmlspecialchars($data['kodeMK']) . "</td>"; //
                          echo "<td>" . htmlspecialchars($data['namaMK']) . "</td>"; //
                          echo "<td>" . htmlspecialchars($data['sks']) . "</td>"; //
                          echo "<td>" . htmlspecialchars($data['jam']) . "</td>"; //
                          
                          // Membuat link untuk mengedit dan menghapus data mata kuliah
                          echo '<td class="action-links">
                              <a href="editmatakuliah.php?kodeMK='.$data['kodeMK'].'" class="btn btn-warning btn-sm">✏️ Edit</a>
                              <a href="hapusmatakuliah.php?kodeMK='.$data['kodeMK'].'" class="btn btn-danger btn-sm"
                                  onclick="return confirm(\'Anda yakin akan menghapus data?\')">🗑️ Hapus</a>
                          </td>';
                          echo "</tr>";
                      }
                  } else {
                      // colspan menjadi 5 karena ada 4 kolom data + 1 kolom aksi
                      echo '<tr><td colspan="5"><div class="empty-state"><div class="icon">📭</div><p>Belum ada data mata kuliah' . ($search ? ' untuk pencarian "' . htmlspecialchars($search) . '"' : '') . '</p></div></td></tr>';
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