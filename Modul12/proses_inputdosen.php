<?php
  // mengecek apakah tombol tambah sudah diklik
  if (isset($_POST["tambah"])) {
    // buat koneksi dengan database berbasis OOP
    include("koneksi.php");
    $db = new Database();
    $con = $db->getConnection();

    // mengambil data dari form input
    $nama = $_POST["namaDosen"];
    $hp   = $_POST["noHP"];

    // buat query INSERT menggunakan Prepared Statements agar aman dari SQL Injection
    $stmt = $con->prepare("INSERT INTO t_dosen (namaDosen, noHP) VALUES (?, ?)");
    
    // "ss" berarti kedua variabel di bawah bertipe data String
    // Urutan: namaDosen (1), noHP (2)
    $stmt->bind_param("ss", $nama, $hp);

    // jalankan query dan periksa apakah ada error saat eksekusi
    if (!$stmt->execute()) {
        die("Gagal menambah data: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }

  // melakukan redirect ke halaman viewdosen.php dengan membawa pesan sukses
  header("location:viewdosen.php?msg=Data dosen berhasil ditambahkan!");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>