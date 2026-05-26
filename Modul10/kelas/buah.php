<?php
class buah
{
    public $nama;
    protected $warna;
    private $berat;
    
}

$mango = new buah();
$mango->nama = 'Mangga'; // OK
// $Mangga->warna = 'Yellow'; // ERROR: Access to protected property
// $mangga->buah = '300'; // ERROR: Variable not found

?>