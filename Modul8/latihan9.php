<?php
echo "<h3>--- Sistem Kasir Warung Digital ---</h3>";

// 1. Fungsi dengan Parameter (Menampilkan Sapaan Kasir)
// Fungsi ini bertugas menyapa pelanggan yang datang
function sapaPelanggan($nama_pelanggan, $waktu = "Siang") {
    echo "Halo Kak <b>$nama_pelanggan</b>, Selamat $waktu!<br>";
    echo "Terima kasih sudah berkunjung ke toko kami.<br>";
}

// Memanggil fungsi sapaan
sapaPelanggan("Angga", "Sore");

echo "<br>";

// 2. Fungsi dengan Return Value (Menghitung Total Belanja)
// Fungsi ini menerima harga barang dan jumlahnya, lalu mengembalikan total harga
function hitungBelanja(int $harga, int $jumlah) {
    $total = $harga * $jumlah;
    return $total;
}

// Simulasi pembelian
$barang = "Kopi Susu";
$harga_satuan = 15000;
$jumlah_beli = 3;

$total_bayar = hitungBelanja($harga_satuan, $jumlah_beli);

// Menampilkan hasil
echo "<b>Detail Pesanan:</b><br>";
echo "Item: $barang<br>";
echo "Harga: Rp $harga_satuan x $jumlah_beli unit<br>";
echo "-----------------------------------<br>";
echo "<b>Total yang harus dibayar: Rp $total_bayar</b>";
?>