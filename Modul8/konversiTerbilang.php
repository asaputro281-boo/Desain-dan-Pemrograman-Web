<?php
// Latihan: Konversi Nilai Angka menjadi Predikat

$nilai = 9; // Input angka 1-10

echo "<h2>Hasil Penilaian</h2>";
echo "Skor Anda: $nilai<br>";
echo "Kategori: ";

switch ($nilai) {
    case 10:
    case 9:
        echo "<b>Istimewa</b> (A)";
        break;
    case 8:
        echo "<b>Sangat Baik</b> (B)";
        break;
    case 7:
        echo "<b>Baik</b> (C)";
        break;
    case 6:
        echo "<b>Cukup</b> (D)";
        break;
    case 5:
    case 4:
    case 3:
    case 2:
    case 1:
        echo "<b>Kurang</b> (E)";
        break;
    default:
        echo "Skor tidak valid! Masukkan angka 1-10.";
}
echo "<br>";
?>