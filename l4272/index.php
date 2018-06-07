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

    echo 'PDO create:' . PHP_EOL;
    $employeeId = $pdo->insert(TEST_TABLE, [
        'firstname' => 'Martin PDO',
        'lastname' => 'Luter PDO',
        'title' => 'PHP PDO programmer',
        'age' => 26,
        'salary' => 45000
    ]);
    echo "#{$employeeId}" . PHP_EOL;

    echo 'PDO read:' . PHP_EOL;
    $employeeData = $pdo->find(TEST_TABLE, $employeeId);
    var_dump($employeeData);

    echo 'PDO update:' . PHP_EOL;
    $pdo->update(TEST_TABLE, ['firstname' => 'Updated Martin', 'lastname' => 'Updated Luter'], ['id' => $employeeId]);
    $employeeData = $pdo->find(TEST_TABLE, $employeeId);
    var_dump($employeeData);

    echo 'PDO delete:' . PHP_EOL;
    echo $pdo->delete(TEST_TABLE, $employeeId) ? 'Done' : 'Error';
} catch (PDOException $ex) {
    echo $ex->getMessage() . PHP_EOL;
}

echo 'MySQLi demo' . PHP_EOL;
try {
    $mysqli = new MySQLiDriver($config['server'], $config['database'], $config['user'], $config['password']);

    echo 'MySQLi create:' . PHP_EOL;
    $employeeId = $mysqli->insert(TEST_TABLE, [
        'firstname' => 'Martin PDO',
        'lastname' => 'Luter PDO',
        'title' => 'PHP PDO programmer',
        'age' => 26,
        'salary' => 45000
    ]);
    echo "#{$employeeId}" . PHP_EOL;

    echo 'MySQLi read:' . PHP_EOL;
    $employeeData = $mysqli->find(TEST_TABLE, $employeeId);
    var_dump($employeeData);

    echo 'MySQLi update:' . PHP_EOL;
    $mysqli->update(TEST_TABLE, ['firstname' => 'Updated Martin', 'lastname' => 'Updated Luter'], ['id' => $employeeId]);
    $employeeData = $mysqli->find(TEST_TABLE, $employeeId);
    var_dump($employeeData);

    echo 'MySQLi delete:' . PHP_EOL;
    echo $mysqli->delete(TEST_TABLE, $employeeId) ? 'Done' : 'Error';
} catch (Exception $ex) {
    echo $ex->getMessage() . PHP_EOL;
}
