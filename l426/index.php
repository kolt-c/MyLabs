<?php

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

use application\libraries\MySQLiDriver;
use application\libraries\PdoDriver;

$config = require_once(__DIR__ . '/config.php');

define('TEST_TABLE', 'employees');

echo 'PDO demo' . PHP_EOL;
try {
    $pdo = new PdoDriver($config['server'], $config['database'], $config['user'], $config['password']);

    $employeeData = $pdo->find(TEST_TABLE);
    if ($employeeData) {
        $employeeId = current($employeeData)['id'];
        $firstEmployeeData = $pdo->find(TEST_TABLE, $employeeId);
        var_dump($firstEmployeeData);
    }
} catch (PDOException $ex) {
    echo $ex->getMessage() . PHP_EOL;
}

echo 'MySQLi demo' . PHP_EOL;
try {
    $mysqli = new MySQLiDriver($config['server'], $config['database'], $config['user'], $config['password']);

    $employeeData = $mysqli->find(TEST_TABLE);
    if ($employeeData) {
        $employeeId = end($employeeData)['id'];
        $lastEmployeeData = $pdo->find(TEST_TABLE, $employeeId);
        var_dump($lastEmployeeData);
    }
} catch (Exception $ex) {
    echo $ex->getMessage() . PHP_EOL;
}
