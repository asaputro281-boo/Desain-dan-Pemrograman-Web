<?php
// Variabel koneksi dengan database mysql [cite: 27]
$host  = "localhost"; // [cite: 30]
$user  = "root";      // [cite: 32]
$paswd = "";          // Kosongkan jika menggunakan XAMPP bawaan [cite: 34]
$name  = "koneksi_dbphp"; // DIUBAH SESUAI SCREENSHOT KAMU 

// Proses koneksi [cite: 40]
$link = mysqli_connect($host, $user, $paswd, $name); // [cite: 48]

// Periksa koneksi, jika gagal akan menampilkan pesan error [cite: 49]
if (!$link) { // [cite: 49]
    die("Koneksi dengan database gagal: " . mysqli_connect_errno() . " - " . mysqli_connect_error()); // [cite: 50]
}
?>