<?php
// 1. MEMBUAT DATA (Buku Menu)
$menu_kafe = [
    "Kopi" => ["Espresso", "Latte", "Cappuccino"],
    "Cemilan" => ["Kentang Goreng", "Cireng", "Roti Bakar"],
    "Minuman_Dingin" => ["Es Teh", "Jus Jeruk"]
];

echo "<h2>--- DAFTAR MENU KAFE ---</h2>";

// 2. MENAMPILKAN SEMUA DATA (Looping)
foreach ($menu_kafe as $kategori => $daftar_item) {
    // str_replace digunakan agar tulisan "Minuman_Dingin" jadi "Minuman Dingin" (tanpa garis bawah)
    echo "<b>Kategori " . str_replace("_", " ", $kategori) . ":</b><br>";
    
    // implode digunakan untuk menggabungkan daftar makanan jadi satu baris dipisahkan koma
    echo "Menu: " . implode(", ", $daftar_item) . "<br><br>";
}

echo "<hr>";

// 3. MENGAMBIL SATU DATA SPESIFIK (Pesanan)
echo "<h3>Pesanan Pelanggan:</h3>";

// Mengambil Kopi urutan ke-2 (Index 1)
echo "Pesanan 1: " . $menu_kafe['Kopi'][1] . "<br>"; // Hasil: Latte

// Mengambil Cemilan urutan ke-1 (Index 0)
echo "Pesanan 2: " . $menu_kafe['Cemilan'][0] . "<br>"; // Hasil: Kentang Goreng

echo "<hr>";

// 4. MENAMBAH DATA BARU (Update Menu)
// Ada menu baru di kategori Minuman_Dingin
$menu_kafe['Minuman_Dingin'][] = "Es Cokelat";

echo "<h3>Update Menu Minuman Dingin Terbaru:</h3>";
echo "<ul>";
foreach ($menu_kafe['Minuman_Dingin'] as $minuman) {
    echo "<li>$minuman</li>";
}
echo "</ul>";

// 5. MENGHITUNG TOTAL DATA
$total_kopi = count($menu_kafe['Kopi']);
echo "<i>Saat ini ada $total_kopi pilihan jenis Kopi yang tersedia.</i>";
?>