<?php
  // mengecek apakah tombol edit telah diklik
  if (isset($_POST['edit'])) {
    // buat koneksi dengan database berbasis OOP
    include("koneksi.php");
    $db = new Database();
    $con = $db->getConnection();

    // membuat variabel untuk menampung data dari form edit
    $npm     = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi   = $_POST['prodi'];
    $alamat  = $_POST['alamat'];
    $noHP    = $_POST['noHP'];

    // buat query UPDATE menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("UPDATE t_mahasiswa SET namaMhs = ?, prodi = ?, alamat = ?, noHP = ? WHERE npm = ?");
    
    // "sssss" berarti kelima variabel di bawah bertipe data String/Varchar
    // Urutan: namaMhs (1), prodi (2), alamat (3), noHP (4), npm (5)
    $stmt->bind_param("sssss", $namaMhs, $prodi, $alamat, $noHP, $npm);

    // jalankan query dan periksa apakah ada error saat eksekusi
    if (!$stmt->execute()) {
        die("Query gagal dijalankan: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }

  // melakukan redirect ke halaman viewmahasiswa.php dengan membawa pesan sukses
  header("location:viewmahasiswa.php?msg=Data mahasiswa berhasil diperbarui!");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>