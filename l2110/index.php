<?php

use helpers\Console;
use exceptions\ComputerException;
use application\Asus;
use application\Lenovo;
use application\MacBook;

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

try {
    $macBook = new MacBook();
    $macBook->start();
    $macBook->printParameters();
    $macBook->identifyUser();
    echo PHP_EOL;

    $asus = new Asus();
    $asus->printParameters();
    $asus->identifyUser();
    echo PHP_EOL;

    $lenovo = new Lenovo();
    $lenovo->start();
    $lenovo->printParameters();
    $lenovo->identifyUser();
} catch (ComputerException $ex) {
    Console::printLine($ex->getMessage(), Console::$failure);
} catch (Exception $ex) {
    Console::printLine($ex->getMessage(), Console::$failure);
} finally {
    Console::printLine('Finish', Console::$success);
}
