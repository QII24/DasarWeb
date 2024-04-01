<?php
$pattern = '/go{1,2}d/';
$text ='god is good.';
if (preg_match($pattern,$text,$matches)){
    echo "Cocokkan:".$matches[0];
} else {
    echo "Tidak ada yang cocok!";
}
?>
