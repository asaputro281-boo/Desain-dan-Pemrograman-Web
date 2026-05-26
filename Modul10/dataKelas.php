<?php
require_once ('kelas/Mahasiswa.php');

$mhs = new Mahasiswa("Angga Dwi Saputro");
$mhs->setNIM("253307019");
$mhs->setNama("Angga Dwi Saputro");
$mhs->setJurusan("Teknologi Informasi");
$mhs->setKelas("2A");

echo "<h3>Data Mahasiswa</h3>";
echo "Nama: " . $mhs->getNama() . "<br>";
echo "NIM: " . $mhs->getNIM() . "<br>";
echo "Jurusan: " . $mhs->getJurusan() . "<br>";
echo "Kelas: " . $mhs->getKelas() . "<br>";
?>