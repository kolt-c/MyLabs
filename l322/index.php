<?php

require_once(__DIR__ . '/File.php');
$files = scandir(__DIR__);

foreach ($files as $file) {
    if ($file == '.' || $file == '..') {
        continue;
    }

    $fileRout = __DIR__ . '/' . $file;
    try {
        $file = new File($fileRout);
        $fileData = [
            'File: ' . $file->getName(),
            'size: ' . $file->getSize(),
            $file->getIsReadable() ? 'is readable' : 'is not readable',
            $file->getIsWritable() ? 'is writable' : 'is not writable',
            'created: ' . $file->getCreatedDate(),
            'modified: ' . $file->getLastEditedDate()
        ];

        echo implode(' | ', $fileData) . PHP_EOL;
    } catch (Exception $ex) {
        echo 'Error: ' . $ex->getMessage();
    }
}

