<?php
// variabel dalam php
$txt = "Selamat datang Mahasiswa Baru!";
$txt2 = "Politeknik Negeri Madiun";
$x = 5;
$y = 20;

echo "<p>Variable txt adalah : $txt</p>";
echo "<p>Variable x adalah : $x</p>";
echo "<p>Variable y adalah : $y</p>";
echo "Belajar PHP di " . $txt2 . "<br>";
echo $x + $y;

// PHP konstanta
define("nama_konstanta", "Angga Dwi Saputro"); // isi nama kamu di sini
echo "<br>" . nama_konstanta;
?>