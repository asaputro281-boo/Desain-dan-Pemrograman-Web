<?php
// 1. While Loop
echo "<h3>While Loop (Hitung Maju)</h3>";
$x = 1;
while ($x <= 10) {
    echo "Antrean ke-$x <br>";
    $x++;
}

// 2. Do While
echo "<h3>Do While Loop (Pengurangan Skala)</h3>";
$i = 100;
do {
    echo "Kapasitas saat ini: $i% <br>";
    $i -= 25;
} while ($i >= 0);

// 3. Foreach
echo "<h3>Foreach (Status Server)</h3>";
$status_server = array("Svr-01" => "Aktif", "Svr-02" => "Maintenance", "Svr-03" => "Down");
foreach ($status_server as $id => $status) {
    echo "ID Server: <b>$id</b> | Status: <i>$status</i> <br>";
}

// 4. For
echo "<h3>For Loop (Kelipatan 5)</h3>";
for ($n = 5; $n <= 50; $n += 5) {
    echo "Progress: $n% <br>";
}
?>