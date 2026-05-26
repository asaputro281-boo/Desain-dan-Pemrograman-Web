<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Proses Pendaftaran</title>
</head>
<body>

<?php
    echo "Selamat datang <b>" . $_POST["nama"] . "</b><br>";
    echo "NIM : " . $_POST["nim"] . "<br>";
    echo "Email : " . $_POST["email"] . "<br>";
    echo "Tempat, tanggal lahir : " . $_POST["tempat"] . ", " . $_POST["ttl"] . "<br>";
    echo "Alamat : " . $_POST["alamat"] . "<br>";
    echo "Jenis Kelamin : " . $_POST["gender"] . "<br>";
?>

</body>
</html>