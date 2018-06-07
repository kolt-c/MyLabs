<?php

use application\controllers\IndexController;

require_once(__DIR__ . '/Autoload.php');
spl_autoload_register(['Autoload', 'loader']);

$router = new Router();
$model = new \application\Model();

if (method_exists($router->getController(), $router->getAction())) {
    $controller = $router->getController();
    (new $controller($model))->{$router->getAction()}();
} else {
    (new IndexController($model))->action404();
}

try {
    (new \application\View($model))->render();
} catch (Exception $ex) {
    die($ex->getMessage());
}
