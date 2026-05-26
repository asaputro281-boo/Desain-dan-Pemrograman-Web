<?php
// --- 1. INDEX ARRAY (Daftar Sistem Operasi) ---
echo "<h3>Daftar Sistem Operasi Server</h3>";
$os = array("Ubuntu Server", "Debian", "CentOS", "Windows Server", "FreeBSD");

// Mengakses index tertentu
echo "Server ini menggunakan " . $os[0] . " dan cadangan " . $os[1] . ".<br>";

foreach ($os as $sistem) {
    echo "OS Name: $sistem <br>";
}

echo "<hr>";

// --- 2. ASSOCIATIVE ARRAY (Kapasitas Penyimpanan) ---
echo "<h3>Kapasitas Penyimpanan Cloud</h3>";
$storage = array(
    "User_A" => "50 GB", 
    "User_B" => "250 GB", 
    "User_C" => "1 TB"
);

// Menambah data kuota baru
$storage['User_D'] = "5 TB";

echo "Kuota User_C adalah " . $storage['User_C'] . "<br>";

// Tampilkan semua kuota pengguna
foreach ($storage as $user => $kuota) {
    echo "Kapasitas $user: $kuota<br>";
}

echo "<hr>";

// --- 3. MULTIDIMENSIONAL ARRAY (Log Transaksi Jaringan) ---
echo "<h3>Log Transaksi Data Jaringan</h3>";
$network_log = array(
    array("192.168.1.1", "1024 MB", "Berhasil"),
    array("192.168.1.5", "512 MB", "Terputus"),
    array("10.0.0.254", "2048 MB", "Pending")
);

// Mengakses data menggunakan perulangan agar lebih rapi
for ($row = 0; $row < 3; $row++) {
    echo "<b>IP Source:</b> " . $network_log[$row][0] . 
         " | <b>Payload:</b> " . $network_log[$row][1] . 
         " | <b>Status:</b> " . $network_log[$row][2] . "<br>";
}
?>