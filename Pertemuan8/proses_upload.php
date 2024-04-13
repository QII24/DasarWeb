<?php
$targetDirectory = "documents/";
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

if ($_FILES['files']['name'][0]) {
    $totalFiles = count($_FILES['files']['name']);

    $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileExtension = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (in_array($fileExtension, $allowedExtensions)) {
            $targetFile = $targetDirectory . $fileName;
            if (move_uploaded_file($_FILES['files']['tmp_name'][$i], $targetFile)) {
                echo "File $fileName berhasil diunggah.<br>";
            } else {
                echo "Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "File $fileName bukan file gambar yang diizinkan (JPG, JPEG, PNG, GIF).<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
