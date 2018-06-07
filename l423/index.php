<?php

$config = require_once(__DIR__ . '/config.php');

$mysqli = @mysqli_connect($config['server'], $config['user'], $config['password'], $config['database']);
if (false === $mysqli) {
    $error = sprintf('MySQLi error %d: %s', mysqli_connect_errno(), mysqli_connect_error());
    die($error);
}

$sql = 'SELECT * FROM employees ORDER BY id %s LIMIT 1';

$firstEmployeeQuery = mysqli_query($mysqli, sprintf($sql, 'ASC'));
$firstEmployeeData = mysqli_fetch_assoc($firstEmployeeQuery);
var_dump($firstEmployeeData);

$lastEmployeeQuery = mysqli_query($mysqli, sprintf($sql, 'DESC'));
$lastEmployeeData = mysqli_fetch_assoc($lastEmployeeQuery);
var_dump($lastEmployeeData);
