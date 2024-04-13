<?php
$uploadDirectory = 'uploads/';


$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
$maxFileSize = 1024; 
if (isset($_POST["submit"])) {

    if (!file_exists($uploadDirectory) && !is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
        $fileName = $_FILES["fileToUpload"]["name"];
        $fileSize = $_FILES["fileToUpload"]["size"];
        $fileTmpName = $_FILES["fileToUpload"]["tmp_name"];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        
        if (!in_array($fileType, $allowedExtensions)) {
            echo "Maaf, jenis file ini tidak diizinkan.";
        } elseif ($fileSize > $maxFileSize) {
            echo "Maaf, ukuran file melebihi batas maksimum (1 kb).";
        } else {
            $targetFile = $uploadDirectory . basename($fileName);

            if (move_uploaded_file($fileTmpName, $targetFile)) {
                echo "File berhasil diunggah ke: " . $targetFile;
            } else {
                echo "Gagal mengunggah file.";
            }
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}
?>
<?php
$uploadDirectory = 'uploads/';
$thumbnailDirectory = 'thumbnails/'; 


$allowedExtensions = array('jpg', 'jpeg', 'png', 'gif');
$maxFileSize = 1024; 
if (isset($_POST["submit"])) {
    if (!file_exists($uploadDirectory) && !is_dir($uploadDirectory)) {
        mkdir($uploadDirectory, 0777, true);
    }
    if (!file_exists($thumbnailDirectory) && !is_dir($thumbnailDirectory)) {
        mkdir($thumbnailDirectory, 0777, true);
    }

    if (isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] === UPLOAD_ERR_OK) {
        $fileName = $_FILES["fileToUpload"]["name"];
        $fileSize = $_FILES["fileToUpload"]["size"];
        $fileTmpName = $_FILES["fileToUpload"]["tmp_name"];
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));

        if (!in_array($fileType, $allowedExtensions)) {
            echo "Maaf, jenis file ini tidak diizinkan.";
        } elseif ($fileSize > $maxFileSize) {
            echo "Maaf, ukuran file melebihi batas maksimum (1 KB).";
        } else {
            $targetFile = $uploadDirectory . basename($fileName);
            $thumbnailFile = $thumbnailDirectory . 'thumb_' . basename($fileName); 
            if (move_uploaded_file($fileTmpName, $targetFile)) {
                echo "File berhasil diunggah ke: " . $targetFile;
                createThumbnail($targetFile, $thumbnailFile, 200);
                echo "Thumbnail berhasil dibuat.";
            } else {
                echo "Gagal mengunggah file.";
            }
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah file.";
    }
}

function createThumbnail($sourceFile, $thumbnailFile, $maxWidth) {
    list($sourceWidth, $sourceHeight, $sourceType) = getimagesize($sourceFile);

    if ($sourceType == IMAGETYPE_JPEG) {
        $sourceImage = imagecreatefromjpeg($sourceFile);
    } elseif ($sourceType == IMAGETYPE_PNG) {
        $sourceImage = imagecreatefrompng($sourceFile);
    } elseif ($sourceType == IMAGETYPE_GIF) {
        $sourceImage = imagecreatefromgif($sourceFile);
    } else {
        return; 
    }

    $aspectRatio = $sourceWidth / $sourceHeight;
    $maxHeight = $maxWidth / $aspectRatio;

    $thumbnailImage = imagecreatetruecolor($maxWidth, $maxHeight);
    imagecopyresampled($thumbnailImage, $sourceImage, 0, 0, 0, 0, $maxWidth, $maxHeight, $sourceWidth, $sourceHeight);

    if ($sourceType == IMAGETYPE_JPEG) {
        imagejpeg($thumbnailImage, $thumbnailFile);
    } elseif ($sourceType == IMAGETYPE_PNG) {
        imagepng($thumbnailImage, $thumbnailFile);
    } elseif ($sourceType == IMAGETYPE_GIF) {
        imagegif($thumbnailImage, $thumbnailFile);
    }

    imagedestroy($sourceImage);
    imagedestroy($thumbnailImage);
}
?>
