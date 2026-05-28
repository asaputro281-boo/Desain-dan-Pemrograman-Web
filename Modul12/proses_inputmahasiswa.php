<?php
  // mengecek apakah tombol simpan telah diklik
  if (isset($_POST['simpan'])) {
    // buat koneksi dengan database berbasis OOP
    include 'koneksi.php';
    $db = new Database();
    $con = $db->getConnection();

    // mengambil data dari form input
    $npm     = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi   = $_POST['prodi'];
    $alamat  = $_POST['alamat'];
    $noHP    = $_POST['noHP'];

    // buat query INSERT menggunakan Prepared Statements agar aman dari SQL Injection
    // Disarankan menuliskan nama kolom secara spesifik setelah nama tabel
    $stmt = $con->prepare("INSERT INTO t_mahasiswa (npm, namaMhs, prodi, alamat, noHP) VALUES (?, ?, ?, ?, ?)");
    
    // "sssss" berarti kelima variabel di bawah bertipe data String/Varchar
    // Urutan: npm (1), namaMhs (2), prodi (3), alamat (4), noHP (5)
    $stmt->bind_param("sssss", $npm, $namaMhs, $prodi, $alamat, $noHP);

    // jalankan query dan periksa apakah ada error saat eksekusi
    if (!$stmt->execute()) {
        die("Gagal menyimpan data: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }

  // melakukan redirect ke halaman viewmahasiswa.php setelah berhasil simpan
  header("location:viewmahasiswa.php");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>