<?php

require_once(__DIR__ . '/CSV.php');
$fileRout = __DIR__ . '/data.csv';

$data = (new CSV())->setFile($fileRout)->readFromFile();
var_dump($data);

