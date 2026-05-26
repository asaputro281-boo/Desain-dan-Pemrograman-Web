<?php
// buat_tabel.php
// Jika kamu memakai include 'koneksi.php', baris $con di bawah ini tidak perlu ditulis ulang.
// Namun ini disesuaikan berdasarkan baris modul aslimu:
$con = new mysqli("localhost", "root", "", "koneksi_dbphp");

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Buat query untuk membuat tabel t_login
$q = "CREATE TABLE t_login (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(38) NOT NULL,
    password VARCHAR(50) NOT NULL,
    email VARCHAR(50),
    tgl_registrasi TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Kirim kueri ke server basis data
$hasil = $con->query($q);

// Periksa hasil pengiriman query
if ($hasil === TRUE) {
    echo "Tabel t_login berhasil dibuat";
} else {
    echo "Tabel gagal dibuat: " . $con->error;
}

// Menutup koneksi
$con->close();
?>