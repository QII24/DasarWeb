<?php
session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';

    if (!empty($_GET['jabatan'])) {
        // Mengambil nilai ID dari form POST
        $id = !empty($_POST['id']) ? antiinjection($koneksi, $_POST['id']) : null;
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $keterangan = antiinjection($koneksi, $_POST['keterangan']);

        // Query untuk mengupdate data jabatan
        $query = "UPDATE jabatan SET jabatan = ?, keterangan = ? WHERE id = ?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, 'ssi', $jabatan, $keterangan, $id);

        try {
            if (mysqli_stmt_execute($stmt)) {
                pesan('success', "Jabatan Telah Diubah.");
            } else {
                throw new Exception(mysqli_error($koneksi));
            }
        } catch (Exception $e) {
            pesan('danger', "Mengubah Jabatan Gagal: " . $e->getMessage());
        }

        mysqli_stmt_close($stmt);
        header("Location: ../index.php?page=jabatan");

    } elseif (!empty($_GET['anggota'])) {
        // Mengambil nilai ID dari form POST
        $user_id = !empty($_POST['id']) ? antiinjection($koneksi, $_POST['id']) : null;
        $nama = antiinjection($koneksi, $_POST['nama']);
        $jabatan = antiinjection($koneksi, $_POST['jabatan']);
        $jenis_kelamin = antiinjection($koneksi, $_POST['jenis_kelamin']);
        $alamat = antiinjection($koneksi, $_POST['alamat']);
        $no_telp = antiinjection($koneksi, $_POST['no_telp']);
        $username = antiinjection($koneksi, $_POST['username']);

        // Query untuk mengupdate data anggota
        $query_anggota = "UPDATE anggota SET nama = ?, jabatan_id = ?, jenis_kelamin = ?, alamat = ?, no_telp = ? WHERE user_id = ?";
        $stmt_anggota = mysqli_prepare($koneksi, $query_anggota);
        mysqli_stmt_bind_param($stmt_anggota, 'sisssi', $nama, $jabatan, $jenis_kelamin, $alamat, $no_telp, $user_id);

        try {
            if (mysqli_stmt_execute($stmt_anggota)) {
                if (!empty($_POST['password'])) {
                    // Mengubah password jika dimasukkan
                    $password = $_POST['password'];
                    $salt = bin2hex(random_bytes(16));
                    $combined_password = $salt . $password;
                    $hashed_password = password_hash($combined_password, PASSWORD_BCRYPT);

                    // Query untuk mengupdate data user (termasuk password baru)
                    $query_user = "UPDATE user SET username = ?, password = ?, salt = ? WHERE id = ?";
                    $stmt_user = mysqli_prepare($koneksi, $query_user);
                    mysqli_stmt_bind_param($stmt_user, 'sssi', $username, $hashed_password, $salt, $user_id);

                    if (mysqli_stmt_execute($stmt_user)) {
                        pesan('success', "Anggota Telah Diubah.");
                    } else {
                        throw new Exception(mysqli_error($koneksi));
                    }
                } else {
                    // Jika tidak mengubah password, hanya mengubah username
                    $query_user = "UPDATE user SET username = ? WHERE id = ?";
                    $stmt_user = mysqli_prepare($koneksi, $query_user);
                    mysqli_stmt_bind_param($stmt_user, 'si', $username, $user_id);

                    if (mysqli_stmt_execute($stmt_user)) {
                        pesan('success', "Anggota Telah Diubah.");
                    } else {
                        throw new Exception(mysqli_error($koneksi));
                    }
                }
            } else {
                throw new Exception(mysqli_error($koneksi));
            }
        } catch (Exception $e) {
            pesan('danger', "Mengubah Anggota Gagal: " . $e->getMessage());
        }

        mysqli_stmt_close($stmt_anggota);
        mysqli_stmt_close($stmt_user);
        header("Location: ../index.php?page=anggota");
    }
} else {
    header("Location: ../index.php?page=login");
}
?>
