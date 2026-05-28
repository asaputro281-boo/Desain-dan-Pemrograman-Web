<?php
  // mengecek apakah tombol simpan telah diklik
  if (isset($_POST['simpan'])) {
    // buat koneksi dengan database berbasis OOP
    include 'koneksi.php';
    $db = new Database();
    $con = $db->getConnection();

    // mengambil data dari form input
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $sks    = $_POST['sks'];
    $jam    = $_POST['jam'];

    // buat query INSERT menggunakan Prepared Statements agar aman dari SQL Injection
    // Disarankan menuliskan nama kolom secara spesifik setelah nama tabel
    $stmt = $con->prepare("INSERT INTO t_matakuliah (kodeMK, namaMK, sks, jam) VALUES (?, ?, ?, ?)");
    
    // "ssii" berarti: kodeMK (String), namaMK (String), sks (Integer), jam (Integer)
    $stmt->bind_param("ssii", $kodeMK, $namaMK, $sks, $jam);

    // jalankan query dan periksa apakah ada error saat eksekusi
    if (!$stmt->execute()) {
        die("Gagal menyimpan data: " . $stmt->error);
    }
    
    // menutup statement setelah proses eksekusi selesai
    $stmt->close();
  }

  // melakukan redirect ke halaman viewmatakuliah.php setelah berhasil simpan
  header("location:viewmatakuliah.php");
  exit; // menghentikan skrip agar redirect berjalan sepenuhnya tanpa memproses kode di bawahnya
?>