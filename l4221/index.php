<?php

$config = require_once(__DIR__ . '/config.php');

$mysqli = @mysqli_connect($config['server'], $config['user'], $config['password'], $config['database']);
if (false === $mysqli) {
    $error = sprintf('MySQLi error %d: %s', mysqli_connect_errno(), mysqli_connect_error());
    die($error);
}

var_dump($mysqli);
