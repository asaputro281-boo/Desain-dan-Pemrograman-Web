<?php
  include("koneksi.php");

  // Fitur pencarian
  $search = "";
  $whereClause = "";
  if (isset($_GET['search']) && !empty($_GET['search'])) {
      $search = mysqli_real_escape_string($link, $_GET['search']);
      $whereClause = " WHERE namaDosen LIKE '%$search%'";
  }
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen — SIA</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        <div class="brand">SIAKAD<span>| Sistem Informasi Akademik</span></div>
        <ul class="nav-links">
            <li><a href="index.php">Dashboard</a></li>
            <li><a href="viewdosen.php" class="active"> Dosen</a></li>
            <li><a href="viewmahasiswa.php">Mahasiswa</a></li>
            <li><a href="viewmatakuliah.php">Mata Kuliah</a></li>
        </ul>
    </nav>

    <!-- Page Header -->
    <div class="page-header fade-in">
        <h1>Data Dosen</h1>
        <p>Kelola data dosen di sistem informasi akademik</p>
    </div>

    <div class="card fade-in">
        <!-- Actions Bar -->
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

        <!-- Tabel Dosen -->
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
                  // jalankan query untuk menampilkan semua data diurutkan berdasarkan idDosen
                  $query = "SELECT * FROM t_dosen" . $whereClause . " ORDER BY idDosen ASC";
                  $result = mysqli_query($link, $query);

                  // mengecek apakah ada error ketika menjalankan query
                  if(!$result) {
                      die ("Query Error: ".mysqli_errno($link).
                      " - ".mysqli_error($link));
                  }

                  if (mysqli_num_rows($result) > 0) {
                      // hasil query akan disimpan dalam variabel $data dalam bentuk array
                      // kemudian dicetak dengan perulangan while
                      while ($data = mysqli_fetch_assoc($result))
                      {
                          // mencetak / menampilkan data
                          echo "<tr>";
                          echo "<td>$data[idDosen]</td>"; //menampilkan data idDosen
                          echo "<td>$data[namaDosen]</td>"; //menampilkan data namaDosen
                          echo "<td>$data[noHP]</td>"; //menampilkan data noHP
                          // membuat link untuk mengedit dan menghapus data
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