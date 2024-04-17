<?php
if (isset($_COOKIE['user'])) {
    echo $_COOKIE['user'];
} else {
    echo "Cookie 'user' tidak ditemukan atau telah kadaluwarsa.";
}
?>