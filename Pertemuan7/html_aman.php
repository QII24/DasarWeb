<?php
$input = $_POST['input'] ?? '';
$input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
$email = $_POST['email'] ?? '';

if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email yang dimasukkan valid: $email";
} else {
    echo "Email yang dimasukkan tidak valid atau tidak ada.";
}
?>
