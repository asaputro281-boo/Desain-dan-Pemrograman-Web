<?php
// LatihanPerulangan_Cerita.php

// 1. Pola Piramida Angka (Meningkat)
echo "<h2>Piramida Urutan Angka</h2>";
// Perulangan luar menentukan jumlah baris
for ($i = 1; $i <= 8; $i++) {
    // Perulangan dalam menentukan berapa banyak angka yang muncul di baris itu
    for ($j = 1; $j <= $i; $j++) {
        echo $j . " ";
    }
    echo "<br>";
}

echo "<hr>";

// 2. Simulasi Pengiriman Paket (Logika Break & Continue)
echo "<h2>Log Pelacakan Pengiriman</h2>";

for ($paket = 1; $paket <= 10; $paket++) {
    
    // Contoh Continue: Melewati paket nomor 4 karena alamat tidak lengkap
    if ($paket == 4) {
        echo " Paket #$paket: Alamat tidak lengkap (Dilewati/Pending).<br>";
        continue; 
    }

    // Contoh Break: Kurir berhenti karena cuaca buruk di paket ke-9
    if ($paket == 9) {
        echo " <b>Pengiriman dihentikan pada paket #$paket karena Cuaca Buruk (Break).</b>";
        break;
    }

    echo " Paket #$paket: Berhasil dikirim ke tujuan.<br>";
}
?>