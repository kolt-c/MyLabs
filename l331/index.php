<?php

require_once(__DIR__ . '/Cookie.php');

$cookie = new Cookie();

$cookie->create('test', 'brain-test', time() + 3600);
$cookie->create('test2', 'brain-test3', time() + 3600);
$cookie->create('test3', 'brain-test3', time() + 3600);
$cookie->update('test', 'brain2', time() + 3600);
$cookie->delete('test2');

echo 'cookie "test": ' . $cookie->read('test') . '<hr>';
echo 'all cookies:';
var_dump($cookie->read());
