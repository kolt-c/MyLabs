<?php

namespace application\controllers;

use application\Controller;

/**
 * Class UserController
 * @package application\controllers
 */
class UserController extends Controller
{
    public function actionList()
    {
        $this->getModel()->setTemplate('pages/content');
        $this->getModel()->setData([
            'title' => 'Users list',
            'text' => 'Got no users in list'
        ]);
    }
}
