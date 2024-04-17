<?php
    include "koneksi.php";

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($connect, $query);
    $row = mysqli_fetch_assoc($result);
    $cek = mysqli_num_rows($result);

    if( $cek && $row['level'] == 1) {
        echo "Anda berhasil login sebagai admin. Silahkan menuju "; ?>
        <a href="homeAdmin.html">Halaman HOME</a>
        <?php
    } else if( $cek && $row['level'] == 2) {
        echo "Anda berhasil login sebagai guest. Silahkan menuju "; ?>
        <a href="homeGuest.html">Halaman HOME</a>
        <?php
    } else {
        echo "Anda gagal login. Silahkan ";?>
        <a href="loginForm.html">Login Kembali</a>
        <?php
        echo mysqli_error($connect);
    }
    
?>