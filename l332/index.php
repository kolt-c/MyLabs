<?php

require_once(__DIR__ . '/Session.php');

$session = new Session();

$session->create('test', 'brain-test');
$session->create('test2', 'brain-test3');
$session->create('test3', 'brain-test3');
$session->update('test', 'brain2');
$session->delete('test2');

echo 'session var "test": ' . $session->read('test') . '<hr>';
echo 'all session vars:';
var_dump($session->read());
