<?php

require_once(__DIR__ . '/CSV.php');
$fileRout = __DIR__ . '/data.csv';

$data = require_once(__DIR__ . '/data.php');

(new CSV())->setFile($fileRout)->saveToFile($data);

