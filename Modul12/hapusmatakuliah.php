<?php
  // memanggil file koneksi.php untuk membuat koneksi berbasis OOP
  include("koneksi.php");

  // mengecek apakah di url ada GET kodeMK
  if (isset($_GET["kodeMK"])) {
    // membuat objek database dan mengambil koneksinya
    $db = new Database();
    $con = $db->getConnection();
    
    // menyimpan variabel kodeMK dari url ke dalam variabel $kodeMK
    $kodeMK = $_GET["kodeMK"];

    // jalankan query DELETE menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("DELETE FROM t_matakuliah WHERE kodeMK = ?");
    $stmt->bind_param("s", $kodeMK); // "s" digunakan karena kodeMK bertipe data String/Varchar di database

    // periksa query, apakah ada kesalahan saat eksekusi
    if (!$stmt->execute()) {
        die("Gagal menghapus data: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }
  
  // melakukan redirect ke halaman viewmatakuliah.php dengan membawa pesan sukses
  header("location:viewmatakuliah.php?msg=Data mata kuliah berhasil dihapus!");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>