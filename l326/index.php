<?php

require_once(__DIR__ . '/form.html');

if ($_FILES) {
    require_once(__DIR__ . '/FileUpload.php');
    $files = (new FileUpload())->uploadFromField('attach', __DIR__ . '/uploads/');

    echo 'Uploaded next files: ' . implode(', ', $files);
}

