<?php
// Latihan 5: Switch Statement - Status Logistik Pengiriman

$status = "dikirim"; // Kita coba ubah ke status dikirim

switch ($status) {
    case "pending":
        echo "<b>[Menunggu Pembayaran]:</b> Mohon segera selesaikan transaksi Anda agar pesanan dapat segera diproses.";
        break;
    case "proses":
        echo "<b>[Pesanan Diproses]:</b> Penjual sedang mengemas produk Anda. Kualitas barang sedang dalam pemeriksaan.";
        break;
    case "dikirim":
        echo "<b>[Dalam Perjalanan]:</b> Paket Anda telah diserahkan ke kurir dan sedang menuju ke alamat tujuan.";
        break;
    case "selesai":
        echo "<b>[Transaksi Selesai]:</b> Paket telah tiba di lokasi. Jangan lupa berikan ulasan untuk membantu pembeli lain!";
        break;
    default:
        echo "<b>[Error]:</b> Riwayat pelacakan tidak tersedia. Silakan hubungi Customer Service.";
}

echo "<br>";
?>