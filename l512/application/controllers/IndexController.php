<?php

namespace application\controllers;

use application\Controller;

/**
 * Class IndexController
 * @package application\controllers
 */
class IndexController extends Controller
{
    public function actionIndex()
    {
        $this->getModel()->setTemplate('index/index');
        $this->getModel()->setData('Home page');
    }

    public function action404()
    {
        $this->getModel()->setTemplate('index/404');
        $this->getModel()->setData('Page not found');
    }
}
