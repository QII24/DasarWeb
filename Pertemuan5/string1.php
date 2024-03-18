<?php

$loremipsum = "lorem ipsum dolor siduwdvbwvuibvi jwnivbjwnvi abijawjbvibovniobwvonwion";

echo"<p>{$loremipsum}</p>";
echo"Panjang karakter:".strlen($loremipsum)."<br>";
echo"Panjang kata:".str_word_count($loremipsum)."<br>";
echo"<p>".strtoupper($loremipsum)."</p>";
echo"<p>".strtolower($loremipsum)."</p>";

?>
