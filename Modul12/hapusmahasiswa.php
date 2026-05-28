<?php
  // memanggil file koneksi.php untuk membuat koneksi berbasis OOP
  include("koneksi.php");

  // mengecek apakah di url ada GET npm
  if (isset($_GET["npm"])) {
    // membuat objek database dan mengambil koneksinya
    $db = new Database();
    $con = $db->getConnection();
    
    // menyimpan variabel npm dari url ke dalam variabel $npm
    $npm = $_GET["npm"];

    // jalankan query DELETE menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("DELETE FROM t_mahasiswa WHERE npm = ?");
    $stmt->bind_param("s", $npm); // "s" digunakan karena NPM bertipe data String/Varchar di database

    // periksa query, apakah ada kesalahan saat eksekusi
    if (!$stmt->execute()) {
        die("Gagal menghapus data: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }
  
  // melakukan redirect ke halaman viewmahasiswa.php dengan membawa pesan sukses
  header("location:viewmahasiswa.php?msg=Data mahasiswa berhasil dihapus!");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>