<?php

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

$model = new \application\Model();
$view = new \application\View($model);
(new \application\Controller($model))->string();

var_dump($view->render());
