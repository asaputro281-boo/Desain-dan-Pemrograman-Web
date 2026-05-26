<?php
require_once ('kelas/Manusia.php');

$Angga = new Manusia();
$Angga->setNama("Angga Dwi Saputro");
$Angga->setUmur(18);

$ysad = new Manusia();
$ysad->setNama("Ysad");
$ysad->setUmur(20);

echo "Identitas Ysad:<br>";
echo "Nama: " . $ysad->getNama() . "<br>";

echo "<br>Identitas Anda:<br>";
echo "Nama: " . $Angga->getNama() . "<br>";
echo "Umur: " . $Angga->getUmur() . " tahun<br>";
echo "NIK: " . $Angga->getNIK() . "<br>";
?>

<br> 
<b>KESIMPULAN UJICOBA:</b><br>
Praktikum ini mendemonstrasikan konsep Pemrograman Berorientasi Objek (OOP) 
khususnya mengenai <b>'Encapsulation'</b>. Penggunaan setter (setNama) dan getter (getNama) 
memungkinkan kita untuk mengatur dan mengambil nilai dari properti yang 
dilindungi (protected) secara aman dari luar kelas.
