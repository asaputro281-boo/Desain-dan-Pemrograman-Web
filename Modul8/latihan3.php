<?php
$x = 10;
$y = 3;

// Arithmetic operators
echo "Penambahan " . ($x + $y) . "<br>";
echo "Pengurangan " . ($x - $y) . "<br>"; 
echo "Perkalian " . ($x * $y) . "<br>"; 
echo "Pembagian " . ($x / $y) . "<br>"; 
echo "Modulus " . ($x % $y) . "<br>"; 
echo "Exponensial " . ($x ** $y) . "<br>"; 
echo("<br>");

// Assignment operators
$x += 10;
$y *= 5; 
echo "Penambahan x " . $x . "<br>";
echo "Perkalian y " . $y . "<br>";
echo("<br>");

// Increment/Decrement operators
echo "Isi ++x = " . ++$x . "<br>"; 
echo "Isi x++ = " . $x++ . "<br>"; 
echo "Isi x = " . $x . "<br>";     
echo("<br>");
echo "Isi --y = " . --$y . "<br>"; 
echo "Isi y-- = " . $y-- . "<br>"; 
echo "Isi y = " . $y . "<br>";    
echo("<br>");

// Comparison operators
$x = 100;
$y = "100";
var_dump($x == $y); echo "<br>";  
var_dump($x === $y); echo "<br>"; 
var_dump($x != $y); echo "<br>";  
var_dump($x !== $y); echo "<br>";

$x = 75; $y = 50;
var_dump($x > $y); echo "<br>";  
var_dump($x < $y); echo "<br>";  
var_dump($x >= $y); echo "<br>";
var_dump($x <= $y); echo "<br>"; 

// Logical operators
$x = 75; $y = 50;
if ($x == 75 and $y == 50) { echo "Kondisi AND terpenuhi!<br>"; }
if ($x == 75 or $y == 999) { echo "Kondisi OR terpenuhi!<br>"; }
if ($x == 75 xor $y == 999) { echo "Kondisi XOR terpenuhi!<br>"; }


$user = "Admin";
$status = (empty($user)) ? "Kosong" : "Ada isi";
echo "Status: " . $status . "<br>";

$theme = $theme ?? "dark";
echo "Tema: " . $theme;
?>