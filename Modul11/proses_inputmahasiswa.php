<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $npm = $_POST['npm'];
    $namaMhs = $_POST['namaMhs'];
    $prodi = $_POST['prodi'];
    $alamat = $_POST['alamat'];
    $noHP = $_POST['noHP'];

    // Memasukkan data ke tabel t_mahasiswa sesuai field di database
    $query = "INSERT INTO t_mahasiswa VALUES ('$npm', '$namaMhs', '$prodi', '$alamat', '$noHP')";
    $result = mysqli_query($link, $query);

    if ($result) {
        header("location:viewmahasiswa.php");
    } else {
        die("Gagal menyimpan data: " . mysqli_error($link));
    }
}
?>