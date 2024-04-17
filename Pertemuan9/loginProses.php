<?php
    include "koneksi.php";

    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $query = "SELECT * FROM user WHERE username='$username'";
    $result = mysqli_query($connect, $query);
    
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            // Verifikasi password
            if (password_verify($_POST['password'], $row['password'])) {
                echo "Anda berhasil login. Silahkan menuju <a href='homeAdmin.html'>Halaman HOME</a>";
            } else {
                echo "Password salah. Silahkan coba lagi.";
            }
        } else {
            echo "Username tidak ditemukan.";
        }
    } else {
        echo "Query tidak valid: " . mysqli_error($connect);
    }
    