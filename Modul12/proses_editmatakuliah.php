<?php
  // mengecek apakah tombol edit telah diklik
  if (isset($_POST['edit'])) {
    // buat koneksi dengan database berbasis OOP
    include("koneksi.php");
    $db = new Database();
    $con = $db->getConnection();

    // membuat variabel untuk menampung data dari form edit
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $sks    = $_POST['sks'];
    $jam    = $_POST['jam'];

    // buat query UPDATE menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("UPDATE t_matakuliah SET namaMK = ?, sks = ?, jam = ? WHERE kodeMK = ?");
    
    // "siis" berarti urutan variabelnya adalah: 
    // namaMK (String), sks (Integer), jam (Integer), kodeMK (String)
    $stmt->bind_param("siis", $namaMK, $sks, $jam, $kodeMK);

    // jalankan query dan periksa apakah ada error saat eksekusi
    if (!$stmt->execute()) {
        die("Query gagal dijalankan: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }

  // melakukan redirect ke halaman viewmatakuliah.php dengan membawa pesan sukses
  header("location:viewmatakuliah.php?msg=Data mata kuliah berhasil diperbarui!");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>