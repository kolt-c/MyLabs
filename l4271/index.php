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

    $employeeId = $pdo->insert(TEST_TABLE, [
        'firstname' => 'Martin PDO',
        'lastname' => 'Luter PDO',
        'title' => 'PHP PDO programmer',
        'age' => 26,
        'salary' => 45000
    ]);

    $pdo->delete(TEST_TABLE, $employeeId);
    $employeeData = $pdo->find(TEST_TABLE, $employeeId);
    var_dump($employeeId, $employeeData);
} catch (PDOException $ex) {
    echo $ex->getMessage() . PHP_EOL;
}

echo 'MySQLi demo' . PHP_EOL;
try {
    $mysqli = new MySQLiDriver($config['server'], $config['database'], $config['user'], $config['password']);

    $employeeId = $mysqli->insert(TEST_TABLE, [
        'firstname' => 'Martin',
        'lastname' => 'Luter',
        'title' => 'PHP programmer',
        'age' => 24,
        'salary' => 40000
    ]);

    $mysqli->delete(TEST_TABLE, $employeeId);
    $employeeData = $mysqli->find(TEST_TABLE, $employeeId);
    var_dump($employeeId, $employeeData);
} catch (Exception $ex) {
    echo $ex->getMessage() . PHP_EOL;
}
