<?php
include 'koneksi.php';

if (isset($_POST['simpan'])) {
    $kodeMK = $_POST['kodeMK'];
    $namaMK = $_POST['namaMK'];
    $sks = $_POST['sks'];
    $jam = $_POST['jam'];

    // Memasukkan data ke tabel t_matakuliah
    $query = "INSERT INTO t_matakuliah VALUES ('$kodeMK', '$namaMK', '$sks', '$jam')";
    $result = mysqli_query($link, $query);

    if ($result) {
        header("location:viewmatakuliah.php");
    } else {
        die("Gagal menyimpan data: " . mysqli_error($link));
    }
}
?>