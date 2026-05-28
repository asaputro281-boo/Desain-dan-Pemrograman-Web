<?php
  // mengecek apakah tombol edit telah diklik
  if (isset($_POST['edit'])) {
    // buat koneksi dengan database berbasis OOP
    include("koneksi.php");
    $db = new Database();
    $con = $db->getConnection();

    // membuat variabel untuk menampung data dari form edit
    $id        = $_POST['idDosen'];
    $namaDosen = $_POST['namaDosen'];
    $noHP      = $_POST['noHP'];

    // buat query UPDATE menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("UPDATE t_dosen SET namaDosen = ?, noHP = ? WHERE idDosen = ?");
    
    // "ssi" berasumsi: namaDosen (String), noHP (String), idDosen (Integer)
    // PENTING: Jika idDosen di database Anda bertipe Varchar/String, ubah "ssi" menjadi "sss"
    $stmt->bind_param("ssi", $namaDosen, $noHP, $id);

    // jalankan query dan periksa apakah ada error saat eksekusi
    if (!$stmt->execute()) {
        die("Query gagal dijalankan: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }

  // melakukan redirect ke halaman viewdosen.php dengan membawa pesan sukses
  header("location:viewdosen.php?msg=Data dosen berhasil diperbarui!");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>