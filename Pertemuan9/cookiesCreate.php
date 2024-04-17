<?php
if (setcookie("user", "Polinema", time() + 3600)) {
    echo "Cookie 'user' berhasil diatur.";
} else {
    echo "Gagal mengatur cookie 'user'.";
}

?>