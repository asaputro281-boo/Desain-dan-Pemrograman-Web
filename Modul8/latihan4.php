<?php
/* 
 * Latihan: Kondisi If, Else, dan Elseif (Modified)
 */

// 1. If Sederhana
$jam = 16; 
echo "<b>Simple If:</b><br>";
if ($jam < 15) {
    echo "Sudah jam $jam, ayo makan dulu!<br>";
} else {
    echo "Jam $jam sudah lewat waktu makan siang.<br>";
}

echo "<br>";

// 2. If dan Else
$nilai = 65;
echo "<b>If dan Else:</b><br>";
if ($nilai >= 70) {
    echo "Nilai: $nilai. Status: Lulus.";
} else {
    echo "Nilai: $nilai. Status: Remedial.";
}

echo "<br><br>";

// 3. Nested If (Sapaan Waktu)
$t = 14; 
echo "<b>Nested If:</b><br>";
if ($t >= 5 && $t < 11) {
    echo "Waktu menunjukkan pukul $t:00. Selamat Pagi!";
} elseif ($t >= 11 && $t < 15) {
    echo "Waktu menunjukkan pukul $t:00. Selamat Siang!";
} elseif ($t >= 15 && $t < 18) {
    echo "Waktu menunjukkan pukul $t:00. Selamat Sore!";
} else {
    echo "Waktu menunjukkan pukul $t:00. Selamat Malam!";
}
?>