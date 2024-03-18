<?php
$pesan = "saya arek malang";
$pesanPerKata = explode(" ", $pesan); 
$pesanPerKata = array_map(function($kata) { return strrev($kata); }, $pesanPerKata); 
$pesan = implode(" ", $pesanPerKata);
echo $pesan . "<br>";
?>
