<?php

require_once(__DIR__ . '/File.php');
$fileRout = __DIR__ . '/test-file.txt';

try {
    $file = new File($fileRout);
    echo $file->getName() . ' ( ' . $file->getSize() . ' ) :' . PHP_EOL;
    echo $file->read();
} catch (Exception $ex) {
    echo 'Error: ' . $ex->getMessage();
}
