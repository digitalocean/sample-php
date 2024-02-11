<?php
// Yükleme dizini
$uploadDir = 'resimler/';

// Yüklenen dosyaların isimleri
$filenames = [];

foreach ($_FILES['files']['tmp_name'] as $key => $tmpName) {
    $filename = $_FILES['files']['name'][$key];
    $uploadPath = $uploadDir . $filename;

    if (move_uploaded_file($tmpName, $uploadPath)) {
        $filenames[] = $filename;
    }
}

echo implode('<br>', $filenames);
?>
