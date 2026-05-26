<?php
// Data nilai siswa yang baru
$daftar_nilai = array(45, 75, 90, 60, 88, 30, 100);

echo "<h3>--- Laporan Kelulusan Siswa ---</h3>";

foreach ($daftar_nilai as $skor) {
    // 1. Cek Kelulusan (Ambang batas 70)
    if ($skor >= 70) {
        $status = "<b style='color:green;'>LULUS</b>";
    } else {
        $status = "<b style='color:red;'>GAGAL</b>";
    }

    // 2. Memberikan Predikat Sederhana
    if ($skor >= 90) {
        $predikat = " (Istimewa)";
    } elseif ($skor >= 75) {
        $predikat = " (Bagus)";
    } else {
        $predikat = "";
    }

    echo "Skor: $skor | Status: $status $predikat <br>";
}

echo "<hr>";
echo "<i>Total data yang diperiksa: " . count($daftar_nilai) . " siswa.</i>";
?>