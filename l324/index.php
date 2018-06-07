<?php

require_once(__DIR__ . '/Strings.php');
$strings = new Strings();

require_once(__DIR__ . '/File.php');
$fileRout = __DIR__ . '/test.txt';

try {
    $file = new File($fileRout, true);

    for ($i = 0; $i < 50; $i++) {
        $string = $strings->generateRandomString(100) . PHP_EOL;
        $file->write($string);
    }

    echo $file->getName() . ' ( ' . $file->getSize() . ' ) :' . PHP_EOL;
    echo $file->read();
} catch (Exception $ex) {
    echo 'Error: ' . $ex->getMessage();
}
