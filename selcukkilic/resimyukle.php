<?php

if ($_FILES['files']['error'] == 4 || ($_FILES['files']['size'] == 0 && $_FILES['files']['error'] == 0)) // https://stackoverflow.com/a/14458594
    die("Resim secilmedi.");


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
