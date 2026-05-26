<?php
// Latihan 5: Menghitung keliling lingkaran dengan jari-jari 21 cm

$jariJari = 21;

// --- MENGGUNAKAN PI 3.14 ---
$pi_desimal = 3.14;
$keliling1 = 2 * $pi_desimal * $jariJari;

echo "<h2>Keliling Lingkaran (Menggunakan PI 3.14)</h2>";
echo "Jari-jari (r): $jariJari cm<br>";
echo "Nilai π (Pi): $pi_desimal<br>";
echo "Rumus: 2 × π × r<br>";
echo "Hasil: 2 × $pi_desimal × $jariJari = <b>$keliling1 cm</b><br>";

echo "<hr>"; 

// --- MENGGUNAKAN PI 22/7 ---
$pi_fraksi = 22/7; 
$keliling2 = 2 * $pi_fraksi * $jariJari;
$luas = $pi_fraksi * ($jariJari ** 2);

echo "<h2>Keliling Lingkaran (Menggunakan PI 22/7)</h2>";
echo "Jari-jari (r): $jariJari cm<br>";
echo "Nilai π (Pi): 22/7<br>";
echo "Rumus Keliling: 2 × π × r<br>";
echo "Hasil Keliling: 2 × (22/7) × $jariJari = <b>$keliling2 cm</b><br>";

?>