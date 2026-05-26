<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Form Komentar</title>
</head>
<body>

<?php
$name = $email = $comment = "";

// fungsi filter
function bersihkan_input($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// cek submit
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = bersihkan_input($_POST["name"]);
    $email = bersihkan_input($_POST["email"]);
    $comment = bersihkan_input($_POST["comment"]);

    echo "Nama : " . $name . "<br>";
    echo "Email : " . $email . "<br>";
    echo "Komentar : " . $comment . "<br>";
    echo "<hr>";
}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    Nama: <input type="text" name="name"><br><br>

    E-mail: <input type="text" name="email"><br><br>

    Komentar:<br>
    <textarea name="comment" rows="5" cols="40"></textarea><br><br>

    <input type="submit" value="simpan">
    <input type="reset" value="bersihkan">
</form>

</body>
</html>