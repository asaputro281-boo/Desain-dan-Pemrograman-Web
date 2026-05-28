<?php
  // memanggil file koneksi.php untuk membuat koneksi berbasis OOP
  include("koneksi.php");

  // mengecek apakah di url ada GET idDosen
  if (isset($_GET["idDosen"])) {
    // membuat objek database dan mengambil koneksinya
    $db = new Database();
    $con = $db->getConnection();
    
    // menyimpan variabel id dari url ke dalam variabel $id
    $id = $_GET["idDosen"];

    // jalankan query DELETE menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("DELETE FROM t_dosen WHERE idDosen = ?");
    $stmt->bind_param("i", $id); // Gunakan "i" jika idDosen berupa Integer. Ganti "s" jika Varchar/String

    // periksa query, apakah ada kesalahan saat eksekusi
    if (!$stmt->execute()) {
        die("Gagal menghapus data: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }
  
  // melakukan redirect ke halaman viewdosen.php dengan membawa pesan sukses
  header("location:viewdosen.php?msg=Data dosen berhasil dihapus!");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>