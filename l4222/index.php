<?php

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

use application\libraries\MySQLiDriver;
use application\libraries\PdoDriver;

$config = require_once(__DIR__ . '/config.php');

echo 'PDO demo' . PHP_EOL;
try {
    $pdo = new PdoDriver($config['server'], $config['database'], $config['user'], $config['password']);
} catch (PDOException $ex) {
    echo $ex->getMessage() . PHP_EOL;
}

echo 'MySQLi demo' . PHP_EOL;
try {
    $mysqli = new MySQLiDriver($config['server'], $config['database'], $config['user'], $config['password']);
} catch (Exception $ex) {
    echo $ex->getMessage() . PHP_EOL;
}
