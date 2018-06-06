<?php

require_once(__DIR__ . '/Computer.php');
require_once(__DIR__ . '/Asus.php');
require_once(__DIR__ . '/Lenovo.php');
require_once(__DIR__ . '/MacBook.php');



$macBook = new MacBook();
$macBook->start();
$macBook->printParameters();
$macBook->identifyUser();
echo PHP_EOL;

$asus = new Asus();
$asus->start();
$asus->printParameters();
$asus->identifyUser();
echo PHP_EOL;

$lenovo = new Lenovo();
$lenovo->start();
$lenovo->printParameters();
$lenovo->identifyUser();
